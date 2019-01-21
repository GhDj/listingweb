<?php

namespace App\Modules\User\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
class WebController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdminDashboard()
    {
        return view("User::backOffice.dashboard");
    }

    public function handleUserActivation($email , $activationCode){

        $user = User::where('email', $email)->first();
        if (!$user) {
            return 'user not found !';
        }
        if($user->validation == $activationCode) {

            $user->status = 1;
            $user->validation = '';
            $user->save();

            return redirect()->route('showAdminDashboard'); //TODO modify redirect (to login)
        }else {
            return 'invalide link';
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleUserRegister(Request $request)
    {
          dd($request->All());
    }

}
