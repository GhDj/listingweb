<?php

namespace App\Modules\User\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use App\Modules\General\Models\Address;
use UxWeb\SweetAlert\SweetAlert;
use Mail;
use Validate;

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


    $errors =  $this->validate($request,[
          'firstName'   => 'required',
          'lastName'   => 'required',
          'email'   => 'required|unique:users',
          'password'   => 'required|confirmed',
          'gender' => 'required'

        ],
        [
              'firstName.required'   => 'Votre Nom est Obligatoire',
              'lastName.required'   => 'Votre Prenom est Obligatoire',
              'email.required'   => 'Email est obligatoire',
              'email.unique'   => 'Email est déja existe',
              'password.required'   => 'Veuillez Saisie Mot de passe',
              'password.confirmed'   => 'Mot de passe Doit ètre Identique',
              'gender.required'   => 'Genre de sexe est obligatoire'

        ]
          );

      if ($dataResponse = @file_get_contents("http://ip-api.com/json")) {
          $json = json_decode($dataResponse, true);
          $latitude = $json['lat'];
          $longitude = $json['lon'];
          $city = $json['city'];
          $country = $json['country'];
      }

      $userAddress = Address::create([
          'city' => $city,
          'postal_code'=> isset($address['postal_code'])? $address['postal_code'] : null,
          'country' => $country,
          'locality' => null,
          'address' =>  null,
          'latitude' => $latitude ,
          'longitude' => $longitude,
          'description' => null
      ]);

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


        SweetAlert::success('Bien !', 'Inscription a été effectué avec succès !')->persistent('Fermer');

        return back();

    }

}
