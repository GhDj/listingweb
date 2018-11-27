<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\General\Models\Address;
use Illuminate\Http\Request;
use App\Modules\User\Models\User;
use Mail;
use Auth;

class ApiController extends Controller
{

    public function handleUserRegister(Request $request){

        if (!$request->has('token') or !checkApiToken($request->input('token')) or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }

        if(
            !$request->has('firstName') or
            !$request->has('lastName') or
            !$request->has('email') or
            !$request->has('password') or
            !$request->has('gender') or
            !$request->has('role')
        ){
            return response()->json(['status' => 404]);
        }

        $user = User::where('email', '=', $request->input('email'))
            ->first();

        if($user){
            return response()->json(['status' => 400]);
        }

        if($request->has('address'))
        {
            $address = $request->input('address');
            $userAddress = Address::create([
                'city' => isset($address['city'])? $address['city'] : null,
                'postal_code'=> isset($address['postal_code'])? $address['postal_code'] : null,
                'country' => isset($address['country'])? $address['country'] : null,
                'locality' => isset($address['locality'])? $address['locality'] : null,
                'address' => isset($address['address'])? $address['address'] : null,
                'latitude' => isset($address['latitude'])? $address['latitude'] : null,
                'longitude' => isset($address['longitude'])? $address['longitude'] : null,
                'description' => isset($address['description'])? $address['description'] : null
            ]);
        }

            $validation = str_random(30);

            $user =  User::create([
                'first_name' => $request->input('firstName'),
                'last_name' => $request->input('lastName'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'phone' => ($request->has('phone'))? $request->input('phone') : null,
                'gender' => $request->input('gender'),
                'picture' => 'img/unknown.png',
                'validation' => $validation,
                'address_id' => $userAddress->id

            ]);

             $user->assignRole($request->input('role'));

             $content = ['user' => $user , 'validationLink' => URL('user/activation/'.$user->email.'/'.$validation)];

             Mail::send('User::mail.welcome', $content, function ($message) use ($user) {
             $message->to($user->email);
             $message->subject('Bienvenue');
             });

            return response()->json(['status' => 200]);

    }

    public function handleUserLogin(Request $request){

        if (!$request->has('token') or !checkApiToken($request->input('token')) or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }

        if(
            !$request->has('email') or
            !$request->has('password')
        ){
            return response()->json(['status' => 404]);
        }

        $user = User::where('email', '=', $request->input('email'))
            ->with('address')
            ->with('roles')
            ->first();

        if($user && ($user->status != 0)){
            $credentials = [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ];

            if (Auth::attempt($credentials)) {
                return response()->json(['status' => 200, 'user' => $user]);
            } else {
                return response()->json(['status' => 405]);
            }
        } else {
            return response()->json(['status' => 400]);
        }
    }

    public function handleUpdateUserProfile(Request $request, $id){

        if (!$request->has('token') or !checkApiToken($request->input('token')) or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }

        $user = User::find($id);
        if(!$user or $user->status == 0)
        {
            return response()->json(['status' => 404]);
        }

        $request->has('first_name') ? $user->first_name = $request->input('first_name') : null;
        $request->has('last_name') ? $user->last_name = $request->input('last_name') : null;
        $request->has('email') ? $user->email = $request->input('email') : null;
        $request->has('phone') ? $user->phone = $request->input('phone') : null;
        $request->has('gender') ? $user->gender = $request->input('gender') : null;
        $request->has('picture') ? $user->picture = $request->input('picture') : null;

        if($request->has('address'))
        {
            $address = $request->input('address');
            $user->address->update([
                'city' => isset($address['city'])? $address['city'] : null,
                'postal_code'=> isset($address['postal_code'])? $address['postal_code'] : null,
                'country' => isset($address['country'])? $address['country'] : null,
                'locality' => isset($address['locality'])? $address['locality'] : null,
                'address' => isset($address['address'])? $address['address'] : null,
                'latitude' => isset($address['latitude'])? $address['latitude'] : null,
                'longitude' => isset($address['longitude'])? $address['longitude'] : null,
                'description' => isset($address['description'])? $address['description'] : null
            ]);
        }

              if($request->has('password') and $request->has('newPassword')){

              if($request->input('password') != $request->input('newPassword')){
                $credentials = [
                    'email' => $user->email,
                    'password' => $request->input('password')
                ];

                if (Auth::attempt($credentials)) {
                    $user->password = bcrypt($request->input('newPassword'));
                } else {
                    return response()->json(['status' => 300]);
                }
              }else
              {
                  return response()->json(['status' => 301]);
              }
        }

        $user->save();

        return response()->json(['status' => 200]);

    }

    public function showUser(Request $request, $id){

        if (!$request->has('token') or !checkApiToken($request->input('token')) or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }

        if(
        !isset($id)
        )
        {
            return response()->json(['status' => 404]);
        }

        $user = User::find($id);

        if($user){
            return response()->json(['status' => 200, 'user' => $user->with('address')->with('roles')->first()]);
        } else {
            return response()->json(['status' => 404]);
        }
    }


}