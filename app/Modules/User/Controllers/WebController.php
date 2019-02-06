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
use App\Modules\Infrastructures\Models\TerrainSpeciality;
use App\Modules\General\Models\Media;
use App\Modules\Infrastructures\Models\Equipment;
use App\Modules\Infrastructure\Models\Team;

use Carbon\Carbon;

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
            Toastr::success('Vérification a été effectué avec succès !', 'Bien !', ["positionClass" => "toast-top-full-width","showDuration"=> "4000", "hideDuration"=> "1000", "timeOut"=> "300000"]);
            return redirect()->route('showHome'); //TODO modify redirect (to login)
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

         $content = ['user' => $user , 'validationLink' => URL('user/activation/'.$user->email.'/'.$validation)];

         Mail::send('User::mail.welcome', $content, function ($message) use ($user) {
         $message->to($user->email);
         $message->subject('Bienvenue');
         });

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
      $user = Auth::user();
      $complexes = $user->complexes()->get();
      if (empty($complexes)) {
        SweetAlert::error('Opps !', 'Veuillez Ajouter Un complexe. !')->persistent('Fermer');
        return redirect()->route('showUserAddComplex');
      }
        return view ('User::frontOffice.userAddTerrain',
        [
            'specialities' => TerrainSpeciality::All(),
            'complexes' => $complexes
        ]
      );
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

    public function hundleUserAddTerrain(Request $request)
    {
      $user = Auth::user();
      $this->validate($request,[
        "name"=>             "required",
        "complex_id" =>      "required",
        "category_id" =>     "required",
        "speciality_id" =>   "required",
        "description"=>      "required",
        "size"=>             "required|between:0,9999",
        "type"=>             "required",
        'images' =>           "required",
        'images.*' =>         "image|mimes:jpeg,png,jpg,gif,svg"
      ],
      [
        'name' =>            'Le champ Nom de terrain est  obligatoire',
        'complex_id' =>      'Le champ Complexe de terrain est  obligatoire',
        'category_id' =>     'Le champ Categorie de terrain est  obligatoire',
        'speciality_id' =>   'Le champ speciality de terrain est  obligatoire',
        "description" =>     'Le champ Description de terrain est  obligatoire',
        "size.required" =>   'Le champ Size de terrain est  obligatoire',
        "size.between" =>    'Format Invalide de champ Type',
        "type.required" =>   'Le champ Type de terrain est  obligatoire',
        'images.required' => 'Le champ Image de terrain est  obligatoire',
        'images.image' =>    'Le champ doit ètre de type image',
        'images.mimes' =>    'Le champ doit ètre de type image: peg,png,jpg,gif,svg',
      ]
    );

    $terrain = Terrain::create([

      "name"=>             $request->name,
      "complex_id" =>      $request->complex_id,
      "category_id" =>     $request->category_id,
      "speciality_id" =>   $request->speciality_id,
      "description"=>      $request->description,
      "size"=>             $request->size,
      "type" =>            $request->type
    ]);


        $imagePath = 'storage/uploads/terrains/';
        foreach ($request->images as $image) {
          $filename = 'terrain-'.$terrain->id .'-'. str_random(5) . '-' . time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path($imagePath), $filename);

          Media::create([

            'type' => 1,
            'link' => $imagePath . '' . $filename,
            'terrain_id' => $terrain->id
          ]);
        }

        foreach ($request->sessionDay as $key => $sessionDay) {

          $sessionStartTime = $request->sessionStartTime[$key];
          $sessionEndTime = $request->sessionEndTime[$key];
           $sessionStartDate[] = date('Y-m-d H:i:s', strtotime("$sessionDay $sessionStartTime"));
           $sessionEndDate[] = date('Y-m-d H:i:s', strtotime("$sessionDay $sessionEndTime"));
            $dayofweek[] = date('w', strtotime($sessionDay));

          $terrain->schedules()->create([
              'start_at' => $sessionStartDate[$key],
              'ends_at' => $sessionEndDate[$key],
              'day' => $dayofweek[$key]
          ]);

        }

        SweetAlert::success('Bien !', 'Terrain ajouté avec succès. !')->persistent('Fermer');
        return redirect()->route('showUserAddTerrain');
    }

    public function showUserAddEquipement()
    {
        $user = Auth::user();
      $userTerrains =  Terrain::whereHas('complex', function ($subQuery) {
                      $subQuery->where('user_id', Auth::user()->id);
                    })->get();

      if(empty($userTerrains)){
        weetAlert::error('Opps !', 'Veuillez Ajouter Un Terrain. !')->persistent('Fermer');
        return redirect()->route('showUserAddTerrain');
      }

          return view ('User::frontOffice.userAddEquipement',
          [   'specialities' => TerrainSpeciality::All(),
              'terrains' => $userTerrains
          ]
        );
    }

    public function hundleUserAddEquipement(Request $request)
    {
      $user = Auth::user();

      $this->validate($request,[
        "name"=>              "required",
        "description"=>       "required",
        "terrain_id" =>       "required",
        "speciality_id" =>    "required",
        "hauteur"=>           "required|between:0,9999",
        'longueur' =>         "required|between:0,9999",
        'largueur' =>         "required|between:0,9999",
        'images' =>           "required",
        'images.*' =>         "image|mimes:jpeg,png,jpg,gif,svg"
      ],
      [
        'name' =>            'Le champ Nom de terrain est  obligatoire',
        'terrain_id' =>      'Le champ Terrain est  obligatoire',
        'speciality_id' =>   'Le champ speciality d\'equipement est  obligatoire',
        "description" =>     'Le champ Description d\'equipement est  obligatoire',
        "hauteur.required" =>   'Le champ Hauteur  est  obligatoire',
        "hauteur.between" =>    'Format Invalide de champ Type',
        "longueur.required" =>   'Le champ Longueur  est  obligatoire',
        "longueur.between" =>    'Format Invalide de champ Type',
        "largueur.required" =>   'Le champ Largueur  est  obligatoire',
        "largueur.between" =>    'Format Invalide de champ Type',
        'images.image' =>    'Le champ doit ètre de type image',
        'images.mimes' =>    'Le champ doit ètre de type image: peg,png,jpg,gif,svg',
      ]
    );

      $equipment = Equipment::create([
        'name' => $request->name,
        'description' => $request->description,
        'status' => 'Verif',
        'hauteur' => $request->hauteur,
        'longueur' => $request->longueur,
        'largueur' => $request->largueur,
        'speciality_id' => $request->speciality_id,
        'terrain_id' => $request->terrain_id
      ]);

      $imagePath = 'storage/uploads/equipements/';
      foreach ($request->images as $image) {
        $filename = 'equipement-'.$equipment->id .'-'. str_random(5) . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($imagePath), $filename);

        Media::create([

          'type' => 1,
          'link' => $imagePath . '' . $filename,
          'equipment_id' => $equipment->id
        ]);
      }

      SweetAlert::success('Bien !', 'Equipement ajouté avec succès. !')->persistent('Fermer');
      return redirect()->route('showUserAddEquipement');
    }

    public function showUserAddClub()
    {
      $user = Auth::user();
    $userTerrains =  Terrain::whereHas('complex', function ($subQuery) {
                    $subQuery->where('user_id', Auth::user()->id);
                  })->get();

    if(empty($userTerrains)){
      weetAlert::error('Opps !', 'Veuillez Ajouter Un Terrain. !')->persistent('Fermer');
      return redirect()->route('showUserAddTerrain');
    }

        return view ('User::frontOffice.userAddClub',
        [
            'terrains' => $userTerrains
        ]
      );
    }

    public function hundleUserAddClub(Request $request)
    {
      $user = Auth::user();

      $this->validate($request,[
        "name"=>              "required",
        "description"=>       "required",
        "terrain_id" =>       "required",
        'images' =>           "required",
        'images.*' =>         "image|mimes:jpeg,png,jpg,gif,svg"
      ],
      [
        'name' =>            'Le champ Nom de terrain est  obligatoire',
        'terrain_id' =>      'Le champ Terrain est  obligatoire',
        "description" =>     'Le champ Description d\'equipement est  obligatoire',
        'images.image' =>    'Le champ doit ètre de type image',
        'images.mimes' =>    'Le champ doit ètre de type image: peg,png,jpg,gif,svg',
      ]
    );

      $club = Club::create([
        'name' => $request->name,
        'description' => $request->description,
        'terrain_id' => $request->terrain_id
      ]);

      $imagePath = 'storage/uploads/clubs/';
      foreach ($request->images as $image) {
        $filename = 'club-'.$club->id .'-'. str_random(5) . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($imagePath), $filename);

        Media::create([

          'type' => 1,
          'link' => $imagePath . '' . $filename,
          'club_id' => $club->id
        ]);
      }

      SweetAlert::success('Bien !', 'Club ajouté avec succès. !')->persistent('Fermer');
      return redirect()->route('showUserAddEquipement');

}

public function showUserAddTeam()
{
    $user = Auth::user();
    $userClubs = Club::whereHas('terrain.complex', function ($subQuery) use ($user){
                $subQuery->where('user_id', $user->id);
            })->get();
      if (empty($userClubs)) {
      weetAlert::error('Opps !', 'Veuillez Ajouter Un Terrain. !')->persistent('Fermer');
      return redirect()->route('showUserAddTerrain');
    }
    return view ('User::frontOffice.userAddTeam',
    [   'specialities' => TerrainSpeciality::All(),
        'clubs' => $userClubs
    ]
  );

}
public function hundleUserAddTeam(Request $request)
{
  $user = Auth::user();
  $this->validate($request,[
    "name"=>              "required",
    "club_id"=>           "required",
    "speciality_id" =>    "required",
    'images' =>           "required",
    'images.*' =>         "image|mimes:jpeg,png,jpg,gif,svg"
  ],
  [
    'name' =>            'Le champ Nom de terrain est  obligatoire',
    'club_id' =>          'Le champ Club est  obligatoire',
    "speciality_id" =>    'Le champ Spécialité est  obligatoire',
    'images.image' =>    'Le champ doit ètre de type image',
    'images.mimes' =>    'Le champ doit ètre de type image: peg,png,jpg,gif,svg',
  ]
);

    $team = Team::create([
      "name"=>              $request->name,
      "level" =>            $request->level,
      "club_id"=>           $request->club_id,
      "speciality_id" =>    $request->speciality_id,
    ]);

    $imagePath = 'storage/uploads/teams/';
    foreach ($request->images as $image) {
      $filename = 'team-'.$team->id .'-'. str_random(5) . '-' . time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path($imagePath), $filename);

      Media::create([
        'type' => 1,
        'link' => $imagePath . '' . $filename,
        'team_id' => $team->id
      ]);
    }

    SweetAlert::success('Bien !', 'Equipe ajouté avec succès. !')->persistent('Fermer');
    return redirect()->route('showUserAddTeam');
  }
}
