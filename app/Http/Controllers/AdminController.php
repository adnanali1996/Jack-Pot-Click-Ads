<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\Income;
use App\Deposit;
use App\General;
use App\Package;
use App\Withdraw;
use App\Advertise;
use Carbon\Carbon;
use App\MemberExtra;
use App\Transaction;
use App\PackageDetail;
use App\UserAdvertise;
use App\ChargeCommision;
use App\WithdrawTrasection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }

    public function refresh_adds()
    {
        $affected = DB::table('advertises')->update(array('date' => date('Y-m-d')));
        UserAdvertise::truncate();
        return redirect()->back();
    }
    public function user_status(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user_status = $user->status;
        if ($user->status == 1) {
            $user->status = 0;
            $user->paid_status = 0;
        } else {
            $user->status = 1;
            $user->paid_status = 1;
        }
        $user->save();
    }
    public function user_email_status(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user_status = $user->emailv;
        if ($user->emailv == 1) {
            $user->emailv = 0;
        } else {
            $user->emailv = 1;
        }
        $user->save();
    }
    public function saveResetPassword(Request $request)
    {


        $this->validate($request, [
            'passwordold' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $c_password = Admin::find($request->id)->password;
            $c_id = Admin::find($request->id)->id;
            $user = Admin::findOrFail($c_id);
            if (Hash::check($request->passwordold, $c_password)) {
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                return redirect()->back()->withMsg('Password Changes Successfully.');
            } else {
                session()->flash('message', 'Password Not Matched');
                Session::flash('type', 'warning');
                return redirect('admin/home');
            }
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'warning');
            return redirect('admin/home');
        }
    }

    public function usersIndex()
    {
        $user = User::orderBy('id', 'desc')->paginate(15);
        return view('admin.user_mmanagement.index', compact('user'));
    }

    public function indexWithdraw()
    {
        $withdraw = Withdraw::all();
        return view('admin.withdraw.add_withdraw_method', compact('withdraw'));
    }

    public function storeWithdraw(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,svg',
            'min_amo' => 'required|numeric|min:1',
            'max_amo' => 'required|numeric|min:1',
            'chargefx' => 'required',
            'chargepc' => 'required',
            'rate' => 'required',
            'processing_day' => 'required',
        ]);

        $withdraw = Withdraw::create($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'assets/images/withdraw/' . $filename;
            Image::make($image)->save($location);
            $withdraw->image =  $filename;
            $withdraw->save();
        }

        return redirect()->back()->withMsg('Created Payment Method Successfully');
    }

    public function updateWithdraw(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'image' => 'mimes:jpg,jpeg,png,svg',
            'min_amo' => 'required|numeric|min:1',
            'max_amo' => 'required|numeric|min:1',
            'chargefx' => 'required',
            'chargepc' => 'required',
            'rate' => 'required',
            'currency' => 'required',
            'processing_day' => 'required',
            'status' => 'required',
        ]);

        $withdraw = Withdraw::whereId($id)
            ->update([
                'name' => $request->name,
                'min_amo' => $request->min_amo,
                'max_amo' => $request->max_amo,
                'chargefx' => $request->chargefx,
                'chargepc' => $request->chargepc,
                'rate' => $request->rate,
                'currency' => $request->currency,
                'processing_day' => $request->processing_day,
                'status' => $request->status,
            ]);

        $general = Withdraw::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'assets/images/withdraw/' . $filename;
            Image::make($image)->save($location);
            $general->image =  $filename;
            $general->save();
        }

        return redirect()->back()->withMsg('Updated Payment Method Successfully');
    }

    public function requestWithdraw()
    {
        $withdraw = WithdrawTrasection::orderBy('id', 'desc')->where('status', 0)->paginate(15);
        return view('admin.withdraw.withdraw_request', compact('withdraw'));
    }

    public function detailWithdraw($id)
    {
        $data = WithdrawTrasection::findOrFail($id);
        return view('admin.withdraw.withdraw_detal', compact('data'));
    }

    public function repondWithdraw(Request $request, $id)
    {
        $this->validate($request, [
            'message' => 'required',
        ]);
        WithdrawTrasection::whereId($id)
            ->update([
                'status' => $request->status,
            ]);
        if ($request->status == 1) {
            $withdraw = WithdrawTrasection::find($id);
            $user_id = $withdraw->user_id;
            $user = User::find($user_id);
            $general = General::first();


            $message = $request->message;


            send_email($user['email'], 'Withdraw Request Accept', $user->first_name, $message);

            $sms = 'Congratulations! Your Withdraw request  accepted.';
            send_sms($user['mobile'], $sms);

            $sms = $request->message;
            send_sms($user['mobile'], $sms);

            return redirect('admin/withdraw/requests')->withMsg('Paid Complete');
        } else {
            $withdraw = WithdrawTrasection::find($id);
            $user_id = $withdraw->user_id;
            $user = User::find($user_id);
            User::whereId($user_id)
                ->update([
                    'balance' => $user->balance + $withdraw->amount + $withdraw->charge
                ]);

            $message = $request->message;

            send_email($user['email'], 'Withdraw Request Refund', $user->first_name, $message);
            $sms = 'Sorry! Withdraw Request Refund';
            send_sms($user['mobile'], $sms);

            return redirect('admin/withdraw/requests')->withMsg('Refund Complete');
        }
    }
    public function showWithdrawLog()
    {
        $withdraw = WithdrawTrasection::orderBy('id', 'desc')->get();
        return view('admin.withdraw.view_log', compact('withdraw'));
    }

    public function indexEmail()
    {
        $temp = General::first();
        if (is_null($temp)) {
            $default = [
                'esender' => 'email@example.com',
                'emessage' => 'Email Message',
                'smsapi' => 'SMS Message',

            ];
            General::create($default);
            $temp = General::first();
        }
        return view('admin.website.email', compact('temp'));
    }

    public function updateEmail(Request $request)
    {
        $temp = General::first();
        $this->validate($request, [
            'esender' => 'required',
            'emessage' => 'required'
        ]);

        $temp['esender'] = $request->esender;
        $temp['emessage'] = $request->emessage;

        $temp->save();

        return back()->withMsg('Email Settings Updated Successfully!');
    }

    public function smsApi()
    {
        $temp = General::first();
        if (is_null($temp)) {
            $default = [
                'esender' => 'email@example.com',
                'emessage' => 'Email Message',
                'smsapi' => 'SMS Message',

            ];
            General::create($default);
            $temp = General::first();
        }
        return view('admin.website.sms', compact('temp'));
    }

    public function smsUpdate(Request $request)
    {
        $temp = General::first();

        $this->validate($request, [
            'smsapi' => 'required',
        ]);
        $temp['smsapi'] = $request->smsapi;

        $temp->save();

        return back()->withMsg('SMS Api Updated Successfully!');
    }

    public function indexUserDetail($id)
    {
        $user = User::find($id);
        $packages = Package::all();
        return view('admin.user_mmanagement.view', compact('user', 'packages'));
    }

    public function userUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'birth_day' => 'required',
            'city' => 'required',
            'country' => 'required',
            'update_pkg' => 'required',
        ]);

        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }

        if ($request->emailv == 'on') {
            $emailv = 0;
        } else {
            $emailv = 1;
        }

        if ($request->smsv == 'on') {
            $smsv = 0;
        } else {
            $smsv = 1;
        }

        User::whereId($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'birth_day' => $request->birth_day,
            'city' => $request->city,
            'country' => $request->country,
            'status' => $status,
            'emailv' => $emailv,
            'smsv' => $smsv,
            'package_id' => $request->update_pkg,
        ]);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function indexUserBalance($id)
    {
        $user = User::find($id);
        return view('admin.user_mmanagement.balance', compact('user'));
    }

    public function indexBalanceUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'amount' => 'required|numeric|min:1',
            'message' => 'required',
        ]);

        if ($request->operation == 'on') {
            $user = User::find($id);
            $new_balance = $user['balance'] =  $user['balance'] + $request->amount;
            $user->save();
            $message = $request->message;

            Transaction::create([
                'user_id' => $id,
                'trans_id' => rand(),
                'time' => Carbon::now(),
                'description' => 'ADMIN' . '#ID' . '-' . 'ADD' . rand(),
                'amount' => $request->amount,
                'new_balance' => $new_balance,
                'type' => 5,
            ]);

            send_email($user['email'], 'Admin Balance Add', $user['first_name'], $message);


            $sms = $request->message;
            send_sms($user['mobile'], $sms);
            return redirect()->back()->withMsg('Balance Add Successful');
        } else {
            $user = User::find($id);
            if ($user->balance > $request->amount) {
                $new_balance = $user['balance'] =  $user['balance'] - $request->amount;
                $user->save();
                $message = $request->message;

                Transaction::create([
                    'user_id' => $id,
                    'trans_id' => rand(),
                    'time' => Carbon::now(),
                    'description' => 'ADMIN' . '#ID' . '-' . 'SUBTRACT' . rand(),
                    'amount' => '-' . $request->amount,
                    'new_balance' => $new_balance,
                    'type' => 6,
                ]);

                send_email($user['email'], 'Admin Balance Subtract', $user['first_name'], $message);
                $sms = $request->message;
                send_sms($user['mobile'], $sms);
                return redirect()->back()->withMsg('Balance Subtract Successful');
            }
            return redirect()->back()->withdelmsg('Insufficient Balance');
        }
    }

    public function userSendMail($id)
    {
        $user = User::find($id);
        return view('admin.user_mmanagement.user_mail', compact('user'));
    }

    public function userSendMailUser(Request $request, $id)
    {
        $user = User::find($id);
        $subject = $request->subject;
        $message = $request->message;
        send_email($user['email'], $subject, $user['first_name'], $message);
        return redirect()->back()->withMsg('Mail Send');
    }

    public function matchIndex()
    {
        $match = Income::where('type', 'B')->get();
        return view('admin.matching.index', compact('match'));
    }

    public function matchGenerate(Request $request)
    {
        $this->validate($request, [
            'sure' => 'required',
        ]);

        if ($request->sure == 'SURE' || $request->sure == 'sure') {
            $gen = ChargeCommision::first();
            //GENERATE
            $ddaa = MemberExtra::where('left_bv', '>', 0)
                ->where('right_bv', '>', 0)
                ->get();

            foreach ($ddaa as $data) {
                $lbv = $data->left_bv;
                $rbv = $data->right_bv;
                $lowest = ($lbv < $rbv) ? $lbv : $rbv;
                $bonus = $gen->match_bonus * $lowest;
                $bvp = $lowest;
                //FLASH
                $nlbv = $data->left_bv - $lowest;
                $nrbv = $data->right_bv - $lowest;
                MemberExtra::where('user_id', $data->user_id)
                    ->update([
                        'left_bv' => $nlbv,
                        'right_bv' => $nrbv,
                    ]);
                //FLASH
                $paidid =  User::whereId($data->user_id)->first();
                if ($paidid->paid_status == 1) {
                    // ADD THE BALANCE
                    $cbal = User::whereId($data->user_id)->first();
                    $newbal = $cbal->balance + $bonus;
                    $user_b_update = User::whereId($data->user_id)
                        ->update([
                            'balance' => $newbal
                        ]);
                    ///ADD THE BALANCE
                    if ($user_b_update) {
                        Transaction::create([
                            'user_id' => $data->user_id,
                            'trans_id' => rand(),
                            'time' => Carbon::now(),
                            'description' => 'Matching Bonus Of ' . $bvp . ' Users',
                            'amount' => $bonus,
                            'new_balance' => $newbal,
                            'type' => 4,
                            'charge' => 0
                        ]);

                        Income::create([
                            'user_id' => $data->user_id,
                            'amount' => $bonus,
                            'description' => 'Matching Bonus Of ' . $bvp . ' Users',
                            'type' => 'B'
                        ]);
                    } else {
                        return redirect()->back()->withdelmsg('Something Wrong Please Some Again');
                    }
                }
            }
            return redirect()->back()->withmsg('Generate Successful');
        } else {
            return redirect()->back()->withdelmsg('Invalid Keyword');
        }
    }

    public function userSearch(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if ($user == '') {
            $user_notfound = 0;
            return redirect()->back()->with('not_found', 'Oops, User Not Found!');
        } else {
            return view('admin.user_mmanagement.view', compact('user'));
        }
    }

    public function userSearchEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user == '') {
            $user_notfound = 0;
            return redirect()->back()->with('not_found', 'Oops, User Not Found!');
        } else {
            return view('admin.user_mmanagement.view', compact('user'));
        }
    }

    public function deactiveUser()
    {
        $user = User::orderBy('id', 'desc')->where('status', 0)->paginate(15);
        return view('admin.deactive_user', compact('user'));
    }

    public function paidUser()
    {
        $user = User::orderBy('id', 'desc')->where('paid_status', 1)->paginate(15);
        return view('admin.paid_user', compact('user'));
    }

    public function freeUser()
    {
        $user = User::orderBy('id', 'desc')->where('paid_status', 0)->paginate(15);
        return view('admin.paid_user', compact('user'));
    }

    public function depositLog()
    {
        $add_fund = Deposit::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.deposit_log', compact('add_fund'));
    }

    public function transBalanceLog()
    {
        $trans = Transaction::where('type', 3)->orderBy('id', 'desc')->get();
        return view('admin.transfer_balance_log', compact('trans'));
    }

    public function transView($id)
    {
        $trans_object = Transaction::where('user_id', $id)->first();
        $trans = Transaction::where('user_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.user_mmanagement.trans_view', compact('trans', 'trans_object'));
    }

    public function depositView($id)
    {
        $trans_object = Deposit::where('user_id', $id)->first();
        $trans = Deposit::where('user_id', $id)->where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.user_mmanagement.deposit_view', compact('trans', 'trans_object'));
    }

    public function withDrawView($id)
    {
        $trans_object = WithdrawTrasection::where('user_id', $id)->first();
        $trans = WithdrawTrasection::where('user_id', $id)->where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.user_mmanagement.withdraw_view', compact('trans', 'trans_object'));
    }

    public function sendMoneyView($id)
    {
        $trans_object = Transaction::where('user_id', $id)->first();
        $trans = Transaction::where('user_id', $id)->where('type', 3)->orderBy('id', 'desc')->get();
        return view('admin.user_mmanagement.send_money_view', compact('trans', 'trans_object'));
    }

    public function generateAdmin()
    {
        $trans = Transaction::where('type', 5)->orderBy('id', 'desc')->get();
        return view('admin.admin_generate', compact('trans'));
    }

    public function subtractAdmin()
    {
        $trans = Transaction::where('type', 6)->orderBy('id', 'desc')->get();
        return view('admin.admin_subtract', compact('trans'));
    }

    public function refView()
    {
        $trans = Income::where('type', 'R')->orderBy('id', 'desc')->get();
        return view('admin.ref_amount', compact('trans'));
    }

    public function newAddvertise()
    {
        $add = Advertise::orderBy('id', 'desc')->where('package_status', 1)->paginate(15);
        return view('admin.ptc.add', compact('add'))->with('packages', Package::all()->where('status', 1));
    }

    public function newAddvertiseStore(Request $request)
    {

        // dd($userId);
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required',
        ]);
        $package_id = Auth::user()->package_id;
        //dd($package_id);
        $package = Package::find($package_id);

        // echo $package;
        // dd($request->all());
        Advertise::create([
            'title' => $request->title,
            'link' => $request->link,
            'price' => $package->unit_price,
            'quantity' => $package->click,
            'package_status' => 1,
            'token' => $request->token,
            'remain' => 0,
            'package_id' => $package->package_id,
            'date' => date('Y-m-d'),
        ]);
        return redirect()->back()->withMsg('Successfully Create');
    }

    public function newAddvertiseEdit($id)
    {
        $add = Advertise::findOrFail($id);
        return view('admin.ptc.edit', compact('add'))->with('packages', Package::all()->where('status', 1));
    }

    public function newAddvertiseUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required',
            // 'price' => 'required|numeric|min:0',
            // 'package_id' => 'required',
        ]);
        $add = Input::except(['_method', '_token']);
        Advertise::whereId($id)->update($add);
        return redirect('admin/add/new')->withMsg('Successfully Update');
    }

    public function newAddvertiseDelete($id)
    {
        Advertise::whereId($id)->delete();
        UserAdvertise::where('add_id', $id)->delete();
        return redirect()->back()->withMsg('Successfully Deleted');
    }

    public function packageIndex()
    {
        $pack = Package::all();
        return view('admin.package.index', compact('pack'));
    }

    public function packageStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required|numeric|min:0',
            'click' => 'required|numeric|min:1',
            'unit_price' => 'required|numeric|min:0',
            'minimum_withdraw' => 'required|numeric|min:0',
        ]);
        $pack =  Package::create([
            'status' => 1,
            'title' => $request->title,
            'price' => $request->price,
            'click' => $request->click,
            'unit_price' => $request->unit_price,
            'minimum_withdraw' => $request->minimum_withdraw,
        ]);
        foreach ($request->detail as $data) {
            PackageDetail::create([
                'package_id' => $pack->id,
                'detail' => $data
            ]);
        }
        return redirect()->back()->withMsg('Successfully Create');
    }

    public function packageDelete($id)
    {
        PackageDetail::where('package_id', $id)->delete();
        Package::whereId($id)->delete();
        return redirect()->back()->withMsg('Successfully Delete');
    }

    public function packageEdit($id)
    {
        $pack = Package::findOrFail($id);
        return view('admin.package.edit', compact('pack'));
    }


    public function packageUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required|numeric|min:0',
            'click' => 'required|numeric|min:1',
            'unit_price' => 'required|numeric|min:0',
            'minimum_withdraw' => 'required|numeric|min:0',
        ]);
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }

        Package::where('id', $id)
            ->update([
                'status' => $status,
                'title' => $request->title,
                'price' => $request->price,
                'click' => $request->click,
                'unit_price' => $request->unit_price,
                'minimum_withdraw' => $request->minimum_withdraw,
            ]);

        for ($i = 0; $i < count($request->detail); $i++) {
            PackageDetail::updateOrCreate(['id' => $request->deg_id[$i],], [
                'detail' => $request->detail[$i],
                'package_id' => $id
            ]);
        }

        return redirect('admin/ptc/packages')->withMsg('Updated');
    }

    public function packageDetailDelete(Request $request)
    {
        $pranto = $request->id;
        PackageDetail::destroy($pranto);
        return $pranto;
    }

    public function reqAddIndex()
    {
        $add = Advertise::where('package_status', 3)->paginate(15);
        return view('admin.req_advertise.index', compact('add'));
    }

    public function approveAdd(Request $request)
    {
        $this->validate($request, [
            'advertise_id' => 'required',
            'user_id' => 'required',
            'price' => 'required',
        ]);

        Advertise::whereId($request->advertise_id)
            ->update([
                'package_status' => 1,
                'price' => $request->price,
            ]);
        $user = User::findOrFail($request->user_id);
        $message = 'Congratulations,Your Advertise Approved. Your Advertise on live.';
        send_email($user['email'], 'Advertise Create Complete', $user['first_name'], $message);

        $sms =  'Congratulations,Your Advertise Approved. Your Advertise on live';
        send_sms($user->mobile, $sms);
        return redirect()->back()->withMsg('Approved');
    }

    public function rejectAdd(Request $request)
    {
        $this->validate($request, [
            'advertise_id' => 'required',
            'user_id' => 'required',
            'package_id' => 'required',
        ]);

        Advertise::whereId($request->advertise_id)
            ->update(['package_status' => 0]);
        $pack = Package::findOrFail($request->package_id);
        $user = User::findOrFail($request->user_id);
        $new_balance = $user['balance'] =  $user['balance'] + $pack['price'];
        $user->save();

        Transaction::create([
            'user_id' => $user['id'],
            'trans_id' => rand(),
            'time' => Carbon::now(),
            'description' => 'BACKMONEY' . '#ID' . '-' . 'BM' . rand(),
            'amount' => $pack['price'],
            'new_balance' => $new_balance,
            'type' => 1,
        ]);

        $message = 'Your Advertise Rejected. Please try another advertise. Your buying package payment back';
        send_email($user['email'], 'Advertise Reject', $user['first_name'], $message);

        $sms =  'Your Advertise Rejected. Please try another advertise';
        send_sms($user->mobile, $sms);
        return redirect()->back()->withMsg('Successfully Rejected');
    }

    public function rejectAddIndex()
    {
        $add = Advertise::where('package_status', 0)->paginate(15);
        return view('admin.req_advertise.reject_ad', compact('add'));
    }

    public function allAddIndex()
    {
        $add = Advertise::where('user_id', '!=', null)->where('package_status', 1)->paginate(15);
        return view('admin.req_advertise.all_ad', compact('add'));
    }

    public function limitIndex()
    {
        return view('admin.ptc.settings');
    }

    public function buyPackageHistory()
    {
        $pack = Transaction::where('type', 9)->get();
        return view('admin.buy_package_log', compact('pack'));
    }
}