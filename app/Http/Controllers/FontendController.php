<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Team;
use App\User;
use App\Silder;
use App\Deposit;
use App\Gateway;
use App\General;
use App\Package;
use App\Service;
use Carbon\Carbon;
use App\Newsletter;
use App\Testimonal;
use App\ChargeCommision;
use App\WithdrawTrasection;
use Illuminate\Http\Request;
use App\Lib\GoogleAuthenticator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FontendController extends Controller
{

    // FOR SHOWING THE REGISTER PAGE WITH REFFERAL LINK
    public function affiliate_register($id)
    {
        $user_id = User::where('affiliate_id', $id)->pluck('id')->first();
        return view('auth.register')->with('affiliate_id', $id)->with('user_id', $user_id)->with('packages', Package::all()->where('status', 1));
    }
    public function fontIndex()
    {
        $service = Service::all();
        $menu = Menu::orderBy('id', 'desc')->take(3)->get();
        $slider = Silder::findOrFail(20);
        $commision = ChargeCommision::first();
        $team = Team::all();
        $testimonial = Testimonal::all();
        $pack = Package::where('status', 1)->get();
        $gateway = Gateway::where('status', 1)->get();
        $deposit = Deposit::orderBy('id', 'desc')->where('status', 1)->take(5)->get();
        $withdraw = WithdrawTrasection::orderBy('id', 'desc')->where('status', 1)->take(5)->get();
        // $date = Carbon::now('Y-m-d')->addMonths(2);

        //exit();
        return view('fonts.index', compact(
            'service',
            'slider',
            'commision',
            'team',
            'testimonial',
            'gateway',
            'deposit',
            'withdraw',
            'pack',
            'menu'
        ));
    }

    public function newsIndex()
    {

        $news = Menu::orderBy('id', 'desc')->paginate(4);
        $first_last = Menu::orderBy('id', 'asc')->take(6)->get();
        $last_first = Menu::orderBy('id', 'desc')->take(6)->get();
        return view('fonts.contact', compact('news', 'first_last', 'last_first'));
    }

    public function newsShow($id)
    {
        $menu_content = Menu::findOrFail($id);
        $first_last = Menu::orderBy('id', 'asc')->take(6)->get();
        $last_first = Menu::orderBy('id', 'desc')->take(6)->get();
        return view('fonts.menu', compact(
            'menu_content',
            'first_last',
            'last_first'
        ));
    }

    public function termsIndex()
    {
        return view('fonts.terms');
    }

    public function policyIndex()
    {
        return view('fonts.policy');
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $general = General::first();
        send_email($general->email, 'Contact Us Message', 'I am ' . ' ' . $request->name, $request->message);

        return redirect()->back()->with('message', 'Message Send Complete');
    }

    public function getRefId(Request $request)
    {
        $id = User::where('username', $request->ref_id)->first();
        if ($id == '') {
            return "<span class='help-block'><strong style='color: #f90808'>Referrer Name Not Found</strong></span>";
        } else {
            return "<span class='help-block'><strong style='color: #1ed81e'>Referrer Name Matched</strong></span>
                    <input type='hidden' id='referrer_id' value='$id->id' name='referrer_id'>";
        }
    }

    public function getPosition(Request $request)
    {
        if ($request->referrer_id == '') {
            return "<span class='help-block'><strong style='color: #f90808'>At First Put Your Referrer Name</strong></span>";
        } else {
            $referrer_id = $request->referrer_id;
            $poss = $request->pos;
            $willPosition = getLastChildOfLR($referrer_id, $poss);
            $pos = User::where('id', $willPosition)->first();
            return "<span class='help-block'><strong style='color: #1ed81e'>You Will Join Under - $pos->username </strong></span>";
        }
    }

    public function authorization()
    {
        $user = User::find(Auth::id());
        $general = General::find(1);
        if (Auth::user()->tfver == '1' && Auth::user()->status == '1' && Auth::user()->emailv == 1 && Auth::user()->smsv == 1) {
            return redirect('home');
        } else {
            return view('auth.notauthor')->with('user', $user)->with('general', $general);
        }
    }

    public function sendemailver()
    {
        $user = User::find(Auth::id());
        $chktm = $user->vsent + 1000;
        if ($chktm > time()) {
            $delay = $chktm - time();
            return back()->with('alert', 'Please Try after ' . $delay . ' Seconds');
        } else {
            $code = substr(rand(), 0, 6);
            $message = 'Your Verification code is: ' . $code;
            $user['vercode'] = $code;
            $user['vsent'] = time();
            $user->save();
            send_email($user->email, 'Verification Code', $user['first_name'], $message);

            $sms = $message;
            send_sms($user['mobile'], $sms);
            return back()->with('success', 'Email verification code sent succesfully');
        }
    }
    public function sendsmsver()
    {
        $user = User::find(Auth::id());
        $chktm = $user->vsent + 1000;
        if ($chktm > time()) {
            $delay = $chktm - time();
            return back()->with('alert', 'Please Try after ' . $delay . ' Seconds');
        } else {
            $code = substr(rand(), 0, 6);
            $sms = 'Your Verification code is: ' . $code;
            $user['vercode'] = $code;
            $user['vsent'] = time();
            $user->save();

            send_sms($user->mobile, $sms);
            return back()->with('success', 'SMS verification code sent succesfully');
        }
    }

    public function emailverify(Request $request)
    {

        $this->validate($request, [
            'code' => 'required',
        ]);
        $user = User::find(Auth::id());

        $code = $request->code;
        if ($user->vercode == $code) {
            $user['emailv'] = 1;
            $user['vercode'] = str_random(10);
            $user['vsent'] = 0;
            $user->save();

            return redirect('home')->with('success', 'Email Verified');
        } else {
            return back()->with('alert', 'Wrong Verification Code');
        }
    }

    public function smsverify(Request $request)
    {

        $this->validate($request, [
            'code' => 'required',
        ]);
        $user = User::find(Auth::id());

        $code = $request->code;
        if ($user->vercode == $code) {
            $user['smsv'] = 1;
            $user['vercode'] = str_random(10);
            $user['vsent'] = 0;
            $user->save();

            return redirect('home')->with('success', 'SMS Verified');
        } else {
            return back()->with('alert', 'Wrong Verification Code');
        }
    }

    public function verify2fa(Request $request)
    {
        $user = User::find(Auth::id());

        $this->validate(
            $request,
            [
                'code' => 'required',
            ]
        );
        $ga = new GoogleAuthenticator();

        $secret = $user->secretcode;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;

        if ($oneCode == $userCode) {
            $user['tfver'] = 1;
            $user->save();
            return redirect('home');
        } else {

            return back()->with('alert', 'Wrong Verification Code');
        }
    }

    public function forgotPass(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user == null) {
            return back()->with('alert', 'Email Not Available');
        } else {
            $to = $user->email;
            $name = $user->first_name;
            $subject = 'Password Reset';
            $code = str_random(30);
            $message = 'Use This Link to Reset Password: ' . url('/') . '/reset/' . $code;

            DB::table('password_resets')->insert(
                ['email' => $to, 'token' => $code, 'status' => 0, 'created_at' => date("Y-m-d h:i:s")]
            );

            send_email($to, $subject, $name, $message);

            return back()->with('message', 'Password Reset Email Sent Succesfully');
        }
    }

    public function resetLink($code)
    {
        $reset = DB::table('password_resets')->where('token', $code)->orderBy('created_at', 'desc')->first();
        if ($reset->status == 1) {
            return redirect()->route('login')->with('alert', 'Invalid Reset Link');
        } else {
            return view('auth.passwords.reset', compact('reset'));
        }
    }

    public function passwordReset(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'token' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        $reset = DB::table('password_resets')->where('token', $request->token)->orderBy('created_at', 'desc')->first();
        $user = User::where('email', $reset->email)->first();
        if ($reset->status == 1) {
            return redirect()->route('login')->with('alert', 'Invalid Reset Link');
        } else {
            if ($request->password == $request->password_confirmation) {
                $user->password = bcrypt($request->password);
                $user->save();

                DB::table('password_resets')->where('email', $user->email)->update(['status' => 1]);

                $msg = 'Password Changed Successfully';
                send_email($user->email, 'Password Changed', $user->username, $msg);
                $sms = 'Password Changed Successfully';
                send_sms($user->mobile, $sms);

                return redirect()->route('login')->with('success', 'Password Changed');
            } else {
                return back()->with('alert', 'Password Not Matched');
            }
        }
    }
    public function pageNotFound()
    {
        return view('error.404');
    }

    public function storeSubscriber(Request $request)
    {

        if ($request->email == '' || $request->email == null) {
            return "<div class=\"alert alert-danger\">Please Input Valid Email And Name</div>";
        }
        $already = Newsletter::where('email', $request->email)->count();

        if ($already == 0) {
            Newsletter::create([
                'email' => $request->email,
            ]);

            $message = 'Welcome, You will get our every news. Stay with me. And we will tell you
        about our every New Feature.';
            send_email($request->email, 'Subscribe Complete', 'Subscriber', $message);

            return "<div class=\"alert alert-success\">Successfully Subscribe</div>";
        } else {
            return "<div class=\"alert alert-danger\">Email Already Exist</div>";
        }
    }
}