<?php

namespace App\Modules\User\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use App\Modules\General\Models\Address;
use UxWeb\SweetAlert\SweetAlert;
use Auth;
use Mail;
use Alert;
use Validate;
use App\Modules\Infrastructures\Models\Terrain;
use App\Modules\Infrastructures\Models\Club;
use App\Modules\Infrastructures\Models\Category;
use App\Modules\Infrastructures\Models\Complex;
use Hash;

use Toastr;

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
          'email'   => 'required|unique:users|email',
          'password'   => 'required|confirmed',

        ],
        [
              'firstName.required'   => 'Votre Nom est Obligatoire',
              'lastName.required'   => 'Votre Prenom est Obligatoire',
              'email.required'   => 'Email est obligatoire',
              'email.unique'   => 'Email est déja existe',
              'email.email'   => 'Le champ doit ètre de type email',
              'password.required'   => 'Veuillez Saisie Mot de passe',
              'password.confirmed'   => 'Mot de passe Doit ètre Identique',

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
          'gender' => ($request->input('gender'))? $request->input('phone') : 1,
          'picture' => 'img/unknown.png',
          'status' => 1,
          'validation' => $validation,
          'address_id' => $userAddress->id

      ]);

         $user->assignRole($request->input('role'));

         // $content = ['user' => $user , 'validationLink' => URL('user/activation/'.$user->email.'/'.$validation)];
         //
         // Mail::send('User::mail.welcome', $content, function ($message) use ($user) {
         // $message->to($user->email);
         // $message->subject('Bienvenue');
         // });

         Toastr::success('Inscription a été effectué avec succès !', 'Bien !', ["positionClass" => "toast-top-full-width","showDuration"=> "4000", "hideDuration"=> "1000", "timeOut"=> "300000"]);

        return back();

    }

    public function handleUserLogin(Request $request){



      		$errors = $this->validate($request,[
      			'email' => 'required|email',
      			'password' => 'required'

      		],
            [
              'email.required'   => 'Email est obligatoire',
              'email.email'   => 'Le champ doit ètre de type email',
              'password.required'   => 'Veuillez Saisie Mot de passe'
            ]
        );

    		    $email = $request->email;
            $password = $request->password;

            $credentials = [
                'email' => $email,
                'password' => $password,
            ];

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                Auth::login($user);
                if ($user->status == 1) {

                  return redirect()->route('showUserDashboard');

                }
                else{
                    Auth::logout();
                    Toastr::error('Votre compte est suspendu !', 'Oops', ["positionClass" => "toast-top-full-width","showDuration"=> "4000", "hideDuration"=> "1000", "timeOut"=> "300000"]);
                    return redirect()->route('showHome');
                }
            }
            Toastr::error('Vérifiez Les données saisie!', 'Oops', ["positionClass" => "toast-top-full-width","showDuration"=> "4000", "hideDuration"=> "1000", "timeOut"=> "300000"]);

            return back();
        }

        public function handleLogout(){
         Auth::logout();
         return redirect(route('showHome'));
     }

     public function handleUpdateUserProfile(Request $request){

        $user = Auth::user();

        $this->validate($request, [
            'email' => 'required|email|unique:users,email,'.$user->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ],
            [
                'email.email' => 'Veuillez saisir un email valide',
                'email.required' => 'Le champ email est obligatoire',
                'email.unique' => 'L\'email indiqué est déjà utilisé',
                'first_name.required' => 'Le champ Prénom est obligatoire',
                'last_name.required' => 'Le champ Nom est obligatoire',
                'phone.required' => 'Le champ Téléphone est obligatoire',
                'address.required' => 'Le champ Addresse est obligatoire',
                'gender.required' => 'Le champ Genre est obligatoire',
            ]);

        $user->update([
            'first_name' => ($request->first_name) ? $request->first_name : $user->first_name,
            'last_name' => ($request->last_name) ? $request->last_name : $user->last_name,
            'email' => ($request->email)? $request->email:$user->email,
            'phone'  => ($request->phone)? $request->phone:$user->phone,
            'gender' => ($request->gender) ? $request->gender:$user->gender,
            'address' => ($request->address) ? $request->address : $user->address,

        ]);

        SweetAlert::success('Bien !', 'Profil Modifié avec succés !')->persistent('Fermer');
        return redirect()->route('showUserProfile');

    }

    public function handleUpdateUserProfilePicture(Request $request){

            $user = Auth::user();
            $this->validate($request, [
        	    	'avatar' => 'image|mimes:jpeg,bmp,png',
        		],

            [
              'avatar.image' => 'Le champ doit d\'ètre de Type Image',
              'avatar.mimes' => 'L\'extension d\'image aloué:peg,bmp,png  ',
            ]

          );
            $file = $request->avatar;
            $imagePath = 'storage/uploads/avatar/';
            $filename = 'avatar' . $user->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($imagePath), $filename);
            $user->update([
           'picture' => $imagePath . '' . $filename
            ]);

    SweetAlert::success('Bien !', 'Image De Profil Modifié avec succés !')->persistent('Fermer');
    return redirect()->route('showUserProfile');

}

    public function handleUpdateUserPassword(Request $request)
    {

        $user = Auth::user();

        $errors =  $this->validate($request,[
            'oldPassword'   => 'required',
            'password'   => 'required|confirmed'

          ],
          [
                'oldPassword.required'   => 'Le champ Actuelle Mot de passe est obligatoire',
                'password.required'   => 'Le champ mot de passe est obligatoire',
                'password.confirmed'   => 'Mot de passe Doit ètre Identique'
          ]
            );



            if (!(Hash::check($request->oldPassword, $user->password))) {
              SweetAlert::error('Oops !', 'Votre mot de passe actuel ne correspond pas au mot de passe que vous avez fourni. Veuillez réessayer. !')->persistent('Fermer');
              return redirect()->route('showUserPassword');
            }
              if(strcmp($request->oldPassword, $request->password == 0)){
                SweetAlert::error('Oops !', 'Le nouveau mot de passe ne peut pas être identique à votre mot de passe actuel. Veuillez choisir un mot de passe différent. !')->persistent('Fermer');
                return redirect()->route('showUserPassword');
              }

            $user->password = bcrypt($request->password);
            $user->save();
            SweetAlert::success('Bien !', 'Mot de passe modifié avec succès. !')->persistent('Fermer');
            return redirect()->route('showUserPassword');

    }


    public function showUserDashboard() {
      $userTerrains = Terrain::whereHas('complex', function ($subQuery) {
                    $subQuery->where('user_id', Auth::user()->id);
                  })
                  ->with('wishlists')
                  ->get();

      $userClubs = Club::whereHas('terrain.complex', function ($subQuery) {
                  $subQuery->where('user_id', Auth::user()->id);
              })
              ->with('wishlists')
              ->get();
        return view ('User::frontOffice.userDashboard',[

          'userTerrains' => $userTerrains,
          'userClubs' => $userClubs
        ]);
    }

    public function  showUserProfile() {
        return view ('User::frontOffice.userProfile');
    }

    public function  showUserMessage() {
        return view ('User::frontOffice.userMessage');
    }

    public function  showUserPassword() {
        return view ('User::frontOffice.userChangePassword');
    }

    public function  showUserListingTerrain() {

      $userTerrains = Terrain::whereHas('complex', function ($subQuery) {
                    $subQuery->where('user_id', Auth::user()->id);
                  })->paginate(5);
        return view ('User::frontOffice.userListing',
          [
            'userTerrains' => $userTerrains
          ]
      );
    }

    public function  showUserListingClub() {
      $userClubs = Club::whereHas('terrain.complex', function ($subQuery) {
                    $subQuery->where('user_id', Auth::user()->id);
                  })->paginate(5);

        return view ('User::frontOffice.userListing',
          [
            'userClubs' => $userClubs
          ]
      );
    }
    public function showUserAddComplex()
    {
        return view ('User::frontOffice.userAddComplex',
          [
            'categories' => Category::select('category')->groupBy('category')->get()
          ]
      );
    }
    public function  showUserAddTerrain() {
        return view ('User::frontOffice.userAddTerrain');
    }

    public function hundleUserAddComplex(Request $request)
    {

        $user = Auth::user();
        $this->validate($request,[
          "address" =>       "required",
          "latitude" =>      "required",
          "longitude" =>     "required",
          "city" =>          "required",
          "postal_code"=>    "required",
          "locality"=>       "required",
          "name"=>           "required",
          "categories" =>    "required",
          "phone" =>         "required",
          "email" =>         "required|email",
          "web_site" =>      "required"
        ],
        [
          "address.required" =>"Le champ adresse est obligatoire",
          "latitude.required" =>"Le champ latitude  est obligatoire",
          "longitude.required" =>"Le champ longitude est obligatoire",
          'city.required' =>"Le champ Ville est obligatoire",
          'postal_code' =>"Le champ code postal  est obligatoire",
          "locality.required" => "Le champ localité est obligatoire",
          "name.required" => "Le champ nom de complex est obligatoire",
          "phone.required" =>"Le champ phone  est obligatoire",
          "email.required" =>"Le champ email",
          "email.email" =>"Le champ doit ètre email",
          "web_site.required" =>"Le champ Site Web est est obligatoire",

        ]
      );

        $address = Address::Create([
        'city' => $request->city ,
        'postal_code' => $request->postal_code ,
        'country' => $request->country ,
        'locality' => $request->locality ,
        'address' => $request->adresse ,
        'latitude' => $request->latitude,
        'longitude' =>$request->longitude ,
        'description' => $request->description ,
      ]);
      $complex =  Complex::Create([
          'name' => $request->name,
          'phone' => $request->phone ,
          'email' => $request->email,
          'web_site' => $request->web_site,
          'address_id' => $address->id,
          'user_id' => $user->id
        ]);

        foreach ($request->categories as $categorie) {
          Category::create([
            "category" => $categorie,
            "complex_id" => $complex->id
          ]);
        }
        if ($request->otherCategories) {
          $otherCategories = explode(',', $request->otherCategories);
          foreach ($otherCategories as  $otherCategorie) {

            Category::create([
              "category" => $otherCategorie,
              "complex_id" => $complex->id
            ]);
          }
        }

      SweetAlert::success('Bien !', 'Complex ajouté avec succès. !')->persistent('Fermer');
      return redirect()->route('showUserAddComplex');

    }


}
