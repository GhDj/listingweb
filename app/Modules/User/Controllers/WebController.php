<?php

namespace App\Modules\User\Controllers;

use App\Modules\Complex\Models\ClubRequest;
use App\Modules\Complex\Models\ComplexCategory;
use App\Modules\Complex\Models\ComplexRequest;
use App\Modules\Complex\Models\Infrastructure;
use App\Modules\Complex\Models\TerrainActivity;
use App\Modules\Reviews\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use App\Modules\General\Models\Address;
use UxWeb\SweetAlert\SweetAlert;
use Auth;
use Mail;
use Alert;
use Validate;
use App\Modules\Complex\Models\Terrain;
use App\Modules\Complex\Models\Club;
use App\Modules\Complex\Models\Category;
use App\Modules\Complex\Models\Complex;
use App\Modules\Complex\Models\Sport;
use App\Modules\General\Models\Media;
use App\Modules\Complex\Models\Equipment;
use App\Modules\Infrastructure\Models\Team;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;

use Hash;

use Toastr;

class WebController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdminDashboard()
    {

        return view("User::backOffice.dashboard");
    }

    public function handleUserActivation($email, $activationCode)
    {

        $user = User::where('email', $email)->first();
        if (!$user) {
            return 'user not found !';
        }
        if ($user->validation == $activationCode) {

            $user->status = 2;
            $user->validation = '';
            $user->save();
            Toastr::success('Vérification a été effectué avec succès !', 'Bien !', ["positionClass" => "toast-top-full-width", "showDuration" => "4000", "hideDuration" => "1000", "timeOut" => "300000"]);
            return redirect()->route('showHome'); //TODO modify redirect (to login)
        } else {
            return 'invalide link';
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleSocialRedirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleSocialCallback($provider)
    {

        // dd($provider);
        $providerData = Socialite::driver($provider)->user();

        $user = User::where('provider_id', '=', $providerData->id)
            ->orWhere('email', '=', $providerData->email)
            ->first();

        if (!$user) {

            if ($providerData->name == null) {
                $name = strtok($providerData->email, '@');
            } else {

                $name = explode(" ", $providerData->name);
                $firstName = $name[0];
                $lastName = $name[1];
            }

            // Change images/avatar to public/images/avatar on production mode.
            $imagePath = 'storage/uploads/users/' . $providerData->id . '-' . time() . '.png';
            file_put_contents($imagePath, fopen($providerData->avatar,'r'));

            $user = User::create([
                'provider_id' => $providerData->id,
                'provider' => $provider,
                'email' => $providerData->email,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'picture' => $imagePath,
                'status' => 1,
            ]);

            Auth::login($user);
            Toastr::error('profile to complete !');
            return redirect(route('showUserCompleteProfile'));
        }

        if ($user->status === 0) {
            $user->status = 1;
            $user->save();
            Auth::login($user);
        } elseif ($user->status === 1) {
            Auth::login($user);
            Toastr::error('profile to complete !');
            return redirect(route('showUserCompleteProfile'));
        } elseif ($user->status === 3) {

            Auth::logout();
            Toastr::error('Votre compte est désactivé !');
            return back();
        }

        Auth::login($user);
        return redirect()->route('showUserDashboard');
    }

    public function showUserCompleteProfile()
    {
        if (!Auth::user()) {
            // todo toast
            return redirect(route('showHome'));
        }

        if (Auth::user() and Auth::user()->status === 2) {
            return redirect(route('showHome')); // todo middleware ?
        }

        return view('User::frontOffice.lastStep', [

        ]);
    }

    public function handleUserCompleteProfile(Request $request)
    {

        if (!Auth::user()) {
            // todo toast
            return redirect(route('showHome'));
        }

        $user = User::find(Auth::user()->id);


        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . $user->id,
            'firstName' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed',
        ],
            [
                'email.email' => 'Veuillez saisir un email valide',
                'email.required' => 'Le champ email est obligatoire',
                'email.unique' => 'L\'email indiqué est déjà utilisé',
                'firstName.required' => 'Le champ Prénom est obligatoire',
                'lastName.required' => 'Le champ Nom est obligatoire',
                'address' => 'Le Address Nom est obligatoire',
                'gender.required' => 'Le champ Genre est obligatoire',
                'password.required' => 'Veuillez Saisie Mot de passe',
                'password.confirmed' => 'Mot de passe Doit ètre Identique',
            ]);

        $address = Address::Create([
            'city' => $request->city,
            'postal_code' => $request->code,
            'country' => $request->country,
            'locality' => $request->city,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'description' => $request->address

        ]);
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->address_id = $address->id;
        $user->status = 2;

        $user->save();
        return redirect()->route('showUserDashboard');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleUserRegister(Request $request)
    {


        $errors = $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',

        ],
            [
                'firstName.required' => 'Votre Nom est Obligatoire',
                'lastName.required' => 'Votre Prenom est Obligatoire',
                'email.required' => 'Email est obligatoire',
                'email.unique' => 'Email est déja existe',
                'email.email' => 'Le champ doit ètre de type email',
                'password.required' => 'Veuillez Saisie Mot de passe',
                'password.confirmed' => 'Mot de passe Doit ètre Identique',

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
            'postal_code' => isset($address['postal_code']) ? $address['postal_code'] : null,
            'country' => $country,
            'locality' => null,
            'address' => null,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'description' => null,
        ]);

        $validation = str_random(30);
        $user = User::create([
            'first_name' => $request->input('firstName'),
            'last_name' => $request->input('lastName'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'gender' => ($request->input('gender')) ? $request->input('gender') : 1,
            'validation' => $validation,
            'status' => 0,
            'phone' => ($request->has('phone')) ? $request->input('phone') : null,
            'picture' => 'img/unknown.png',
            'address_id' => $userAddress->id
        ]);
        $user->assignRole($request->input('role'));

        $content = ['user' => $user, 'validationLink' => URL('user/activation/' . $user->email . '/' . $validation)];

        Mail::send('User::mail.welcome', $content, function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Bienvenue');
        });

        if(count(Mail::failures()) > 0 ) {
            Toastr::warning('L\'envoi des mails a échoué, contactez le support');
        } else {
            Toastr::success('Inscription a été effectué avec succès !', 'Bien !', ["positionClass" => "toast-top-full-width", "showDuration" => "4000", "hideDuration" => "1000", "timeOut" => "300000"]);
        }




        return back();

    }

    public function handleUserLogin(Request $request)
    {


        $errors = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'

        ],
            [
                'email.required' => 'Email est obligatoire',
                'email.email' => 'Le champ doit ètre de type email',
                'password.required' => 'Veuillez Saisie Mot de passe'
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
            if ($user->status == 0) {

                Auth::logout();
                Toastr::error('Vous devez valider votre email !');
                return redirect()->route("showHome");
            } elseif ($user->status == 3) {
                Auth::logout();
                Toastr::error('Votre Account est désactivé !');
                return back();
            } else {
                Auth::login($user);
                //  return "ok";
                return redirect()->route('showUserDashboard');
            }
        }

        Toastr::error('Vérifiez Les données saisie!', 'Oops', ["positionClass" => "toast-top-full-width", "showDuration" => "4000", "hideDuration" => "1000", "timeOut" => "300000"]);
        return back();
    }

    public function handleLogout()
    {

        if (Auth::check()) {
            if (Auth::user()->roles()->pluck('title')->first() === 'Admin') {
                Auth::logout();
                return redirect(route('showAdminLogin'));
            }
        }
        Auth::logout();
        return redirect(route('showHome'));
    }


    public function handleUpdateUserProfile(Request $request)
    {

        $user = Auth::user();

        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . $user->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => '',
            'address' => '',

        ],
            [
                'email.email' => 'Veuillez saisir un email valide',
                'email.required' => 'Le champ email est obligatoire',
                'email.unique' => 'L\'email indiqué est déjà utilisé',
                'first_name.required' => 'Le champ Prénom est obligatoire',
                'last_name.required' => 'Le champ Nom est obligatoire',

            ]);

        $user->update([
            'first_name' => ($request->first_name) ? $request->first_name : $user->first_name,
            'last_name' => ($request->last_name) ? $request->last_name : $user->last_name,
            'email' => ($request->email) ? $request->email : $user->email,
            'phone' => ($request->phone) ? $request->phone : $user->phone,
            'gender' => ($request->gender) ? $request->gender : $user->gender,
            'address' => ($request->address) ? $request->address : $user->address,
            'status' => 2

        ]);

        SweetAlert::success('Bien !', 'Profil Modifié avec succés !')->persistent('Fermer');
        return redirect()->route('showUserProfile');

    }

    public function handleUpdateUserProfilePicture(Request $request)
    {

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
        $imagePath = 'storage/uploads/users/';
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

        $errors = $this->validate($request, [
            'oldPassword' => 'required',
            'password' => 'required|confirmed'

        ],
            [
                'oldPassword.required' => 'Le champ Actuelle Mot de passe est obligatoire',
                'password.required' => 'Le champ mot de passe est obligatoire',
                'password.confirmed' => 'Mot de passe Doit ètre Identique'
            ]
        );


        if (!(Hash::check($request->oldPassword, $user->password))) {
            SweetAlert::error('Oops !', 'Votre mot de passe actuel ne correspond pas au mot de passe que vous avez fourni. Veuillez réessayer. !')->persistent('Fermer');
            return redirect()->route('showUserPassword');
        }
        if (strcmp($request->oldPassword, $request->password == 0)) {
            SweetAlert::error('Oops !', 'Le nouveau mot de passe ne peut pas être identique à votre mot de passe actuel. Veuillez choisir un mot de passe différent. !')->persistent('Fermer');
            return redirect()->route('showUserPassword');
        }

        $user->password = bcrypt($request->password);
        $user->save();
        SweetAlert::success('Bien !', 'Mot de passe modifié avec succès. !')->persistent('Fermer');
        return redirect()->route('showUserPassword');

    }


    public function showUserDashboard()
    {

        $user = Auth::user();

        if (checkClubRole($user)) {
            $club = Auth::user()->club;
            return view('User::frontOffice.Club.userDashboard', [
                'userTerrains' => ($user->complex) ? $user->complex->terrains : null,
                'complex' => $user->complex,
                'availableComplex' => Complex::doesnthave('user')->where('type', 1)->paginate(30)
            ]);

        }

        if (checkPublicComplexRole($user) || checkPrivateComplexRole($user)) {
            $reviewCounts = 0;
            if ($user->complex) {
                //$reviewCounts = $user->complex->terrains()->with('reviews')->count();
                $reviewCounts = 0;
                foreach ($user->complex->terrains() as $terrain) {
                    $reviewCounts += Review::where('reviewed_id','=',$terrain->id)->count();
                }

            }
            //     dd($reviewCounts);
            return view('User::frontOffice.userDashboard', [
                'userTerrains' => ($user->complex) ? $user->complex->terrains : null,
                'complex' => ($user->complex) ? $user->complex : null,
                'reviewsCount' => $reviewCounts,
                'availableComplex' => Complex::doesnthave('user')->where('type', 1)->paginate(30)
            ]);

            //return "private or public complex resp";
        }

        if (checkAthleticRole($user)) {
            return view('User::frontOffice.Sportif.userDashboard', [
                'userTerrains' => null,
                'complex' => null,
                'reviewsCount' => 0,
                'availableComplex' => ''
            ]);
        }


    }

    public function showUserProfile()
    {
        return view('User::frontOffice.userProfile');
    }

    public function showUserPassword()
    {
        return view('User::frontOffice.userChangePassword');
    }

    function showUserLogin()
    {
        return redirect(route('showHome'));
    }

    public function showUserListingTerrain()
    {

        $userTerrains = Terrain::whereHas('complex', function ($subQuery) {
            $subQuery->where('user_id', Auth::user()->id);
        })->paginate(5);
        return view('User::frontOffice.userListing',
            [
                'userTerrains' => $userTerrains
            ]
        );
    }

    public function showUserListingClub()
    {
        $userClubs = Club::whereHas('terrain.complex', function ($subQuery) {
            $subQuery->where('user_id', Auth::user()->id);
        })->paginate(5);

        return view('User::frontOffice.userListing',
            [
                'userClubs' => $userClubs
            ]
        );
    }

    public function showUserAddComplex()
    {

        if (Auth::user()->complex) {
            return redirect()->route('showEditComplex');
        }
        return view('User::frontOffice.userAddComplex',
            [
                'categories' => Category::select('title')->groupBy('title')->get()
            ]
        );
    }

    public function showEditComplex()
    {
        return view('User::frontOffice.userAddComplex',
            [
                'categories' => Category::all(),
                'complex' => Auth::user()->complex
            ]
        );
    }


    public function showUserAddTerrain()
    {
        $user = Auth::user();
        $complex = $user->Complex;
        if (empty($complex)) {
            SweetAlert::error('Opps !', 'Veuillez Ajouter Un Complex. !')->persistent('Fermer');
            return redirect()->route('showUserAddComplex');
        }
        return view('User::frontOffice.userAddTerrain',
            [
                'sports' => Sport::All(),
                'complex' => $complex
            ]
        );
    }

    public function handleEditComplex(Request $request)
    {

        $user = Auth::user();


        $this->validate($request, [
            "address" => "required",
            "latitude" => "required",
            "longitude" => "required",
            "city" => "required",
            "postal_code" => "required",
            "locality" => "required",
            "name" => "required",
            "categories" => "required",
            "phone" => "required",
            "email" => "required|email",
            "web_site" => "required"
        ],
            [
                "address.required" => "Le champ adresse est obligatoire",
                "latitude.required" => "Le champ latitude  est obligatoire",
                "longitude.required" => "Le champ longitude est obligatoire",
                'city.required' => "Le champ Ville est obligatoire",
                'postal_code' => "Le champ code postal  est obligatoire",
                "locality.required" => "Le champ localité est obligatoire",
                "name.required" => "Le champ nom de complex est obligatoire",
                "phone.required" => "Le champ phone  est obligatoire",
                "email.required" => "Le champ email",
                "email.email" => "Le champ doit ètre email",
                "web_site.required" => "Le champ Site Web est est obligatoire",

            ]
        );

        $complex = Auth::user()->complex;
        $complex->address->city = $request->city;
        $complex->address->postal_code = $request->postal_code;
        $complex->address->country = $request->country;
        $complex->address->locality = $request->locality;
        $complex->address->address = $request->address;
        $complex->address->longitude = $request->longitude;
        $complex->address->latitude = $request->latitude;
        $complex->address->description = $request->description;

        $complex->address->save();

        $complex->name = $request->name;
        $complex->phone = $request->phone;
        $complex->email = $request->email;
        $complex->web_site = $request->web_site;

        $complex->save();

        $categoriesArray = $complex->categories()->get(['category_id']);

        foreach ($request->categories as $categorie) {

            if (!$categoriesArray->contains('category_id', $categorie)) {
                if (Category::find($categorie)) {
                    ComplexCategory::create([
                        'complex_id' => $complex->id,
                        'category_id' => $categorie
                    ]);
                }
            }
        }

        if ($request->otherCategories) {
            $otherCategories = explode(',', $request->otherCategories);
            foreach ($otherCategories as $otherCategory) {

                $newCategory = Category::create([
                    "title" => $otherCategory
                ]);

                ComplexCategory::create([
                    "category_id" => $newCategory->id,
                    "complex_id" => $complex->id
                ]);
            }
        }

        SweetAlert::success('Bien !', 'Complex modifié avec succès. !')->persistent('Fermer');
        return redirect()->back();
    }

    public function showUserAddInfrastructure()
    {
        if (Auth::user()->complex->infrastructure) {
            return redirect()->route('showUserEditInfrastructure');
        }
        return view('User::frontOffice.userAddInfrastructure', ['infrastructure', Auth::user()->complex->infrastructure]);
    }

    public function handleUserAddComplex(Request $request)
    {

        //  dd($request);
        $user = Auth::user();
        $this->validate($request, [
            "address" => "required",
            "latitude" => "required",
            "longitude" => "required",
            "city" => "required",
            "postal_code" => "required",
            "locality" => "required",
            "name" => "required",
            "categories" => "required",
            "phone" => "required",
            "email" => "required|email",
            "web_site" => "required"
        ],
            [
                "address.required" => "Le champ adresse est obligatoire",
                "latitude.required" => "Le champ latitude  est obligatoire",
                "longitude.required" => "Le champ longitude est obligatoire",
                'city.required' => "Le champ Ville est obligatoire",
                'postal_code' => "Le champ code postal  est obligatoire",
                "locality.required" => "Le champ localité est obligatoire",
                "name.required" => "Le champ nom de complex est obligatoire",
                "phone.required" => "Le champ phone  est obligatoire",
                "email.required" => "Le champ email",
                "email.email" => "Le champ doit ètre email",
                "web_site.required" => "Le champ Site Web est est obligatoire",

            ]
        );

        $address = Address::Create([
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'locality' => $request->locality,
            'address' => $request->adresse,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'description' => $request->description,
        ]);
        $complex = Complex::Create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'web_site' => $request->web_site,
            'address_id' => $address->id,
            'user_id' => $user->id
        ]);

        ComplexRequest::create([
            'status' => 0,
            'complex_id' => $complex->id,
            'user_id' => $user->id
        ]);

        foreach ($request->categories as $categorie) {
            $categorieModel = Category::find($categorie);
            if ($categorieModel) {
                ComplexCategory::create([
                    "status" => 0,
                    "category_id" => $categorieModel->id,
                    "complex_id" => $complex->id
                ]);
            }
        }
        if ($request->otherCategories) {
            //$otherCategories = explode(',', $request->otherCategories);
            $cat = Category::create([
                "title" => $request->otherCategories,
            ]);
            ComplexCategory::create([
                "category_id" => $cat->id,
                "complex_id" => $complex->id
            ]);
            $imagePath = 'storage/uploads/categories/';

            $filename = 'category-' . $cat->id . '-' . str_random(5) . '-' . time() . '.' . $request->categoryImage->getClientOriginalExtension();
            $request->categoryImage->move(public_path($imagePath), $filename);

            Media::create([

                'type' => 1,
                'link' => $imagePath . '' . $filename,
                'category_id' => $cat->id
            ]);



            /*foreach ($otherCategories as $otherCategorie) {

                Category::create([
                    "title" => $otherCategorie,
                    "category" => $otherCategorie,
                    "complex_id" => $complex->id
                ]);
            }*/
        }

        SweetAlert::success('Bien !', 'Complex ajouté avec succès. !')->persistent('Fermer');
        return redirect()->route('showUserAddComplex');

    }

    public function handleUserRequestComplex(Request $request)
    {
        $this->validate($request, [
            "complex" => "required",
        ],
            [
                'complex' => 'Le champ Complex de terrain est  obligatoire',
            ]
        );

        if ($request->complex) {
            ComplexRequest::create([
                'status' => 0,
                'complex_id' => $request->complex,
                'user_id' => Auth::user()->id
            ]);

            SweetAlert::success('Information', 'Votre demande a été envoyer avec succès')->persistent("Bien");

        }
        return redirect()->back();
    }


    public function hundleUserAddTerrain(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            "name" => "required",
            "category_id" => "required",
            "sport_id" => "required",
            "sport_category_id" => "required",
            "description" => "required",
            "lighting" => "required",
            "terrain_nature" => "required",
            "width" => "required|between:0,9999",
            "length" => "required|between:0,9999",
            "height" => "required",
            "soil_type" => "required",
            "video_recorder" => "required",
            'images' => "required",
            'images.*' => "image|mimes:jpeg,png,jpg,gif,svg"
        ],
            [
                'name' => 'Le champ Nom de terrain est  obligatoire',
                'category_id' => 'Le champ Categorie de terrain est  obligatoire',
                'sport_id' => 'Le champ sport de terrain est  obligatoire',
                'sport_category_id' => 'Le champ sport de terrain est  obligatoire',
                "description" => 'Le champ Description de terrain est  obligatoire',
                "width.required" => 'Le champ largeur de terrain est  obligatoire',
                "width.between" => 'Format Invalide de champ largeur',
                "length.required" => 'Le champ longueur de terrain est  obligatoire',
                "length.between" => 'Format Invalide de champ longueur',
                "height.required" => 'Le champ hauteur de terrain est  obligatoire',
                "height.between" => 'Format Invalide de champ hauteur',
                "lighting.required" => "Le champ éclairage est obligatoire",
                "terrain_nature.required" => "Le champ nature du terrain est obligatoire",
                "soil_type.required" => "Le champ nature du sol est obligatoire",
                "video_recorder.required" => "Le champ captation vidéo est obligatoire",
                'images.required' => 'Le champ Image de terrain est  obligatoire',
                'images.image' => 'Le champ doit ètre de type image',
                'images.mimes' => 'Le champ doit ètre de type image: peg,png,jpg,gif,svg',
            ]
        );

//dd($request);
        $terrain = Terrain::create([
            "name" => $request->name,
            'width' => $request->width,
            'height' => $request->height,
            'length' => $request->length,
            'lighting' => $request->lighting,
            "terrain_nature" => $request->terrain_nature,
            "soil_type" => $request->soil_type,
            "video_recorder" => $request->video_recorder,
            "complex_id" => Auth::user()->complex->id,
            "category_id" => $request->category_id,
            "sport_id" => $request->sport_id,
            "description" => $request->description,
        ]);

//dd($terrain);
        $imagePath = 'storage/uploads/terrains/';
        foreach ($request->images as $image) {
            $filename = 'terrain-' . $terrain->id . '-' . str_random(5) . '-' . time() . '.' . $image->getClientOriginalExtension();
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

        foreach ($request->sport_category_id as $activity) {
            TerrainActivity::create([
                'sport_category_id' => $activity,
                'terrain_id' => $terrain->id,
            ]);
        }

        SweetAlert::success('Bien !', 'Terrain ajouté avec succès. !')->persistent('Fermer');
        return redirect()->route('showUserAddTerrain');
    }


    public function showUserEditTerrain($id)
    {
        $terrain = Terrain::find($id);

        if (!$terrain) {
            SweetAlert::error("Erreur", "Ce terrain n'exista pas")->persistent("Ok");
            return redirect()->back();
        }

        $complex = Auth::user()->complex;

        return view('User::frontOffice.userEditTerrain', compact('terrain'), ['sports' => $complex->sports,
            'complex' => $complex]);
    }

    public function handleUserUpdateTerrain(Request $request, $id)
    {

        $terrain = Terrain::find($id);
        if (!$terrain) {
            SweetAlert::error("Erreur", "Ce terrain n'exista pas")->persistent("Ok");
            return redirect()->back();
        }
        $this->validate($request, [
            "name" => "required",
            "category_id" => "required",
            "sport_id" => "required",
            "description" => "required",
            "lighting" => "required",
            "terrain_nature" => "required",
            "width" => "required|between:0,9999",
            "length" => "required|between:0,9999",
            "height" => "required",
            "soil_type" => "required",
            "video_recorder" => "required",
            'images' => "required",
            'images.*' => "image|mimes:jpeg,png,jpg,gif,svg"
        ],
            [
                'name' => 'Le champ Nom de terrain est  obligatoire',

                'category_id' => 'Le champ Categorie de terrain est  obligatoire',
                'sport_id' => 'Le champ sport de terrain est  obligatoire',
                "description" => 'Le champ Description de terrain est  obligatoire',
                "width.required" => 'Le champ largeur de terrain est  obligatoire',
                "width.between" => 'Format Invalide de champ largeur',
                "length.required" => 'Le champ longueur de terrain est  obligatoire',
                "length.between" => 'Format Invalide de champ longueur',
                "height.required" => 'Le champ hauteur de terrain est  obligatoire',
                "height.between" => 'Format Invalide de champ hauteur',
                "lighting.required" => "Le champ éclairage est obligatoire",
                "terrain_nature.required" => "Le champ nature du terrain est obligatoire",
                "soil_type.required" => "Le champ nature du sol est obligatoire",
                "video_recorder.required" => "Le champ captation vidéo est obligatoire",
                'images.required' => 'Le champ Image de terrain est  obligatoire',
                'images.image' => 'Le champ doit ètre de type image',
                'images.mimes' => 'Le champ doit ètre de type image: peg,png,jpg,gif,svg',
            ]
        );

        $terrain->name = $request->name;
        $terrain->width = $request->width;
        $terrain->height = $request->height;
        $terrain->length = $request->length;
        $terrain->lighting = $request->lighting;
        $terrain->terrain_nature = $request->terrain_nature;
        $terrain->soil_type = $request->soil_type;
        $terrain->video_recorder = $request->video_recorder;
        $terrain->category_id = $request->category_id;
        $terrain->description = $request->description;
        $terrain->save;


        $imagePath = 'storage/uploads/terrains/';
        foreach ($request->images as $image) {
            $filename = 'terrain-' . $terrain->id . '-' . str_random(5) . '-' . time() . '.' . $image->getClientOriginalExtension();
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

        foreach ($request->activityList as $activity) {
            TerrainActivity::create([
                'sport_category_id' => $activity,
                'terrain_id' => $terrain->id,
            ]);
        }

        SweetAlert::success('Bien !', 'Terrain ajouté avec succès. !')->persistent('Fermer');
        return redirect()->route('showUserAddTerrain');
    }


    public function showUserAddEquipement()
    {
        $user = Auth::user();
        $userTerrains = Terrain::whereHas('complex', function ($subQuery) {
            $subQuery->where('user_id', Auth::user()->id);
        })->get();

        if (empty($userTerrains)) {
            SweetAlert::error('Opps !', 'Veuillez Ajouter Un Terrain. !')->persistent('Fermer');
            return redirect()->route('showUserAddTerrain');
        }

        return view('User::frontOffice.userAddEquipement',
            ['specialities' => Sport::All(),
                'terrains' => $userTerrains
            ]
        );
    }

    public function showUserAddClub()
    {
        $user = Auth::user();
        $userTerrains = Terrain::whereHas('complex', function ($subQuery) {
            $subQuery->where('user_id', Auth::user()->id);
        })->get();

        if (empty($userTerrains)) {
            SweetAlert::error('Opps !', 'Veuillez Ajouter Un Terrain. !')->persistent('Fermer');
            return redirect()->route('showUserAddTerrain');
        }

        return view('User::frontOffice.userAddClub',
            [
                'terrains' => $userTerrains
            ]
        );
    }

    public function hundleUserAddClub(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            "name" => "required",
            "description" => "required",
            "terrain_id" => "required",
            'images' => "required",
            'images.*' => "image|mimes:jpeg,png,jpg,gif,svg"
        ],
            [
                'name' => 'Le champ Nom de terrain est  obligatoire',
                'terrain_id' => 'Le champ Terrain est  obligatoire',
                "description" => 'Le champ Description d\'equipement est  obligatoire',
                'images.image' => 'Le champ doit ètre de type image',
                'images.mimes' => 'Le champ doit ètre de type image: peg,png,jpg,gif,svg',
            ]
        );

        $terrain = Terrain::findOrFail($request->terrain_id);

        $club = Club::create([
            'name' => $request->name,
            'description' => $request->description,
            'terrain_id' => $request->terrain_id,
            'address_id' => $terrain->complex->address->id,
            'user_id' => $user->id
        ]);

        ClubRequest::create([
            'status' => 0,
            'user_id' => $user->id,
            'club_id' => $club->id
        ]);

        $imagePath = 'storage/uploads/clubs/';
        foreach ($request->images as $image) {
            $filename = 'club-' . $club->id . '-' . str_random(5) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($imagePath), $filename);

            Media::create([

                'type' => 1,
                'link' => $imagePath . '' . $filename,
                'club_id' => $club->id
            ]);
        }

        SweetAlert::success('Bien !', 'Votre demande à été enregistré !')->persistent('Fermer');
        return redirect()->back();

    }

    public function showUserAddTeam()
    {
        $user = Auth::user();
        $userClubs = $user->club;
        if (empty($userClubs)) {
            SweetAlert::error('Opps !', 'Veuillez Ajouter Un Terrain. !')->persistent('Fermer');
            return redirect()->route('showUserAddTerrain');
        }
        return view('User::frontOffice.userAddTeam',
            ['specialities' => Sport::All(),
                'clubs' => $userClubs
            ]
        );

    }

    public function hundleUserAddTeam(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            "name" => "required",
            "club_id" => "required",
            "speciality_id" => "required",
            'images' => "required",
            'images.*' => "image|mimes:jpeg,png,jpg,gif,svg"
        ],
            [
                'name' => 'Le champ Nom de terrain est  obligatoire',
                'club_id' => 'Le champ Club est  obligatoire',
                "speciality_id" => 'Le champ Spécialité est  obligatoire',
                'images.image' => 'Le champ doit ètre de type image',
                'images.mimes' => 'Le champ doit ètre de type image: peg,png,jpg,gif,svg',
            ]
        );

        $team = Team::create([
            "name" => $request->name,
            "level" => $request->level,
            "club_id" => $request->club_id,
            "speciality_id" => $request->speciality_id,
        ]);

        $imagePath = 'storage/uploads/teams/';
        foreach ($request->images as $image) {
            $filename = 'team-' . $team->id . '-' . str_random(5) . '-' . time() . '.' . $image->getClientOriginalExtension();
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

    public function showFavoriteList()
    {
        return view('User::frontOffice.Sportif.favoritList', ['whishList' => Auth::user()->wishlists()->get()]);

        //    return Auth::user()->favoritesClubs;
    }

    public function showTest()
    {
        return Auth::user();
    }

    //Admin Login
    public function showAdminLogin()
    {

        if (Auth::check()) {
            if (Auth::user()->roles()->pluck('title')->first() === 'Admin') {
                return redirect(route('showAdminDashboard'));
            } else {
                return redirect('showHome');
            }
        }
        return view('User::backOffice.auth.login');
    }

    public function handleAdminLogin(Request $request)
    {
        $credentials = $this->credentials($request);
        $rememberMe = $request->has('remember_me') ? true : false;
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $rememberMe)) {
            $user = Auth::getLastAttempted($credentials, true);
            if ($user->roles()->pluck('title')->first() == "Admin") {
                Auth::login($user);
                return redirect()->route('showAdminDashboard');
            } else {
                Auth::logout();
                alert()->error('Vérifier vos données', 'Erreur')->persistent('Ok');
                return redirect()->route('showAdminLogin');
            }
        } else {
            Auth::logout();
            alert()->error('Vérifier vos données', 'Erreur')->persistent('Ok');
            return redirect()->route('showAdminLogin');
        }
    }

    //********* Admin Users

    public function showUsersList()
    {
        $athletics = User::whereHas('roles', function ($query) {
            $query->where('title', '=', 'Sportif');
        })->get();

        $privateOfficials = User::whereHas('roles', function ($query) {
            $query->where('title', '=', 'Responsable complexe prive');
        })->get();

        $publicOfficials = User::whereHas('roles', function ($query) {
            $query->where('title', '=', 'Responsable complexe public ');
        })->get();


        return view('User::backOffice.usersList', compact('athletics', 'privateOfficials', 'publicOfficials'));
    }

    public function handleAddUser(Request $request)
    {


        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => '',
            'role' => 'required|integer|between:2,4',

        ],
            [
                'email.email' => 'Veuillez saisir un email valide',
                'email.required' => 'Le champ email est obligatoire',
                'email.unique' => 'L\'email indiqué est déjà utilisé',
                'first_name.required' => 'Le champ Prénom est obligatoire',
                'last_name.required' => 'Le champ Nom est obligatoire',
                'role.required' => 'Vérifier vos données',
                'role.integer' => 'Vérifier vos données',
                'role.between' => 'Vérifier vos données',
            ]);

        $validation = str_random(30);
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'gender' => ($request->input('gender')) ? $request->input('gender') : 1,
            'validation' => $validation,
            'status' => 0,
            'phone' => ($request->has('phone')) ? $request->input('phone') : null,
            'promo_pts' => 0,
            'picture' => 'img/unknown.png',
        ]);
        $user->assignRole($request->input('role'));
        $content = ['user' => $user, 'validationLink' => URL('user/activation/' . $user->email . '/' . $validation), 'password' => $request->password];

        Mail::send('User::mail.welcome', $content, function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Bienvenue');
        });
        $user->save();
    }

    public function handleDeleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            alert()->success("Utilisateur supprimer avec succès")->persistent("Ok");
        }

        return redirect()->route('showUsersList');
    }

    public function handleUpdateUser(Request $request, $id)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => '',
            'password' => '',

        ],
            [
                'email.email' => 'Veuillez saisir un email valide',
                'email.required' => 'Le champ email est obligatoire',
                'first_name.required' => 'Le champ Prénom est obligatoire',
                'last_name.required' => 'Le champ Nom est obligatoire',
            ]);


        $user = User::find($id);

        if ($user) {

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $this->validate($request, [
                'picture' => 'image|mimes:jpeg,bmp,png',
            ],

                [
                    'picture.image' => 'Le champ doit d\'ètre de Type Image',
                    'picture.mimes' => 'L\'extension d\'image aloué:peg,bmp,png  ',
                ]

            );
            if ($request->hasFile('picture')) {

                $file = $request->picture;
                $imagePath = 'storage/uploads/users/';
                $filename = 'avatar' . $user->id . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($imagePath), $filename);
                $user->update([
                    'picture' => $imagePath . '' . $filename
                ]);

            }
            if ($request->input('password')) {
                $user->password = bcrypt($request->password);
            }
            if ($user->email != $request->email) {
                $userExistWihEmail = User::where('email', $request->email)->first();
                if ($userExistWihEmail) {
                    alert()->success("L'email indiqué est déjà utilisé")->persistent("Ok");
                    $user->save();
                    return redirect('showUsersList');
                } else {
                    $user->email = $request->email;
                }
            }
            $user->save();
            alert()->success("Utilisateur Modifier avec succès")->persistent("Ok");
        }

        return redirect()->route('showUsersList');
    }

    public function handleGetUserById($id)
    {
        $user = User::find($id);
        return ($user) ? json_encode(['user' => $user, 'edit_url' => route('handleUpdateUser', $user->id), 'user_image' => asset($user->picture)]) : json_encode(['response' => null]);
    }

    public function showAddComplexAdmin()
    {
        return view('User::backOffice.addComplexe',
            [
                'categories' => Category::all()
            ]
        );
    }

    public function showComplexsList()
    {
        return view('User::backOffice.complexList',
            [
                'complexs' => Complex::with('address')->paginate(30)
            ]
        );
    }

    public function handleAddComplex(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            "address" => "required",
            "latitude" => "required",
            "longitude" => "required",
            "city" => "required",
            "postal_code" => "required",
            "locality" => "required",
            "name" => "required",
            "categories" => "required",
            "phone" => "required",
            "email" => "required|email",
            "web_site" => "required"
        ],
            [
                "address.required" => "Le champ adresse est obligatoire",
                "latitude.required" => "Le champ latitude  est obligatoire",
                "longitude.required" => "Le champ longitude est obligatoire",
                'city.required' => "Le champ Ville est obligatoire",
                'postal_code' => "Le champ code postal  est obligatoire",
                "locality.required" => "Le champ localité est obligatoire",
                "name.required" => "Le champ nom de complex est obligatoire",
                "phone.required" => "Le champ phone  est obligatoire",
                "email.required" => "Le champ email",
                "email.email" => "Le champ doit ètre email",
                "web_site.required" => "Le champ Site Web est est obligatoire",

            ]
        );

        $address = Address::Create([
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'locality' => $request->locality,
            'address' => $request->adresse,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'description' => $request->description,
        ]);
        $complex = Complex::Create([
            'name' => $request->name,
            'phone' => $request->phone,
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
            foreach ($otherCategories as $otherCategorie) {

                Category::create([
                    "category" => $otherCategorie,
                    "complex_id" => $complex->id
                ]);
            }
        }

        SweetAlert::success('Bien !', 'Complex ajouté avec succès. !')->persistent('Fermer');
        return redirect()->route('showAddComplexAdmin');
    }

    //*****************Terrain *************//
    public function showTerrainsList()
    {

        $userTerrains = Terrain::whereHas('complex', function ($subQuery) {
            $subQuery->where('user_id', Auth::user()->id);
        })->paginate(5);
        return view('User::backOffice.terrainsList',
            [
                'userTerrains' => $userTerrains
            ]
        );
    }

    public function showAddTerrain()
    {
        $user = Auth::user();
        $Complexs = $user->Complexs()->get();
        if (empty($Complexs)) {
            SweetAlert::error('Opps !', 'Veuillez Ajouter Un Complex. !')->persistent('Fermer');
            return redirect()->route('showAddComplex');
        }
        return view('User::backOffice.addTerrain',
            [
                'specialities' => Sport::All(),
                'Complexs' => $Complexs
            ]
        );

    }

    public function handleAddTerrain(Request $request)
    {

        $this->validate($request, [
            "name" => "required",
            "complex_id" => "required",
            "category_id" => "required",
            "speciality_id" => "required",
            "description" => "required",
            "size" => "required|between:0,9999",
            "type" => "required",
            'images' => "required",
            'images.*' => "image|mimes:jpeg,png,jpg,gif,svg"
        ],
            [
                'name' => 'Le champ Nom de terrain est  obligatoire',
                'complex_id' => 'Le champ Complex de terrain est  obligatoire',
                'category_id' => 'Le champ Categorie de terrain est  obligatoire',
                'speciality_id' => 'Le champ speciality de terrain est  obligatoire',
                "description" => 'Le champ Description de terrain est  obligatoire',
                "size.required" => 'Le champ Size de terrain est  obligatoire',
                "size.between" => 'Format Invalide de champ Type',
                "type.required" => 'Le champ Type de terrain est  obligatoire',
                'images.required' => 'Le champ Image de terrain est  obligatoire',
                'images.image' => 'Le champ doit ètre de type image',
                'images.mimes' => 'Le champ doit ètre de type image: peg,png,jpg,gif,svg',
            ]
        );

        dd($request);

        $terrain = Terrain::create([
            "name" => $request->name,
            "complex_id" => $request->complex_id,
            "category_id" => $request->category_id,
            "sport_id" => $request->speciality_id,
            "description" => $request->description,
            "size" => $request->size,
            "type" => $request->type,
            'height' => $request->height,
            'length' => $request->length,
            'width' => $request->width,
            'lighting' => $request->lighting,
            'terrain_nature' => $request->terrain_nature,
            'soil_type' => $request->soil_type,
            'video_recorder' => $request->video_recorder
        ]);


        $imagePath = 'storage/uploads/terrains/';
        foreach ($request->images as $image) {
            $filename = 'terrain-' . $terrain->id . '-' . str_random(5) . '-' . time() . '.' . $image->getClientOriginalExtension();
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
        return redirect()->route('showAddTerrain');
    }

    public function showEditTerrain($id)
    {
        $terrain = Terrain::find($id);
        if ($terrain) {
            return view('User::backOffice.editTerrain', ['specialities' => Sport::All(),
                'Complexs' => Auth::user()->Complexs()->get()], compact('terrain'));
        }
        return redirect()->route('showTerrainsList');
    }

    public function handleEditTerrain(Request $request, $id)
    {
        $terrain = Terrain::find($id);
        if (!$terrain) {
            return redirect()->route('showTerrainsList');
        }
        $this->validate($request, [
            "name" => "required",
            "complex_id" => "required",
            "category_id" => "required",
            "speciality_id" => "required",
            "description" => "required",
            "size" => "required|between:0,9999",
            "type" => "required",
            'images' => "required",
            'images.*' => "image|mimes:jpeg,png,jpg,gif,svg"
        ],
            [
                'name' => 'Le champ Nom de terrain est  obligatoire',
                'complex_id' => 'Le champ Complex de terrain est  obligatoire',
                'category_id' => 'Le champ Categorie de terrain est  obligatoire',
                'speciality_id' => 'Le champ speciality de terrain est  obligatoire',
                "description" => 'Le champ Description de terrain est  obligatoire',
                "size.required" => 'Le champ Size de terrain est  obligatoire',
                "size.between" => 'Format Invalide de champ Type',
                "type.required" => 'Le champ Type de terrain est  obligatoire',
                'images.required' => 'Le champ Image de terrain est  obligatoire',
                'images.image' => 'Le champ doit ètre de type image',
                'images.mimes' => 'Le champ doit ètre de type image: peg,png,jpg,gif,svg',
            ]
        );
        $terrain->name = $request->name;
        $terrain->description = $request->description;
        $terrain->size = $request->size;

        $imagePath = 'storage/uploads/terrains/';
        foreach ($request->images as $image) {
            $filename = 'terrain-' . $terrain->id . '-' . str_random(5) . '-' . time() . '.' . $image->getClientOriginalExtension();
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

        SweetAlert::success('Bien !', 'Terrain a été modifier avec succès. !')->persistent('Fermer');
        return redirect()->route('showTerrainsList');

    }

    //********************Clubs******************

    public function showClubsList()
    {
        $clubs = Club::whereHas('terrain.complex', function ($subQuery) {
            $subQuery->where('user_id', Auth::user()->id);
        })->paginate(5);

        return view('User::backOffice.clubsList',
            [
                'clubs' => $clubs
            ]
        );
    }

    public function showAdminClubsList()
    {
        /* $clubs = Club::whereHas('terrain.complex', function ($subQuery) {
             $subQuery->where('user_id', Auth::user()->id);
         })->paginate(5);*/
        $clubs = Club::paginate(5);
        return view('User::backOffice.clubsList',
            [
                'clubs' => $clubs
            ]
        );
    }

    public function showAddClub()
    {

        $userTerrains = Terrain::whereHas('complex', function ($subQuery) {
            $subQuery->where('user_id', Auth::user()->id);
        })->get();

        if (empty($userTerrains)) {
            SweetAlert::error('Opps !', 'Veuillez Ajouter Un Terrain. !')->persistent('Fermer');
            return redirect()->route('showAddTerrain');
        }

        return view('User::backOffice.addClub',
            [
                'terrains' => $userTerrains
            ]
        );

    }

    public function showComplexRequest()
    {

        return view('User::backOffice.showComplexRequest', ['complexRequests' => ComplexRequest::all(),
            'clubsRequests' => ClubRequest::all()]);
    }


    public function cancelComplexRequest($id)
    {
        $complexRequest = ComplexRequest::find($id);
        if ($complexRequest) {
            $complexRequest->status = -1;

            alert()->error("Demande d'accès est annulé", "Bien")->persistent("Ok");
        }
        return redirect()->back();
    }

    public function acceptComplexRequest($id)
    {
        $complexRequest = ComplexRequest::find($id);
        if ($complexRequest) {
            $complexRequest->status = 1;
            $complexRequest->complex->user_id = $complexRequest->user->id;
            $complexRequest->complex->save();
            $complexRequest->save();
            alert()->error("Demande d'accès est accepté", "Bien")->persistent("Ok");
        }
        return redirect()->back();

    }

    public function handleAcceptClubRequest($id)
    {
        $clubRequest = ClubRequest::find($id);
        if ($clubRequest) {
            $clubRequest->status = 1;
            $clubRequest->save();
            alert()->error("Demande d'accès est accepté", "Bien")->persistent("Ok");
        }
        return redirect()->back();
    }

    public function handleCancelComplexRequest($id)
    {
        $complexRequest = ComplexRequest::find($id);
        if ($complexRequest) {
            $complexRequest->status = -1;

            alert()->error("Demande d'accès est annulé", "Bien")->persistent("Ok");
        }
        return redirect()->back();
    }




    public function handleAddInfrastructure(Request $request)
    {
        $this->validate($request, [
            "reception" => "required",
            "catering_space" => "required",
            "handicap_access" => "required",
            "tribune_count" => "required",
            "spectator_tribune_count" => "required",
            "cloakroom_player" => "required",
            "cloakroom_referee" => "required",
            'sports_sanitary' => "required",
            'parking_place' => "required",
            'handicap_parking_place' => "required",

        ],
            [
                'reception.required' => 'Le champ acceuil de terrain est obligatoire',
                'catering_space.required' => 'Le champ espace de restauration est obligatoire',
                'handicap_access.required' => 'Le champ Accès handicapé de terrain est obligatoire',
                'tribune_count.required' => 'Le champ nombre tribune de terrain est obligatoire',
                "spectator_tribune_count.required" => 'Le champ nombre de tribune des spectateurs est obligatoire',
                "cloakroom_player.required" => 'Le champ nombre de vestiaire des jouerus est obligatoire',
                "cloakroom_referee.required" => 'Le champ nombre de vestiaire des arbitres est obligatoire',
                "sports_sanitary.required" => 'Le champ nombre de sanitaire sportif est obligatoire',
                "parking_place.required" => 'Le champ nombre de place parking est obligatoire',
                "handicap_parking_place	.required" => 'Le champ nombre de place parking pour les handicapés est obligatoire',

            ]
        );


        Infrastructure::create([
            "reception" => $request->reception,
            'reception_choices' => json_encode($request->acceuil_choice),
            "catering_space" => $request->catering_space,
            "handicap_access" => $request->handicape_access,
            "tribune_count" => $request->tribune_count,
            "spectator_tribune_count" => $request->spectator_tribune_count,
            "cloakroom_player" => $request->cloakroom_player,
            "cloakroom_referee" => $request->cloakroom_referee,
            'sports_sanitary' => $request->sports_sanitary,
            'parking_place' => $request->parking_place,
            'handicap_parking_place' => $request->handicap_parking_place,
            'complex_id' => Auth::user()->complex->id,
        ]);
        alert()->success("Infrastructure ajouté avec succès", "Bien")->persistent("Ok");
        return redirect()->route('showUserDashboard');
    }

    public function handleEditInfrastructure(Request $request)
    {
        $this->validate($request, [
            "reception" => "required",
            "catering_space" => "required",
            "handicap_access" => "required",
            "tribune_count" => "required",
            "spectator_tribune_count" => "required",
            "cloakroom_player" => "required",
            "cloakroom_referee" => "required",
            'sports_sanitary' => "required",
            'parking_place' => "required",
            'handicap_parking_place' => "required",

        ],
            [
                'reception.required' => 'Le champ acceuil de terrain est obligatoire',
                'catering_space.required' => 'Le champ espace de restauration est obligatoire',
                'handicap_access.required' => 'Le champ Accès handicapé de terrain est obligatoire',
                'tribune_count.required' => 'Le champ nombre tribune de terrain est obligatoire',
                "spectator_tribune_count.required" => 'Le champ nombre de tribune des spectateurs est obligatoire',
                "cloakroom_player.required" => 'Le champ nombre de vestiaire des jouerus est obligatoire',
                "cloakroom_referee.required" => 'Le champ nombre de vestiaire des arbitres est obligatoire',
                "sports_sanitary.required" => 'Le champ nombre de sanitaire sportif est obligatoire',
                "parking_place.required" => 'Le champ nombre de place parking est obligatoire',
                "handicap_parking_place	.required" => 'Le champ nombre de place parking pour les handicapés est obligatoire',

            ]
        );

        $infrastructure = Auth::user()->complex->infrastructure;

        $infrastructure->reception = $request->reception;
        $infrastructure->reception_choices = json_encode($request->reception_choices);
        $infrastructure->catering_space = $request->catering_space;
        $infrastructure->handicap_access = $request->handicap_access;
        $infrastructure->tribune_count = $request->tribune_count;
        $infrastructure->spectator_tribune_count = $request->spectator_tribune_count;
        $infrastructure->cloakroom_player = $request->cloakroom_player;
        $infrastructure->cloakroom_referee = $request->cloakroom_referee;
        $infrastructure->sports_sanitary = $request->sports_sanitary;

        $infrastructure->parking_place = $request->parking_place;
        $infrastructure->handicap_parking_place = $request->handicap_parking_place;

        $infrastructure->save();

        alert()->success("Infrastructure modifié avec succès", "Bien")->persistent("Ok");

        return redirect()->back();
    }

    public function showUserEditInfrastructure()
    {
        return View('User::frontOffice.userEditInfrastructure', ['infrastructure' => Auth::user()->complex->infrastructure]);
    }


    /********** Media Request **********/

    public function showMediaRequest()
    {

        return view('User::backOffice.showCategoryRequest', ['categoryRequests' => Category::where('status','=','0')->get()]);
    }
    public function handleAcceptMediaRequest($id)
    {
        $mediaRequest = Media::find($id);
        if ($mediaRequest) {
            $mediaRequest->status = $mediaRequest->type + 1;
            $mediaRequest->save();
            alert()->error("Media accepté", "Bien")->persistent("Ok");
        }
        return redirect()->back();
    }

    public function handleCancelMediaRequest($id)
    {
        $mediaRequest = Media::find($id);
        if ($mediaRequest) {
            $mediaRequest->type = 10;
            $mediaRequest->save();
            alert()->error("Media annulé", "Bien")->persistent("Ok");
        }
        return redirect()->back();
    }

    /********** Category Request **********/

    public function showCategoryRequest()
    {

        return view('User::backOffice.showCategoryRequest', [
            'categoryRequests' => Category::all()
        ]);
    }
    public function handleAcceptCategoryRequest($id)
    {
        $categoryRequest = Category::find($id);
        if ($categoryRequest) {
            $categoryRequest->status = 1;
            $categoryRequest->save();
            alert()->error("Bien !", "Catégorie acceptée")->persistent("Ok");
        }
        return redirect()->back();
    }

    public function handleCancelCategoryRequest($id)
    {
        $mediaRequest = Category::find($id);
        if ($mediaRequest) {
            $mediaRequest->status = 0;
            $mediaRequest->save();
            alert()->error("Bien !", "Catégorie annulée")->persistent("Ok");
        }
        return redirect()->back();
    }

}
