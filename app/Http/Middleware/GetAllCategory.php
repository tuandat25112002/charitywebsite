<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use Session;
session_start();
class GetAllCategory
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
        $categories = Category::where('active',1)->get();
        $logo = DB::table('widget')->where('name','logo')->first();
        $name = DB::table('widget')->where('name','name')->first();
        $request->session()->put('name', $name);
        $request->session()->put('categories', $categories);
        $request->session()->put('logo', $logo);
        return $next($request);
    }
}
