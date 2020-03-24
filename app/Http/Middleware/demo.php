<?php

namespace App\Http\Middleware;

use Closure;

class demo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->isMethod('POST') || $request->isMethod('PUT')|| $request->isMethod('DELETE')){
            session()->flash('delmsg', 'This is Demo version. You can not change anything.');
            return redirect()->back();
        }
        return $next($request);
    }
}
