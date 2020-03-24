<?php

namespace App\Http\Controllers;

use App\Logo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class LogoController extends Controller
{
    public function logoIndex()
    {

        return view('admin.interface.logo.create') ;
    }

    public function updateLogo(Request $request)
    {
        $this->validate($request,array(
            'logo' => 'required|mimes:png,jpg,jpeg' ,
        ));

        if ($request->hasFile('logo')) {
            unlink('assets/images/fontend_logo/logo.png');
            $image = $request->file('logo');
            $filename = 'logo' . '.' . 'png';
            $location = 'assets/images/fontend_logo/'. $filename;
            Image::make($image)->save($location);
        };

        return redirect()->back()->withMsg('Successfully Updated');
    }

    public function updateIcon(Request $request)
    {
        $this->validate($request,array(
            'icon' => 'required|mimes:jpeg,jpg,png' ,
        ));

        if ($request->hasFile('icon')) {
            unlink('assets/images/fontend_logo/icon.png');
            $image = $request->file('icon');
            $filename = 'icon' . '.' . 'png';
            $location = 'assets/images/fontend_logo/'. $filename;
            Image::make($image)->save($location);
        }
        return redirect()->back()->withMsg('Successfully Updated');
    }
}
