<?php

namespace App\Modules\General\Controllers;

use App\Modules\Complex\Models\Club;
use App\Modules\Complex\Models\ComplexCategory;
use App\Modules\Complex\Models\Infrastructure;
use App\Modules\Complex\Models\Sport;
use App\Modules\Content\Models\Post;
use App\Modules\General\Models\Address;
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
use League\Csv\Reader;
use UxWeb\SweetAlert\SweetAlert;


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
            'results' => Terrain::All(),
            'categories' => Category::All(),
            'sports' => Sport::All(),
            'complex' => Complex::All(),
            'terrains'=>Terrain::all(),
            'posts' => Post::OrderBy('id')->limit(3)->get(),
            'footballTerrains' => Terrain::where('sport_id', 1)->take(4)->with('medias')->get()
        ]);
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

    public function showSearchPage()
    {
        return view('General::search.searchPage', ['latitude' => '', 'longitude' => '', 'categories' => Category::all(), 'address' => '', 'sports' => Sport::all()]);
    }


    public function showTerrainDetails($id)
    {

        $terrain = Terrain::find($id);
        if (!$terrain) {
            SweetAlert::error('Opps !', 'Terrain Introuvable. !')->persistent('Fermer');
            return redirect()->route('showHome');
        }

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
        $specialitys = Sport::whereHas('teams.club', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        return view('General::search.clubDetails', [
            'clubDetail' => $club,
            'specialitys' => $specialitys,
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

            'latitude' => $latitude,
            'longitude' => $latitude,
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


        $clubs = Club::select('clubs.*')
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
            ->get();

        return View('General::search.searchPage', [
            'clubs' => $clubs,
            'categories' => Category::select('title')->groupBy('title')->get(),
            'sports' => Sport::All(),
            'latitude' => $data['latitudeClub'],
            'longitude' => $data['latitudeClub'],
            'address' => $data['address'],
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
        //dd($complex['terrains']);
        if (!$complex) {
            return response()->json(['status' => 404]);
        }

        $terrains = Terrain::whereHas('complex')->where('complex_id','=',$complex->id)->get();

       // dd($complex->categories);

       // $terrains = Complex::where('id','=',ComplexCategory::find($id)->complex_id)->get()->terrains();

       // return response()->json(['status' => 200, 'complexes' => $terrains]);
        return view('General::search.searchPage', [
            'complexs' => $complex,
            'selectdCategoryId'=> $id,
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

        set_time_limit(0);
        $repository = public_path() . '/storage/uploads/excels/';
        try {
            $response = file_get_contents($repository . "complex29.json");
        } catch (\Exception $e) {
            SweetAlert::error('Erreur de comunication avec l\'API avec l\'erreur suivant : ' . $e->getMessage())->persistent('Fermer');
            return $e;
        }

        if (isset($response))// Show response
            $response = json_decode($response, true);
        else die('Echec de la syncro');

        if ($response != null) {
            foreach ($response as $complex) {

                $address = Address::create([
                    'postal_code' => $complex['postal_code'],
                    'country' => 'france',
                    'city' => $complex['place_name'],
                    'address' => $complex['street_number'] . ", " . $complex['street'] . ", " . $complex['place_name']
                ]);
                $complex = Complex::create([
                    'installation_id' => $complex['installation_id'],
                    'name' => $complex['name'],
                    'web_site' => $complex['web_site'],
                    'phone' => $complex['num_tel'],
                    'address_id' => $address->id
                ]);

                Infrastructure::create([
                    'handicap_access' => $complex['handicap_access'],
                    'parking_place' => $complex['parking_place'],
                    'handicap_parking_place' => $complex['handicap_place_parking'],
                    'complex_id' => $complex->id
                ]);


                if ((\DateTime::createFromFormat('H:i:', $complex['open_sunday']) !== FALSE) && (DateTime::createFromFormat('H:i', $complex['close_sunday']) !== FALSE)) {

                    $complex->schedules()->create([
                        'start_at' => Carbon::parse($complex['open_sunday'])->format('H:i'),
                        'ends_at' => Carbon::parse($complex['close_sunday'])->format('H:i'),
                        'day' => 0,
                    ]);
                }

                if ((\DateTime::createFromFormat('H:i:', $complex['open_Monday']) !== FALSE) && (DateTime::createFromFormat('H:i:', $complex['close_Monday']) !== FALSE)) {
                    $complex->schedules()->create([
                        'start_at' => Carbon::parse($complex['open_Monday'])->format('H:i'),
                        'ends_at' => Carbon::parse($complex['close_Monday'])->format('H:i'),
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
                }
            }
        }

        return "done";
        //unlink($repository."complex.json");
    }

}
