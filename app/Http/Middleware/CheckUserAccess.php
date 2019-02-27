<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Toastr;

class CheckUserAccess
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
        if (Auth::user()) {
            switch (Auth::user()->status) {
                case 0 :
                    Toastr::warning('Vous devez valider votre email');
                    return redirect(route('showHome'));
                case 1 :
                    Toastr::warning('Votre profil n\'est pas complet !');
                    return redirect(route('showUserCompleteProfile'));
                case 3 :
                    Toastr::warning('Votre compte est désactivé !');
                    return redirect(route('showHome'));
            }

        }
        return $next($request);
    }
}
