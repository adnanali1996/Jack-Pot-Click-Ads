<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);
    }

    public function menuIndex()
    {
        $menu = Menu::orderBy('id', 'desc')->paginate(10);
        return view('admin.interface.menu.index', compact('menu')) ;
    }

    public function menuCreate()
    {
        return view('admin.interface.menu.create');
    }

    public function menuStore(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);

        $p['title'] = $request->title;
        $p['description'] = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';
            $location = 'assets/images/blog/'. $filename;
            Image::make($image)->save($location);
            $p['image'] = $filename;
        };

        Menu::create($p);
        return redirect()->back()->withMsg('Created Successfully');
    }

    public function menuDelete($id)
    {
        
        $m = Menu::find($id);
        @unlink('assets/images/blog/'.$m->image);
        $m->delete();
        return redirect()->back()->withMsg('Deleted Successfully');
    }

    public function menuEdit($id)
    {
        $menu = Menu::find($id);
        return view('admin.interface.menu.edit', compact('menu'));
    }

    public function menuUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);
        $te = Menu::findOrFail($id);

        $in = Input::except('_token', '_method');

        if($request->hasFile('image')){
            @unlink('assets/images/blog/'.$te->image);
            $image = $request->file('image');
            $filename = time().'.'.'jpg';
            $location = 'assets/images/blog/' . $filename;
            Image::make($image)->save($location);
            $in['image'] = $filename;
        }
        $te->fill($in)->save();
        return redirect('admin/blog')->withMsg('Updated Successfully');
    }
}
