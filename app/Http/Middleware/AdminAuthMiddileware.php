<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
session_start();
class AdminAuthMiddileware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('user')){
            $taikhoan = Session::get('user');
            if($taikhoan->admin==1){
                return $next($request);
            }
            else{
                 return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }
    }
}
