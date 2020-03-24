<?php

namespace App\Http\Controllers;

use App\Silder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;


class SilderController extends Controller
{
    public function slideIndex()
    {
        $slider = Silder::all();
        return view('admin.interface.slider.index', compact('slider'));
    }

    public function slideDelete($id)
    {
        $slider = Silder::find($id);
        $slider->delete();
        return redirect()->back()->withMsg('Successfully Deleted');
    }

    public function slideStore(Request $request)
    {
        $in = Input::except('_token');

        $ext = strtolower($request->image->getClientOriginalExtension()) ;

        if ( $ext != 'png' && $ext != 'jpg' && $ext!= 'jpeg')
        {
            return redirect()->back()->withErrors('Please Upload Validate Image');
        }else{
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time().'.'.'jpg';
                $location = 'assets/images/fontend_slide/' . $filename;
                Image::make($image)->save($location);
                $in['image'] = $filename;
            }
            Silder::create($in);
            return redirect()->back()->withMsg('Successfully Created');
        }
    }

    public function slideUpdate(Request $request, $id)
    {
        $general = Silder::find($id);
        $this->validate($request,array(
            'heading' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ));

        $general->description = $request->input('description');
        $general->heading = $request->input('heading');

        if ($request->hasFile('image')) {
            unlink('assets/images/fontend_slide/'.$general->image);
            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';

            $location = 'assets/images/fontend_slide/'. $filename;
            Image::make($image)->save($location);
            $general->image =  $filename;
        }
        $general->save();
        return redirect()->back()->withMsg('Successfully Updated');

    }
}
