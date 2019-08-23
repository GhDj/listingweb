<?php

namespace App\Modules\General\Controllers;

use App\Modules\Complex\Models\Club;
use App\Modules\Complex\Models\ComplexCategory;
use App\Modules\Complex\Models\Infrastructure;
use App\Modules\Complex\Models\Sport;
use App\Modules\Content\Models\Post;
use App\Modules\General\Models\Address;
use App\Modules\General\Models\AdressImport;
use App\Modules\General\Models\Media;
use App\Modules\Infrastructure\Models\ComplexSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Modules\Complex\Models\Terrain;

use App\Modules\Complex\Models\Complex;

use App\Modules\Complex\Models\Category;


use App\Modules\Complex\Models\Equipment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use Maatwebsite\Excel\Facades\Excel;
use UxWeb\SweetAlert\SweetAlert;
use Intervention\Image\ImageManagerStatic as Image;


class WebController extends Controller
{

    /**
     * Display Home Page
     *
     * @return \Illuminate\Http\Response
     */
    public function showHome()
    {
        return view('General::welcome', [
            'results' => Terrain::paginate(30),
            'categories' => Category::paginate(30),
            'sports' => Sport::paginate(30),
            'complex' => Complex::paginate(30),
            'terrains'=>Terrain::paginate(30),
            'posts' => Post::OrderBy('id')->limit(3)->get(),
            'footballTerrains' => Terrain::where('sport_id', 1)->take(4)->with('medias')->get()
        ]);
    }

    public function showFamily() {
        return view('General::family');
    }

    public function getTerrainsBySport($sport)
    {
        $terrains = Terrain::where('sport_id', $sport)
            ->take(4)
            ->with('medias')
            ->get();

        $sport = Sport::find($sport);

        if ($terrains) {
            return Response()->json(['status' => '200', 'terrains' => $terrains, 'sport' => $sport]);

        } else {
            return Response()->json(['status' => '404']);

        }
    }

    public function showContact()
    {
        return view('General::contact');
    }

    public function handlePageNotFound()
    {
        return view('General::404');
    }

    public function showFaq()
    {
        return view('General::faq');
    }


    //*********************** Search functions **********************//

    public function showSearchPage(Request $request)
    {
        if (isset($request['selectdCategoryId']))
        {
            $selectedCategory = Category::where('id','=',$request['selectdCategoryId'])->first()->title;
        } else if (isset($category_id)) {
            $selectedCategory = Category::where('id','=',$category_id)->first()->title;
         } else {
            $selectedCategory = null;
        }

        if ($dataResponse = @file_get_contents("http://ip-api.com/json")) {
            $json = json_decode($dataResponse, true);
            $latitude = $json['lat'];
            $longitude = $json['lon'];
        } else {
            $latitude = null;
            $longitude = null;
        }

        return view('General::search.searchPage', [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'categories' => Category::all(),
            'address' => '',
            'sports' => Sport::all(),
            'selectedCategory' => $selectedCategory,
            'terrains' => Terrain::paginate(30)
            ]);
    }


    public function showTerrainDetails($id)
    {

        $terrain = Terrain::find($id);
        if (!$terrain) {
            SweetAlert::error('Opps !', 'Terrain Introuvable. !')->persistent('Fermer');
            return redirect()->route('showHome');
        }

        Terrain::find($id)->complex->increment('view_count');

        $starsTerrain = 0;
        if (!empty($terrain->reviews)) {
            $starsTerrain = $terrain->reviews->avg('note');
        }

        return view('General::search.terrainDetails', [
            'terrain' => $terrain,
            'starsTerrain' => $starsTerrain
        ]);

    }

    /**
     * Display Details Club Page
     *
     * @return \Illuminate\Http\Response
     */
    public function showClubDetails($id)
    {
        $club = Club::find($id);
        if (!$club) {
            SweetAlert::error('Opps !', 'Club Introuvable. !')->persistent('Fermer');
            return redirect()->route('showHome');
        }
        $starsClub = 0;
        if (!empty($club->reviews)) {
            $starsClub = $club->reviews->avg('note');
        }
        /*$specialitys = Sport::whereHas('teams.club', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();*/
        //dd($club->sports);
        return view('General::search.clubDetails', [
            'clubDetail' => $club,
            'specialitys' => $club->sports()->get(),
            'sports' => $club->sports()->get(),
            'starsClub' => $starsClub
        ]);
    }

    /**
     * Display Details Club Page
     *
     * @return \Illuminate\Http\Response
     */
    public function handleSearchMaps()
    {

        $data = Input::All();

        //dd($data);

        $selectdCategoryId = $data['category'];

        if (isset($data['latitude']) and !empty($data['latitude'])) {
            $latitude = $data['latitude'];
            $longitude = $data['longitude'];

        } else {
            if ($dataResponse = @file_get_contents("http://ip-api.com/json")) {
                $json = json_decode($dataResponse, true);
                $latitude = $json['lat'];
                $longitude = $json['lon'];
            } else {
                $latitude = null;
                $longitude = null;
            }
        }

        if ($latitude != null and $longitude != null) {
            $sqlDistance = DB::raw
            ('
              ( 6371 * acos
                  ( cos
                      ( radians
                          (' . $latitude . ')
                      )
                  * cos
                      ( radians
                          ( latitude )
                      )
                  * cos
                      ( radians
                          ( longitude )
                      - radians
                          (' . $longitude . ')
                      )
                  + sin
                      ( radians
                          (' . $latitude . ')
                      )
                  * sin
                      ( radians
                          ( latitude )
                      )
                  )
              )
            ');
        } else {
            $sqlDistance = null;
        }

        $terrains = Terrain::select('terrains.*')
            ->when(isset($data['name']), function ($query) use ($data) {
                $query->Where('name', 'LIKE', '%' . $data['name'] . '%');
            })
            ->when(isset($data['category']) and $data['category'] != -1, function ($query) use ($data) {
                $query->whereHas('category', function ($subQuery) use ($data) {
                    $subQuery->where('id', $data['category']);
                });
            })
            ->when($sqlDistance != null, function ($query) use ($sqlDistance) {
                $query->whereHas('complex.address', function ($subQuery) use ($sqlDistance) {
                    $subQuery->addSelect(DB::raw("{$sqlDistance} AS distance"));
                    $subQuery->havingRaw("distance <= ?", [10]);
                });
            })->get();


        return View('General::search.searchPage', [
            'terrains' => $terrains,
            'categories' => Category::all(),
            'sports' => Sport::All(),
            'selectdCategoryId' => $selectdCategoryId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'address' => isset($data['address']) ? $data['address'] : null,
        ]);

    }


    /**
     * Display Details Club Page
     *
     * @return \Illuminate\Http\Response
     */
    public function handleSearchClubs()
    {

        $data = Input::All();

        if (isset($data['latitudeClub']) and !empty($data['latitudeClub'])) {
            $latitude = $data['latitudeClub'];
            $longitude = $data['longitudeClub'];
        } else {
            if ($dataResponse = @file_get_contents("http://ip-api.com/json")) {
                $json = json_decode($dataResponse, true);
                $latitude = $json['lat'];
                $longitude = $json['lon'];
            } else {
                $latitude = null;
                $longitude = null;
            }
        }

        if ($latitude != null and $longitude != null) {
            $sqlDistance = DB::raw
            ('
              ( 6371 * acos
                  ( cos
                      ( radians
                          (' . $latitude . ')
                      )
                  * cos
                      ( radians
                          ( latitude )
                      )
                  * cos
                      ( radians
                          ( longitude )
                      - radians
                          (' . $longitude . ')
                      )
                  + sin
                      ( radians
                          (' . $latitude . ')
                      )
                  * sin
                      ( radians
                          ( latitude )
                      )
                  )
              )
            ');
        } else {
            $sqlDistance = null;
        }


       /* $clubs = Club::select('clubs.*')
            ->when(isset($data['name']), function ($query) use ($data) {
                $query->Where('name', 'LIKE', '%' . $data['name'] . '%');
            })
            ->when(isset($data['speciality']) and $data['speciality'] != -1, function ($query) use ($data) {
                $query->whereHas('teams', function ($subQuery) use ($data) {
                    $subQuery->where('sport_id', $data['speciality']);
                });
            })
            ->when($sqlDistance != null, function ($query) use ($sqlDistance) {
                $query->whereHas('terrain.complex.address', function ($subQuery) use ($sqlDistance) {
                    $subQuery->addSelect(DB::raw("{$sqlDistance} AS distance"));
                    $subQuery->havingRaw("distance <= ?", [50]);
                });
            })
            ->get();*/

        return View('General::search.searchPage', [
            'clubs' => Club::all(),
            'categories' => Category::select('title')->groupBy('title')->get(),
            'sports' => Sport::All(),
            'latitude' => $latitude,
            'longitude' => $longitude,
            //'address' => $data['address'],
        ]);

    }


    public function handleFilterMaps(Request $request)
    {
        $data = Input::All();

        if (isset($data['latitude']) and !empty($data['latitude'])) {
            $latitude = $data['latitude'];
            $longitude = $data['longitude'];
        } else {
            if ($dataResponse = @file_get_contents("http://ip-api.com/json")) {
                $json = json_decode($dataResponse, true);
                $latitude = $json['lat'];
                $longitude = $json['lon'];
            } else {
                $latitude = null;
                $longitude = null;
            }
        }

        if ($latitude != null and $longitude != null) {
            $sqlDistance = DB::raw
            ('
        ( 6371 * acos
            ( cos
                ( radians
                    (' . $latitude . ')
                )
            * cos
                ( radians
                    ( latitude )
                )
            * cos
                ( radians
                    ( longitude )
                - radians
                    (' . $longitude . ')
                )
            + sin
                ( radians
                    (' . $latitude . ')
                )
            * sin
                ( radians
                    ( latitude )
                )
            )
        )
      ');
        } else {
            $sqlDistance = null;
        }

        $terrains = Terrain::select('terrains.*')
            ->when(isset($data['name']), function ($query) use ($data) {
                $query->Where('name', 'LIKE', '%' . $data['name'] . '%');
            })
            ->when(isset($data['category']) and $data['category'] != -1, function ($query) use ($data) {
                $query->whereHas('category', function ($subQuery) use ($data) {
                    $subQuery->where('title', $data['category']);
                });
            })
            ->when(isset($data['categories']), function ($query) use ($data) {
                $query->whereHas('category', function ($subQuery) use ($data) {
                    $subQuery->whereIn('title', $data['categories']);
                });
            })
            ->when($sqlDistance != null, function ($query) use ($sqlDistance, $data) {
                $query->whereHas('complex.address', function ($subQuery) use ($sqlDistance, $data) {
                    $subQuery->addSelect(DB::raw("{$sqlDistance} AS distance"));
                    $subQuery->havingRaw("distance <= ?", [(int)$data['distance']]);
                });
            })->get();

        return View('General::search.searchPage', [
            'terrains' => $terrains,
            'categories' => Category::select('title')->groupBy('title')->get(),
            'sports' => Sport::All(),
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'address' => $data['address'],
            'oldCategories' => isset($data['categories']) ? $data['categories'] : null
        ]);

    }

    public function handleFilterClubs(Request $request)
    {
        $data = Input::All();

        if (isset($data['latitudeClub']) and !empty($data['latitudeClub'])) {
            $latitude = $data['latitudeClub'];
            $longitude = $data['longitudeClub'];
        } else {
            if ($dataResponse = @file_get_contents("http://ip-api.com/json")) {
                $json = json_decode($dataResponse, true);
                $latitude = $json['lat'];
                $longitude = $json['lon'];
            } else {
                $latitude = null;
                $longitude = null;
            }
        }

        if ($latitude != null and $longitude != null) {
            $sqlDistance = DB::raw
            ('
        ( 6371 * acos
            ( cos
                ( radians
                    (' . $latitude . ')
                )
            * cos
                ( radians
                    ( latitude )
                )
            * cos
                ( radians
                    ( longitude )
                - radians
                    (' . $longitude . ')
                )
            + sin
                ( radians
                    (' . $latitude . ')
                )
            * sin
                ( radians
                    ( latitude )
                )
            )
        )
      ');
        } else {
            $sqlDistance = null;
        }

        $clubs = Club::select('clubs.*')
            ->when(isset($data['name']), function ($query) use ($data) {
                $query->Where('name', 'LIKE', '%' . $data['name'] . '%');
            })
            ->when(isset($data['speciality']) and $data['speciality'] != -1, function ($query) use ($data) {
                $query->whereHas('teams', function ($subQuery) use ($data) {
                    $subQuery->where('sport_id', $data['speciality']);
                });
            })
            ->when(isset($data['specialitys']), function ($query) use ($data) {
                $query->whereHas('teams', function ($subQuery) use ($data) {
                    $subQuery->whereIn('sport_id', $data['specialitys']);
                });
            })
            ->when($sqlDistance != null, function ($query) use ($sqlDistance, $data) {
                $query->whereHas('terrain.complex.address', function ($subQuery) use ($sqlDistance, $data) {
                    $subQuery->addSelect(DB::raw("{$sqlDistance} AS distance"));
                    $subQuery->havingRaw("distance <= ?", [(int)$data['distance']]);
                });
            })
            ->get();


        return View('General::search.searchPage', [
            'clubs' => $clubs,
            'categories' => Category::select('title')->groupBy('title')->get(),
            'sports' => Sport::All(),
            'latitude' => $data['latitudeClub'],
            'longitude' => $data['longitudeClub'],
            'address' => $data['address'],
        ]);

    }

    public function hundleGetCategory($id)
    {
        $complex = Complex::find($id);

        if (!$complex) {
            return response()->json(['status' => 404]);
        }

        return response()->json(['status' => 200, 'categories' => $complex->categories()->with('category')->get()]);
    }

    public function hundleGetListingByCategory($id)
    {
        $complex = Complex::where('id','=',ComplexCategory::find($id)->complex_id)->first();

        $terrains = Terrain::whereHas('complex')->where('complex_id','=',$complex->id)->get();


        if (isset($category_id)) {
            $selectedCategory = Category::where('id','=',$id)->first()->title;
        } else {
            $selectedCategory = null;
        }

       // dd($complex->categories);

       // $terrains = Complex::where('id','=',ComplexCategory::find($id)->complex_id)->get()->terrains();

       // return response()->json(['status' => 200, 'complexes' => $terrains]);
        return view('General::search.searchPage', [
            'complexs' => $complex,
            'selectedCategory'=> $selectedCategory,
            'latitude' => null,
            'longitude' => null,
            'categories' => Category::all(),
            'address' => '',
            'terrains' => $terrains,
            'sports' => Sport::all()
        ]);
    }

    public function ExcelToJson()
    {
        ini_set('memory_limit', '2048M');

       // set_time_limit(0);
        $repository = public_path() . '/uploads/';
        //Excel::fake();
        //$ee = Excel::import(new AdressImport,$repository . "V01.xls");
       // $ee = Excel::assertImported($repository . "V01.xls",function($reader) {
      //      $reader->all();
        //})->get();
      //  Excel::assertImported($repository . "V01.xls", 'disks');
        //$array = (new AdressImport)->toArray($repository ."V01.xls");
      //  dd($array);
       // Excel::import(new AdressImport,$repository . "V01.xls");
        /*try {
            $response = file_get_contents($repository."data.json");
        } catch (\Exception $e) {
            SweetAlert::error('Erreur de comunication avec l\'API avec l\'erreur suivant : ' . $e->getMessage())->persistent('Fermer');
            return $e;
        }*/

      //  dd(json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', utf8_encode($response)),true));
       // dd($response);
        $i = 0;

        for ($i;$i<=453;$i++) {
            try {
                $response = file_get_contents($repository."data".$i.".json");
            } catch (\Exception $e) {
                SweetAlert::error('Erreur de comunication avec l\'API avec l\'erreur suivant : ' . $e->getMessage())->persistent('Fermer');
                return $e;
            }
            if (isset($response))// Show response
                // $response = json_decode($response, true);
                $response = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', utf8_encode($response)),true);
            else die('Echec de la syncro');

            if ($response != null) {
                foreach ($response as $complex) {
                    $is_admin = (isset($complex['Nom Lieu Dit'])) ? $complex['Nom Lieu Dit'] : $complex['Commune '];
                    if (!isset($complex['Nom de la rue'])) {
                        $complex['Nom de la rue'] = '';
                    }
                    $address = Address::create([
                        'postal_code' => (isset($complex['Code Postal'])) ? $complex['Code Postal'] : '',
                        'country' => 'france',
                        'city' => (isset($complex['Nom Lieu Dit'])) ? $complex['Nom Lieu Dit'] : $complex['Commune '],
                        'address' => (isset($complex['Numro de la voie '])) ? $complex['Numro de la voie '] : '' .
                        ", " . (isset($complex['Nom de la rue'])) ? $complex['Nom de la rue'] : '' .
                            ", " . $complex['Commune ']
                    ]);
                    $complex = Complex::create([
                        'installation_id' => $complex['Numro de l\'installation sportive '],
                        'name' => $complex['Nom de l\'installation sportive '],
                        'web_site' => (isset($complex['Site web'])) ? $complex['Site web'] : null,
                        'phone' => (isset($complex['num_tel'])) ? $complex['num_tel'] : null,
                        'address_id' => $address->id
                    ]);

                    Infrastructure::create([
                        'handicap_access' => $complex['Installation Accessible Handicap'],
                        'parking_place' => $complex['Nombre de place de Parking'],
                        'handicap_parking_place' => $complex['Nombre de places Handicaps'],
                        'complex_id' => $complex->id
                    ]);


                    /*if ((\DateTime::createFromFormat('H:i:', $complex['open_sunday']) !== FALSE) && (DateTime::createFromFormat('H:i', $complex['close_sunday']) !== FALSE)) {

                        $complex->schedules()->create([
                            'start_at' => Carbon::parse($complex['Heure de fermeture Lundi'])->format('H:i'),
                            'ends_at' => Carbon::parse($complex['Heure de fermeture Lundi'])->format('H:i'),
                            'day' => 0,
                        ]);
                    }

                    if ((\DateTime::createFromFormat('H:i:', $complex['open_Monday']) !== FALSE) && (DateTime::createFromFormat('H:i:', $complex['close_Monday']) !== FALSE)) {
                        $complex->schedules()->create([
                            'start_at' => Carbon::parse($complex['Heure d\'ouverture Lundi'])->format('H:i'),
                            'ends_at' => Carbon::parse($complex['Heure de fermeture Lundi'])->format('H:i'),
                            'day' => 1,
                        ]);
                    }

                    if ((\DateTime::createFromFormat('H:i:', $complex['open_Tuesday']) !== FALSE) && (DateTime::createFromFormat('H:i:', $complex['close_Tuesday']) !== FALSE)) {
                        $complex->schedules()->create([
                            'start_at' => Carbon::parse($complex['open_Tuesday'])->format('H:i'),
                            'ends_at' => Carbon::parse($complex['close_Tuesday'])->format('H:i'),
                            'day' => 2,
                        ]);

                    }
                    if ((\DateTime::createFromFormat('H:i:', $complex['open_Wednesday']) !== FALSE) && (DateTime::createFromFormat('H:i:', $complex['close_wednesday']) !== FALSE)) {
                        $complex->schedules()->create([
                            'start_at' => Carbon::parse($complex['open_Wednesday'])->format('H:i'),
                            'ends_at' => Carbon::parse($complex['close_wednesday'])->format('H:i'),
                            'day' => 3,
                        ]);
                    }

                    if ((\DateTime::createFromFormat('H:i:', $complex['open_thursday']) !== FALSE) && (DateTime::createFromFormat('H:i:', $complex['close_thursday']) !== FALSE)) {
                        $complex->schedules()->create([
                            'start_at' => Carbon::parse($complex['open_thursday'])->format('H:i'),
                            'ends_at' => Carbon::parse($complex['close_thursday'])->format('H:i'),
                            'day' => 4,
                        ]);
                    }
                    if ((\DateTime::createFromFormat('H:i:', $complex['open_Friday']) !== FALSE) && (DateTime::createFromFormat('H:i:', $complex['close_Friday']) !== FALSE)) {
                        $complex->schedules()->create([
                            'start_at' => Carbon::parse($complex['open_Friday'])->format('H:i'),
                            'ends_at' => Carbon::parse($complex['close_Friday'])->format('H:i'),
                            'day' => 5,
                        ]);
                    }
                    if ((\DateTime::createFromFormat('H:i:', $complex['open_saturday']) !== FALSE) && (DateTime::createFromFormat('H:i:', $complex['close_saturday']) !== FALSE)) {
                        $complex->schedules()->create([
                            'start_at' => Carbon::parse($complex['open_saturday'])->format('H:i'),
                            'ends_at' => Carbon::parse($complex['close_saturday'])->format('H:i'),
                            'day' => 6,
                        ]);
                    }*/
                }
            }
        }



        /*//dd($response);
        $i = 0;
       // $output = [];
        $output = array_chunk($response,300,true);
        foreach ($output as $d) {
        //    $arrResult = json_decode($response,true);
            Storage::disk('public')->put('data'.$i.'.json', json_encode($d));
            $i++;
            //array_push($complex);
         //   dd($d);
        }*/


        return "done";
        //unlink($repository."complex.json");
    }

    public function handleUploadImage(Request $request) {

        request()->validate([

            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $images  = $request->file('images');



        foreach ($images as $image) {

         //   dd($image);

            $filename = time().'-'.$image->getClientOriginalName();
            $image->move(public_path('/uploads/terrains/'), $filename);


          //  $image->move(public_path('/uploads/terrains/'),$filename);


            //dd($image);

          Media::create([
                'link' =>'uploads/terrains/'.$filename,
                'terrain_id' => $request['terrain_id'],
                'type' => 10
                /* type 10 means images uploaded for the gallery by any authentificated user and waiting for validation*/,
            ]);

        }
        //dd($request['images']);
        SweetAlert::success('Bien !', 'Images Ajoutés. !')->persistent('Fermer');
        return redirect()->back();

    }
}
