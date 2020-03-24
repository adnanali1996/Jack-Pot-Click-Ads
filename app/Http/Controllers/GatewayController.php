<?php

namespace App\Http\Controllers;

use App\Gateway;
use Illuminate\Http\Request;

class GatewayController extends Controller
{

    public function index()
    {
        $gateways = Gateway::all();
        return view('admin.gateway.gateway', compact('gateways'));
    }

    public function update(Request $request, Gateway $gateway)
    {
        
        $this->validate($request, [
            'gateimg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'chargefx' => 'required',
            'chargepc' => 'required',
            'minamo' => 'required',
            'maxamo' => 'required',
            'rate' => 'required',
        ]);

        if ($request->hasFile('gateimg')) {
            $path = 'assets/images/gateway/' . $gateway->gateimg;
            if (file_exists($path)) {
                unlink($path);
            }
            $gateway['gateimg'] = uniqid() . '.' . $request->gateimg->getClientOriginalExtension();
            $request->gateimg->move('assets/images/gateway', $gateway['gateimg']);
        }

        $gateway['name'] = $request->name;
        $gateway['chargefx'] = $request->chargefx;
        $gateway['chargepc'] = $request->chargepc;
        $gateway['val1'] = $request->val1;
        $gateway['val2'] = $request->val2;
        $gateway['val3'] = $request->val3;
        $gateway['status'] = $request->status;
        $gateway['minamo'] = $request->minamo;
        $gateway['maxamo'] = $request->maxamo;
        $gateway['rate'] = $request->rate;

        $gateway->save();

        return back()->withMsg('Gateway Information Updated successfully.');
    }

}
