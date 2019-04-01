<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class CheckAdminAccess
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    /**
     * Create a new middleware instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if($this->auth->user()->roles()->pluck('title')->first()!=="Admin")
            {
                return redirect()->route('showHome');
            }
        }
        else
        {
            return redirect()->route('showAdminLogin');
        }
        return $next($request);
    }
}
