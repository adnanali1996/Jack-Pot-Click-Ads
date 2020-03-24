<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Social;
use App\User;
use App\ChargeCommision;
use App\General;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        $general = General::find(1);
        return view('admin.general-setting.general', compact('general'));
    }

    public function limitUpdate(Request $request, $id)
    {
        $this->validate($request, array(
            'add_show' => 'required|numeric|min:1',
            'add_show_limit' => 'required|numeric|min:1',
        ));

        General::whereId($id)
            ->update([
                'add_show' => $request->add_show,
                'add_show_limit' => $request->add_show_limit,
            ]);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function update(Request $request, General $general, $id)
    {

        $this->validate($request, array(
            'web_title' => 'required',
            'currency' => 'required',
            'symbol' => 'required',
            'theme' => 'required',
            'start_date' => 'required',
            'sec_color' => 'required',
        ));

        if ($request->emailver == 'on') {
            $emailv = 0;
        } else {
            $emailv = 1;
        }

        if ($request->smsver == 'on') {
            $smsv = 0;
        } else {
            $smsv = 1;
        }

        if ($request->email_nfy == 'on') {
            $email_nfy = 1;
        } else {
            $email_nfy = 0;
        }

        if ($request->sms_nfy == 'on') {
            $sms_nfy = 1;
        } else {
            $sms_nfy = 0;
        }

        $user = User::all();
        foreach ($user as $key => $data) {
            User::whereId($data->id)
                ->update([
                    'emailv' => $emailv,
                    'smsv' => $smsv,
                ]);
        }
        General::whereId($id)->update([
            'web_title' => $request->web_title,
            'currency' => $request->currency,
            'symbol' => $request->symbol,
            'theme' => $request->theme,
            'sec_color' => $request->sec_color,
            'email_nfy' => $email_nfy,
            'sms_nfy' => $sms_nfy,
            'emailver' => $emailv,
            'smsver' => $smsv,
            'start_date' =>  date('Y-m-d', strtotime($request->start_date))
        ]);

        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function indexTerms(Request $request)
    {
        $terms = General::findOrFail(1);
        return view('admin.terms_policies.index', compact('terms'));
    }

    public function indexCommision(Request $request)
    {
        $charge = ChargeCommision::findOrFail(1);
        return view('admin.commision.index', compact('charge'));
    }

    public function indexFooter(Request $request)
    {
        $general = General::first();
        return view('admin.interface.footer.index', compact('general'));
    }

    public function updateFooter(Request $request)
    {
        $this->validate($request, array(
            'footer' => 'required',
            'footer_text' => 'required',
        ));
        $general = General::first();
        $input = Input::except(array('_method', '_token'));
        General::whereId($general->id)->update($input);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function indexContact(Request $request)
    {
        $general = General::first();
        return view('admin.interface.contact.contact', compact('general'));
    }

    public function updateContact(Request $request)
    {

        $this->validate($request, array(
            'address' => 'required',
            'google_map_address' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ));
        $general = General::first();
        $input = Input::except(array('_method', '_token'));
        General::whereId($general->id)->update($input);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function indexSocial(Request $request)
    {
        $social = Social::all();
        return view('admin.interface.social.index', compact('social'));
    }

    public function deleteSocialSocial(Request $request, $id)
    {
        return redirect('admin/home')->withDelmsg('Demo Version, Change Not Possible');
        $social = Social::find($id)->delete();
        return redirect()->back()->withMsg('Successfully Deleted');
    }

    public function storeSocial(Request $request)
    {
        $this->validate($request, array(
            'icon' => 'required',
            'link' => 'required',
        ));
        Social::create($request->all());
        return redirect()->back()->withMsg('Successfully Created');
    }

    public function updateSocial(Request $request, $id)
    {
        $this->validate($request, array(
            'icon' => 'required',
            'link' => 'required',
        ));

        $input = Input::except(array('_method', '_token'));
        Social::whereId($id)->update($input);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function updateCsafdsfontact(Request $request)
    {

        $this->validate($request, array(
            'address' => 'required',
            'google_map_address' => 'required',
        ));
        $general = General::first();
        $input = Input::except(array('_method', '_token'));
        General::whereId($general->id)->update($input);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function indexAbout(Request $request)
    {
        $general = General::first();
        return view('admin.interface.about.index', compact('general'));
    }

    public function updateAbout(Request $request, $id)
    {
        $general = General::find($id);
        $this->validate($request, array(

            'image' => 'mimes:jpeg,jpg,png',
            'about_text' => 'required',
        ));

        $general->about_text = $request->input('about_text');

        if ($request->hasFile('image')) {
            unlink('assets/images/about_image/' . $general->image);
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $location = 'assets/images/about_image/' . $filename;
            Image::make($image)->save($location);
            $general->image =  $filename;
        }
        $general->save();

        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function updateTerms(Request $request, $id)
    {
        $this->validate($request, array(
            'policy' => 'required',
            'terms' => 'required',
        ));
        General::whereId($id)->update([
            'policy' => $request->policy,
            'terms' => $request->terms,
        ]);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function UpdateCommision(Request $request, $id)
    {
        $this->validate($request, array(
            'transfer_charge' => 'required',
            'withdraw_charge' => 'required',
            'update_charge' => 'required',
            'update_commision_tree' => 'required',
            'update_commision_sponsor' => 'required',
            'match_bonus' => 'required',
            'update_text' => 'required',
        ));
        ChargeCommision::whereId($id)->update([
            'transfer_charge' => $request->transfer_charge,
            'withdraw_charge' => $request->withdraw_charge,
            'update_charge' => $request->update_charge,
            'update_commision_tree' => $request->update_commision_tree,
            'update_commision_sponsor' => $request->update_commision_sponsor,
            'update_text' => $request->update_text,
            'match_bonus' => $request->match_bonus,
        ]);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function indexTreeImage()
    {
        return view('admin.tree_image.index');
    }

    public function updateTreeImage(Request $request)
    {
        $this->validate($request, array(
            'paid_image' => 'mimes:png,jpg,jpeg',
            'free_image' => 'mimes:png,jpg,jpeg',
            'nouser_image' => 'mimes:png,jpg,jpeg',
        ));

        if ($request->hasFile('paid_image')) {
            unlink('assets/user/paid_user.png');
            $image = $request->file('paid_image');
            $filename = 'paid_user' . '.' . 'png';
            $location = 'assets/user/' . $filename;
            Image::make($image)->save($location);
        };

        if ($request->hasFile('free_image')) {
            unlink('assets/user/user.png');
            $image = $request->file('free_image');
            $filename = 'user' . '.' . 'png';
            $location = 'assets/user/' . $filename;
            Image::make($image)->save($location);
        };

        if ($request->hasFile('nouser_image')) {
            unlink('assets/user/no_user.png');
            $image = $request->file('nouser_image');
            $filename = 'no_user' . '.' . 'png';
            $location = 'assets/user/' . $filename;
            Image::make($image)->save($location);
        };

        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function backgroundImage()
    {
        return view('admin.interface.background_image.index');
    }

    public function backgroundImageUpdate(Request $request)
    {
        $this->validate($request, array(
            'service' => 'mimes:png,jpg,jpeg,svg',
            'join' => 'mimes:png,jpg,jpeg,svg',
            'counter' => 'mimes:png,jpg,jpeg,svg',
            'test' => 'mimes:png,jpg,jpeg,svg',
            'payment' => 'mimes:png,jpg,jpeg,svg',
            'menu' => 'mimes:png,jpg,jpeg,svg',
            'login' => 'mimes:png,jpg,jpeg,svg',
            'reg' => 'mimes:png,jpg,jpeg,svg',
            'forget' => 'mimes:png,jpg,jpeg,svg',
        ));

        if ($request->hasFile('service')) {
            unlink('assets/fonts/img/service-bg.jpg');
            $image = $request->file('service');
            $filename = 'service-bg' . '.' . 'jpg';
            $location = 'assets/fonts/img/' . $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('join')) {
            unlink('assets/fonts/img/call-to-action.png');
            $image = $request->file('join');
            $filename = 'call-to-action' . '.' . 'png';
            $location = 'assets/fonts/img/' . $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('counter')) {
            unlink('assets/fonts/img/counter-bg.jpg');
            $image = $request->file('counter');
            $filename = 'counter-bg' . '.' . 'jpg';
            $location = 'assets/fonts/img/' . $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('test')) {
            unlink('assets/fonts/img/testimonial-bg.jpg');
            $image = $request->file('test');
            $filename = 'testimonial-bg' . '.' . 'jpg';
            $location = 'assets/fonts/img/' . $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('payment')) {
            unlink('assets/fonts/img/payment-bg.jpg');
            $image = $request->file('payment');
            $filename = 'payment-bg' . '.' . 'jpg';
            $location = 'assets/fonts/img/' . $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('menu')) {
            unlink('assets/fonts/img/contact-us.jpg');
            $image = $request->file('menu');
            $filename = 'contact-us' . '.' . 'jpg';
            $location = 'assets/fonts/img/' . $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('login')) {
            unlink('assets/fonts/img/login_bg.jpg');
            $image = $request->file('login');
            $filename = 'login_bg' . '.' . 'jpg';
            $location = 'assets/fonts/img/' . $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('reg')) {
            unlink('assets/fonts/img/registration.jpg');
            $image = $request->file('reg');
            $filename = 'registration' . '.' . 'jpg';
            $location = 'assets/fonts/img/' . $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('forget')) {
            unlink('assets/fonts/img/forget_password.jpg');
            $image = $request->file('forget');
            $filename = 'forget_password' . '.' . 'jpg';
            $location = 'assets/fonts/img/' . $filename;
            Image::make($image)->save($location);
        }

        return redirect()->back()->withMsg('Successfully Updated');
    }
}