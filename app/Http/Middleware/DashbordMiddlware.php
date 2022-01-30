<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Home;

use Closure;
use Illuminate\Http\Request;

class DashbordMiddlware
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

        if (Session::get("mail") != null  && Session::get("name") != null) {

            return $next($request);
        }
        else {

            return $next($request);
            //return Response(" invalido Login ");
            //return view('site/page/home', ['title' => 'index']);
            
            //return redirect()->route('login-box');
            //return view('site/page/home', ['title' => 'index']);
        }
    }
}
