<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\General\Models\Address;
use Illuminate\Http\Request;
use App\Modules\User\Models\User;
use Mail;

class ApiController extends Controller
{

    public function handleUserRegister(Request $request){

        if (!$request->has('token') or !checkApiToken($request->input('token')) or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }

        if(
            !$request->has('first_name') or
            !$request->has('last_name') or
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
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'phone' => ($request->has('phone'))? $request->input('password') : null,
                'gender' => $request->input('gender'),
                'picture' => 'img/unknown.png',
                'validation' => $validation,
                'address_id' => $userAddress->id

            ]);

             $user->assignRole($request->input('role'));

             $content = ['email' => $user->email, 'password' => $user->password , 'validationCode' => $validation];

             Mail::send('User::mail.welcome', $content, function ($message) use ($user) {
             $message->to($user->email);
             $message->subject('Bienvenue');
             });

            return response()->json(['status' => 200]);

    }

}