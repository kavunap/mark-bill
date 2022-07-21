<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckRole
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
        $user=Auth::user();
        if ($user->user_role == "teacher") {
            // return redirect()->to("/setting/{$user->id}")
            // ->withErrors("Your payment has expired. Please pay as soon as you can");

            return redirect()->back()->withErrors('You can not perform this action. Please tell admin to do it for you. Thank you')->withInput();
        }
        return $next($request);
    }
}
