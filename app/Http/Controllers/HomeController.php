<?php

namespace App\Http\Controllers;

use App\Advertise;
use App\ChargeCommision;
use App\Income;
use App\MemberExtra;
use App\Deposit;
use App\Gateway;
use App\Lib\GoogleAuthenticator;
use App\Package;
use App\Transaction;
use App\User;
use App\UserAdvertise;
use App\Withdraw;
use App\General;
use App\WithdrawTrasection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'ckstatus']);
    }


    // FOR REFFERAL LINK
    public function affiliate()
    {
        $user_id = Auth::id();
        $affiliate_id = User::where('id', $user_id)->pluck('affiliate_id')->first();
        return view('fonts.marketing.affiliate')->with('affiliate_id', $affiliate_id);
    }
    public function index()
    {
        return view('home');
    }

    public function binarySummeryindex()
    {
        $cbv = MemberExtra::where('user_id', Auth::user()->id)->first();
        return view('fonts.marketing.bainary_summery', compact('cbv'));
    }

    public function treeIndex()
    {
        if (isset($_GET['name'])) {
            $treefor = $_GET['name'];
        } else {
            $treefor = Auth::user()->username;
        }
        return view('fonts.marketing.my_tree', compact('treefor'));
    }

    public function referralIndex()
    {
        $ref = User::where('referrer_id', Auth::user()->id)->get();
        return view('fonts.marketing.my_referral', compact('ref'));
    }

    public function referraCommsisionlIndex()
    {
        $ref_income = Income::where('user_id', Auth::user()->id)
            ->where('type', 'R')
            ->orderBy('id', 'desc')->get();
        return view('fonts.my_income.referral_commission', compact('ref_income'));
    }

    public function binaryCommsisionlIndex()
    {
        $b_income = Income::where('user_id', Auth::user()->id)
            ->where('type', 'B')
            ->orderBy('id', 'desc')->get();
        return view('fonts.my_income.binary_commission', compact('b_income'));
    }

    public function fundIndex()
    {
        $gates = Gateway::where('status', 1)->get();
        return view('fonts.finance.add_fund', compact('gates'));
    }

    public function withdrawIndex()
    {
        $gates = Withdraw::where('status', 1)->get();
        return view('fonts.finance.request_withdraw', compact('gates'));
    }

    public function withdrawPreview(Request $request)
    {
        $this->validate($request, [
            'gateway' => 'required',
            'amount' => 'required|numeric|min:1'
        ]);

        $amount = $request->amount;
        $method = Withdraw::find($request->gateway);
        $package_id = Auth::user()->package_id;
        $package = Package::find($package_id);


        if ($request->amount < Auth::user()->balance && $request->amount >= $package->minimum_withdraw && $request->amount < $method->max_amo) {
            return view('fonts.finance.withdraw_preview', compact('method', 'amount'));
        }
        if ($request->amount > Auth::user()->balance) {
            return redirect()->back()->with('alert', 'You Have Not Enough Balance To Withdraw!');
        }
        if ($request->amount < $package->minimum_withdraw) {
            return redirect()->back()->with('alert', 'You Cant Withdraw More Than Your Pakcage Limit!');
        } else {
            return redirect()->back()->with('alert', 'You Have Something Wrong With You!');
        }
    }

    public function transferFundIndex()
    {
        $comission = ChargeCommision::first();
        return view('fonts.finance.fund_transfer', compact('comission'));
    }

    //    public function transacPinIndex()
    //    {
    //        return view('fonts.finance.trans_pin');
    //    }

    public function transacHistory()
    {
        $trans = Transaction::where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')->get();
        return view('fonts.finance.trans_history', compact('trans'));
    }

    public function profileIndex()
    {
        return view('fonts.profile');
    }

    public function storeDeposit(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
            'gateway' => 'required',
        ]);
        $gate = Gateway::findOrFail($request->gateway);

        if ($request->amount < $gate->minamo || $request->amount > $gate->maxamo) {
            return back()->with('alert', 'Invalid Amount');
        } else {

            if (is_null($gate)) {
                return back()->with('alert', 'Please Select a Payment Gateway');
            } else {

                if ($gate->id == 3 || $gate->id == 6 || $gate->id == 7 || $gate->id == 8) {
                    $all = file_get_contents("https://blockchain.info/ticker");
                    $res = json_decode($all);
                    $btcrate = $res->USD->last;

                    $amount = $request->amount;


                    $btcamount = $request->amount / $btcrate;
                    $btc = round($btcamount, 8);

                    $one = $amount + $gate->chargefx;
                    $two = ($amount * $gate->chargepc) / 100;

                    $charge = $gate->chargefx + (($amount *  $gate->chargepc) / 100);
                    $totalbase = $amount + $charge;
                    $totalusd = $totalbase / $gate->rate;
                    $payablebtc = round($totalusd / $btcrate, 8); // user will pay this amount of BTC


                    $sell['user_id'] = Auth::id();
                    $sell['gateway_id'] = $gate->id;
                    $sell['amount'] = $amount;
                    $sell['status'] = 0;
                    $sell['bcam'] = $payablebtc;
                    $sell['trx_charge'] = $charge;
                    $sell['trx'] = 'DP' . rand();
                    Deposit::create($sell);

                    Session::put('Track', $sell['trx']);

                    return view('fonts.preview', compact('btc', 'gate', 'amount', 'payablebtc'));
                } else {
                    $amount = $request->amount;
                    $usd = $request->amount;

                    $one = $amount + $gate->chargefx;
                    $two = ($amount * $gate->chargepc) / 100;

                    $charge = $gate->chargefx + ($amount *  $gate->chargepc) / 100;

                    $sell['user_id'] = Auth::id();
                    $sell['gateway_id'] = $gate->id;
                    $sell['amount'] = $amount;
                    $sell['status'] = 0;
                    $sell['usd_amount'] = number_format(($one + $two) / $gate->rate, 2);
                    $sell['trx_charge'] = $charge;
                    $sell['trx'] = 'DP' . rand();
                    Deposit::create($sell);

                    Session::put('Track', $sell['trx']);

                    return view('fonts.preview', compact('usd', 'gate', 'amount'));
                }
            }
        }
    }

    public function storeWithdraw(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
            'charge' => 'required',
            'method_name' => 'required',
            'processing_time' => 'required',
            'detail' => 'required',
            'method_cur' => 'required',
        ]);


        $withdraw = WithdrawTrasection::create([
            'amount' => $request->amount,
            'charge' => $request->charge,
            'method_name' => $request->method_name,
            'processing_time' => $request->processing_time,
            'detail' => $request->detail,
            'method_cur' => $request->method_cur,
            'withdraw_id' => 'WD' . rand(),
            'user_id' => Auth::user()->id,
        ]);

        $total =  $request->amount + $request->charge;

        $new_balance = Auth::user()->balance - $total;

        User::whereId(Auth::user()->id)
            ->update([
                'balance' => $new_balance
            ]);

        Transaction::create([
            'user_id' => $withdraw->user_id,
            'trans_id' => rand(),
            'time' => Carbon::now(),
            'description' => 'WITHDRAW' . '#ID' . '-' . $withdraw->withdraw_id,
            'amount' => '-' . $withdraw->amount,
            'new_balance' => $new_balance,
            'type' => 2,
            'charge' => $request->charge,
        ]);

        $general = General::first();
        $user = User::find(Auth::user()->id);

        $message = 'Welcome! Your Withdraw request is success, Please wait for processing days.Your Withdraw amount : ' . $withdraw->amount . $general->symbol . ' 
         our current balance is ' . $new_balance . $general->symbol . ' .';

        send_email($user['email'], 'Successfully Withdraw', $user['first_name'], $message);



        return redirect('home')->with('message', 'Withdraw Request Success, Wait for processing day');
    }

    public function confirmUserAjax(Request $request)
    {
        if (Auth::user()->username == $request->name) {
            return "<b class='btn btn-warning btn-block btn-lg'style='margin-bottom:20px;'>Your Username</b>";
        } else {
            $user_name = User::where('username', $request->name)->first();

            if ($user_name == '') {
                return "<b class='btn btn-danger btn-block  btn-lg' style='margin-bottom:20px;'>Username not found</b>";
            } else {
                return "<b class='btn btn-success btn-block  btn-lg'style='margin-bottom:20px;'>Correct Username</b>
                            <input type='hidden' name='username' value='$user_name->id' >";
            }
        }
    }

    public function transferFund(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric|min:1',
            'username' => 'required',
        ]);

        if (Auth::user()->balance < $request->amount) {
            return redirect()->back()->with('alert', 'Insufficient Balance');
        } else {
            $comission = ChargeCommision::first();
            $charge = ($request->amount * $comission->transfer_charge) / 100;

            $total = $charge + $request->amount;

            $user = User::findOrFail($request->username);
            $user->balance = $user->balance + $request->amount;
            $user->update();

            $transferer = User::findOrFail(Auth::user()->id);
            $transferer->balance = $transferer->balance - $total;
            $transferer->update();

            Transaction::create([
                'user_id' => Auth::user()->id,
                'trans_id' => rand(),
                'time' => Carbon::now(),
                'description' => 'BALANCE TRANSFER' . '#ID' . '-' . 'BT' . rand(),
                'amount' => $request->amount,
                'new_balance' => $transferer->balance,
                'type' => 3,
                'charge' => $charge,
            ]);

            $general = General::first();

            $message = 'Thank you! Your balance transfer process is complete.Your transfer amount : ' . $request->amount . $general->symbol . ' .Your transfer charge : ' . $charge . $general->symbol . '
                Your current balance is ' . $transferer->balance . '';

            send_email($transferer->email, 'Balance Transfer Complete', $transferer->first_name, $message);



            $message = 'Congratulation! Your balance add process is complete.
            ' . $transferer->first_name . ' ' . $transferer->last_name . ' transfer ' . $request->amount . $general->symbol . ' to your fund.</p>';

            send_email($user['email'], 'Balance Add Complete', $user['first_name'], $message);

            return redirect()->back()->with('message', 'Amount Transfer Success');
        }
    }

    public function getChargeAjax(Request $request)
    {
        $comission = ChargeCommision::first();
        $general = General::first();
        $charge = ($request->inputAmount * $comission->transfer_charge) / 100;
        $total = $charge + $request->inputAmount;

        $amount = floatval($request->inputAmount);
        if ($amount == '' || $amount <= 0) {
            return "<span style='color: red'>Invalid Amount</span>";
        } else {
            return "<span style='color: red'>With $comission->transfer_charge % Charge, Your Total cost amount is $total $general->symbol</span>";
        }
    }

    public function pinChange(Request $request)
    {
        $this->validate($request, [
            'passwordold' => 'required',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required'
        ]);

        $id = Auth::user()->id;

        if ($request->password == $request->password_confirmation) {
            $c_pin = User::find($id);
            if ($request->passwordold == $c_pin->trans_pin) {
                User::whereId($id)
                    ->update([
                        'trans_pin' => $request->password
                    ]);
                return redirect()->back()->with('message', 'PIN Changes Successfully.');
            } else {
                session()->flash('alert', 'PIN Not Match');
                return redirect()->back();
            }
        } else {
            return redirect()->back()->with('alert', 'Confirm Password Not Matched');
        }
    }

    public function resetPin(Request $request)
    {
        $this->validate($request, [
            'pranto' => 'required'
        ]);

        $pin = substr(time(), 4);

        if ($request->pranto == "RESETPIN") {
            $user = User::findOrFail(Auth::user()->id);
            $user->trans_pin = $pin;
            $user->save();

            $message = 'And your new PIN is ' . $pin . '';
            $message .= '<p style="color:red;">Remember, never share this PIN with anyone.</p>';

            send_email($user['email'], 'Reset Transaction PIN', $user['first_name'], $message);

            return redirect()->back()->with('message', 'RESETPIN request success, please check your mail.');
        }

        return redirect()->back()->with('alert', 'Opps, type "RESETPIN".And Try again please.');
    }

    public function updateProfile(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'month' => 'required',
            'day' => 'required',
            'year' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'post_code' => 'required',
            'country' => 'required',
            'image' => 'mimes:png,jpg,jpeg,svg,gif'
        ]);

        User::whereId(Auth::user()->id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile,
                'street_address' => $request->street_address,
                'city' => $request->city,
                'post_code' => $request->post_code,
                'country' => $request->country,
                'email' => $request->email,
                'birth_day' => $request->year . '-' . $request->month . '-' . $request->day,
            ]);

        $user = User::find(Auth::user()->id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'assets/images/user_profile_pic/' . $filename;
            Image::make($image)->save($location);
            $user->image =  $filename;
            $user->save();
        }
        return redirect('home')->with('message', 'Profile Successfully Updated ');
    }

    public function securityIndex()
    {
        return view('fonts.security');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'passwordold' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);

        try {
            $c_password = User::find($request->id)->password;
            $c_id = User::find($request->id)->id;
            $user = User::findOrFail($c_id);

            if (Hash::check($request->passwordold, $c_password)) {

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();

                return redirect()->back()->with('message', 'Password Change Successfully.');
            } else {
                session()->flash('alert', 'Password Not Match');
                Session::flash('type', 'warning');
                return redirect()->back();
            }
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'warning');
            return redirect()->back();
        }
    }

    public function twoFactorIndex()
    {
        $gnl = General::first();
        $ga = new GoogleAuthenticator();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl(Auth::user()->username . '@' . $gnl->web_title, $secret);
        $prevcode = Auth::user()->secretcode;
        $prevqr = $ga->getQRCodeGoogleUrl(Auth::user()->username . '@' . $gnl->web_title, $prevcode);

        return view('fonts.goauth.create', compact('secret', 'qrCodeUrl', 'prevcode', 'prevqr'));
    }

    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $user = User::find(Auth::id());
        $ga = new GoogleAuthenticator();

        $secret = $user->secretcode;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;

        if ($oneCode == $userCode) {
            $user = User::find(Auth::id());
            $user['tauth'] = 0;
            $user['tfver'] = 1;
            $user['secretcode'] = '0';
            $user->save();

            $message =  'Google Two Factor Authentication Disabled Successfully';
            send_email($user['email'], 'Google 2FA', $user['first_name'], $message);



            $sms =  'Google Two Factor Authentication Disabled Successfully';
            send_sms($user->mobile, $sms);

            return back()->with('message', 'Two Factor Authenticator Disable Successfully');
        } else {
            return back()->with('alert', 'Wrong Verification Code');
        }
    }

    public function create2fa(Request $request)
    {
        $user = User::find(Auth::id());
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);

        $ga = new GoogleAuthenticator();

        $secret = $request->key;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;
        if ($oneCode == $userCode) {
            $user['secretcode'] = $request->key;
            $user['tauth'] = 1;
            $user['tfver'] = 1;
            $user->save();

            $message = 'Google Two Factor Authentication Enabled Successfully';
            send_email($user['email'], 'Google 2FA', $user['first_name'], $message);


            $sms =  'Google Two Factor Authentication Enabled Successfully';
            send_sms($user->mobile, $sms);

            return back()->with('message', 'Google Authenticator Enabeled Successfully');
        } else {
            return back()->with('alert', 'Wrong Verification Code');
        }
    }
    public function searchTreeIndex(Request $request)
    {
        $data = User::where('username', $request->username)->first();
        if ($data != '' && $data->username != Auth::user()->username) {
            if (isset($_GET['username'])) {
                $treefor = $_GET['username'];
            } else {
                $treefor = $request->username;
            }
            $count = \App\User::where('id', Auth::user()->id)->count();
            if ($count == 0) {
                return redirect('/tree')->with('alert', 'Opps, No user found');
            }
            $midd = \App\User::where('username', $treefor)->first();
            $uid = Auth::user()->id;
            if (treeeee($midd->id, $uid) == 0 && $midd->id != $uid) {
                return redirect('/tree')->with('alert', 'You have no permission to view this Tree');
            }
            return view('fonts.marketing.my_tree', compact('treefor'));
        } else {
            return redirect()->back()->with('alert', 'Opps, No user found');
        }
    }

    public function updatePremium()
    {
        $comission = ChargeCommision::first();
        $user = User::find(Auth::id());
        $ref_id = $user->referrer_id;
        $ref_user = User::find($ref_id);
        $new = $ref_user['balance']  = $ref_user['balance'] + $comission->update_commision_sponsor;
        $ref_user->save();

        Transaction::create([
            'user_id' => $ref_user->id,
            'trans_id' => rand(),
            'time' => Carbon::now(),
            'description' => 'REFERRAL COMMISSION' . '#ID' . '-' . 'REF' . rand(),
            'amount' => $comission->update_commision_sponsor,
            'new_balance' => $new,
            'type' => 1,
            'charge' => 0,
        ]);

        Income::create([
            'user_id' => $ref_user->id,
            'amount' => $comission->update_commision_sponsor,
            'description' => 'Deposit Commision From' . ' ' . $user->username,
            'type' => 'R'
        ]);

        $new_balance = $user['balance'] =  $user['balance'] - $comission['update_charge'];
        $user['paid_status'] = 1;
        $user->save();

        // Taka to sponsor
        updatePaid($user->id);
        // UPDATE BV
        updateDepositBV($user->id, '1');
        Transaction::create([
            'user_id' => $user->id,
            'trans_id' => rand(),
            'time' => Carbon::now(),
            'description' => 'UPGRADE TO PREMIUM' . '#ID' . '-' . 'UPDATE' . rand(),
            'amount' => '-' . $comission['update_charge'],
            'new_balance' => $new_balance,
            'type' => 2,
            'charge' => 0,
        ]);

        return redirect()->back()->with('message', 'Congratulations, You are successfully upgrade your account');
    }

    public function addIndex()
    {
        $package_id = Auth::user()->package_id;
        $package = Package::find($package_id);
        $general = General::first();
        // $add_history = UserAdvertise::where('user_id', Auth::id())->count();

        // if ($add_history == 0) {
        //     echo "sdfsd";
        $advertise =  Advertise::where('quantity', '>=', DB::raw('remain'))
            ->inRandomOrder()
            ->take($package->click)
            ->where('date', date('Y-m-d'))->get();

        foreach ($advertise as $data) {
            $user_ad = UserAdvertise::where('user_id', Auth::id())->where('add_id', $data->id)->count();
            if ($user_ad == 0) {
                UserAdvertise::create([
                    'user_id' => Auth::id(),
                    'date' => date('Y-m-d'),
                    'add_id' => $data->id,
                    'status' => 1,
                ]);
            }
        }
        $add = UserAdvertise::where('user_id', Auth::user()->id)
            ->where('date', date('Y-m-d'))->get();
        return view('fonts.marketing.advertise', compact('add'));
        // } else {

        //     $add = UserAdvertise::where('user_id', Auth::user()->id)
        //         ->where('date', date('Y-m-d'))->get();
        //     return view('fonts.marketing.advertise', compact('add'));
        // }
    }

    public function getIframe($id)
    {
        $add = Advertise::where('id', $id)->first();
        $user_add = UserAdvertise::where('user_id', Auth::user()->id)
            ->where('add_id', $add->id)
            ->where('date', date('Y-m-d'))->first();
        return view('fonts.marketing.iframe', compact('add', 'user_add'));
    }

    public function getAdvertise(Request $request)
    {
        $package_id = Auth::user()->package_id;
        $reffer_id = Auth::user()->referrer_id;

        if ($reffer_id) {
            // echo ($reffer_id);
            $reffer = User::findOrfail($reffer_id);
            $package = Package::find($package_id);
            $unit_price = $package['unit_price'];
            $percent_of_unit_price = (20 / 100) * $unit_price;
            //dd($percent_of_unit_price);
            $total_balance = $reffer['reffral_balance'] = $reffer['reffral_balance'] + $percent_of_unit_price;
            $reffer->save();
            $username = Auth::user()->username;
            Income::create([
                'user_id' => $reffer_id,
                'amount' => $percent_of_unit_price,
                'total_balance' => $total_balance,
                'description' => "Refferal Click Income Added By $username",
                'type' => 'R',
            ]);
        }
        $package = Package::find($package_id);
        //dd($package);
        $id = $request->user_add;
        $advertise = $request->advertise;

        $pranto_add = UserAdvertise::find($id);
        if ($pranto_add->status == 1) {
            UserAdvertise::where('add_id', $advertise)->update(['status' => 0]);
            $add = Advertise::whereId($advertise)->first();
            // Advertise::whereId($advertise)
            //     ->update([
            //         'remain' => $add->remain + 1,
            //     ]);
            $user = User::findOrFail(Auth::user()->id);
            $new_balance = $user['balance'] = $user['balance'] + $package->unit_price;
            $user->save();

            Transaction::create([
                'user_id' => Auth::user()->id,
                'trans_id' => rand(),
                'time' => Carbon::now(),
                'description' => 'CLICKADD' . '#ID' . '-' . 'CA' . rand(),
                'amount' => $package->unit_price,
                'new_balance' => $new_balance,
                'type' => 1,
            ]);
        } else {
            return Session::flash('wrong', 'Fruad Detected: Multiple Click Not Support!!');
        }
    }

    public function indexAdvertise()
    {
        $pack = Package::whereStatus(1)->get();
        return view('fonts.marketing.my_ad', compact('pack'));
    }

    public function buyPack(Request $request)
    {
        $pack_id = $request->package_id;
        return view('fonts.marketing.create_ad', compact('pack_id'));
    }

    public function createAdvertise(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required',
        ]);
        $pack = Package::findOrFail($request->package_id);
        $user = User::find(Auth::id());
        $new_balance = $user['balance'] =  $user['balance'] - $pack['price'];
        $user->save();

        Transaction::create([
            'user_id' => Auth::user()->id,
            'trans_id' => rand(),
            'time' => Carbon::now(),
            'description' => 'BUYPACKAGE' . '#ID' . '-' . 'BP' . $pack->title,
            'amount' => '-' . $pack['price'],
            'new_balance' => $new_balance,
            'type' => 9,
        ]);

        Advertise::create([
            'title' => $request->title,
            'token' => str_random(),
            'link' => $request->link,
            'quantity' => $pack->click,
            'remain' => 0,
            'user_id' => Auth::user()->id,
            'package_id' => $pack->id,
            'package_status' => 3,
        ]);

        $message = 'Congratulations,Your Advertise Create Complete. Please wait for admin Confirmation.
         If your advertise reject, you will get your payment back.';
        send_email($user['email'], 'Advertise Create Complete', $user['first_name'], $message);

        $sms =  'Advertise Create Complete';
        send_sms($user->mobile, $sms);

        return redirect('home')->with('message', 'Advertise Submit Complete, wait for admin confirmation');
    }

    public function myAdvertise()
    {
        $add = Advertise::where('user_id', Auth::id())->get();
        return view('fonts.marketing.user_ad', compact('add'));
    }
}