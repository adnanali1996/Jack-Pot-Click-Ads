<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);
    }

    public function serviceIndex()
    {
        $service = Service::all();
        return view('admin.interface.service.create', compact('service')) ;
    }

    public function serviceUpdate(Request $request,$id)
    {
        $this->validate($request,[
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        Service::whereId($id)
            ->update([
                'title' => $request->title,
                'icon' => $request->icon,
                'description' => $request->description,
            ]);
        return redirect('admin/service')->withMsg('Updated Successfully');
    }

    public function serviceStore(Request $request)
    {
        $this->validate($request,[
           'icon' => 'required',
           'title' => 'required',
           'description' => 'required',
        ]);
        Service::create($request->all());
        return redirect('admin/service')->withMsg('Added Successfully');
    }

    public function serviceDelete($id)
    {
        Service::whereId($id)->delete();
        return redirect('admin/service')->withMsg('Deleted Successfully');
    }

    public function serviceEdit($id)
    {
        $service = Service::find($id);
        return view('admin.interface.service.edit', compact('service')) ;
    }

}
