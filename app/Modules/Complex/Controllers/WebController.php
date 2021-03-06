<?php

namespace App\Modules\Complex\Controllers;

use App\Modules\Complex\Models\Sport;
use App\Modules\Complex\Models\SportCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Modules\Complex\Models\Terrain;
use  App\Modules\Complex\Models\Complex;
use  App\Modules\Complex\Models\Category;
use App\Modules\Complex\Models\Club;
use App\Modules\Infrastructure\Models\Team;
use App\Modules\Complex\Models\TerrainSpeciality;
use Alert;
class WebController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Complex::index");
    }

    /**
     * Display Search Page
     *
     * @return \Illuminate\Http\Response
     */
    public function showSearchPage()
    {
        return view('Infrastructure::Recherche.searchPage');
    }

    /**
     * Display Details Terrain Page
     *
     * @return \Illuminate\Http\Response
     */
    public function showTerrainDetails($id)
    {
        $terrain = Terrain::find($id);
        if (!$terrain) {
            alert()->error('Opps !', 'Terrain Introuvable. !')->persistent('Fermer');
            return redirect()->route('showHome');
        }
        $starsTerrain = 0;
        if (!empty($terrain->reviews)) {
            $starsTerrain = $terrain->reviews->avg('note');
        }

        return view('Infrastructure::Recherche.terrainDetails', [
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
            weetAlert::error('Opps !', 'Club Introuvable. !')->persistent('Fermer');
            return redirect()->route('showHome');
        }
        $starsClub = 0;
        if (!empty($club->reviews)) {
            $starsClub = $club->reviews->avg('note');
        }
        $specialitys = TerrainSpeciality::whereHas('teams.club', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        return view('Infrastructure::Recherche.clubDetails', [
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


        return View('Infrastructure::Recherche.searchPage', [
            'terrains' => $terrains,
            'categories' => Category::select('category')->groupBy('category')->get(),
            'sports' => TerrainSpeciality::All(),
            'latitude' => (isset($data['latitude'])) ? $data['latitude'] : null,
            'longitude' => (isset($data['longitude'])) ? $data['longitude'] : null,
            'address' => (isset($data['address'])) ? $data['address'] : null,

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
                    $subQuery->where('speciality_id', $data['speciality']);
                });
            })
            ->when($sqlDistance != null, function ($query) use ($sqlDistance) {
                $query->whereHas('terrain.complex.address', function ($subQuery) use ($sqlDistance) {
                    $subQuery->addSelect(DB::raw("{$sqlDistance} AS distance"));
                    $subQuery->havingRaw("distance <= ?", [50]);
                });
            })
            ->get();

        return View('Infrastructure::Recherche.searchPage', [
            'clubs' => $clubs,
            'categories' => Category::select('category')->groupBy('category')->get(),
            'sports' => Sport::All(),
            'latitude' => (isset($data['latitudeClub'])) ? $data['latitudeClub'] : null,
            'longitude' => (isset($data['latitudeClub'])) ? $data['latitudeClub'] : null,
            'address' => (isset($data['address'])) ? $data['address'] : null,
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
                    $subQuery->where('category', $data['category']);
                });
            })
            ->when(isset($data['categories']), function ($query) use ($data) {
                $query->whereHas('category', function ($subQuery) use ($data) {
                    $subQuery->whereIn('category', $data['categories']);
                });
            })
            ->when($sqlDistance != null, function ($query) use ($sqlDistance, $data) {
                $query->whereHas('complex.address', function ($subQuery) use ($sqlDistance, $data) {
                    $subQuery->addSelect(DB::raw("{$sqlDistance} AS distance"));
                    $subQuery->havingRaw("distance <= ?", [(int)$data['distance']]);
                });
            })->get();


        return View('Infrastructure::Recherche.searchPage', [
            'terrains' => $terrains,
            'categories' => Category::select('category')->groupBy('category')->get(),
            'sports' => TerrainSpeciality::All(),
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
                    $subQuery->where('speciality_id', $data['speciality']);
                });
            })
            ->when(isset($data['specialitys']), function ($query) use ($data) {
                $query->whereHas('teams', function ($subQuery) use ($data) {
                    $subQuery->whereIn('speciality_id', $data['specialitys']);
                });
            })
            ->when($sqlDistance != null, function ($query) use ($sqlDistance, $data) {
                $query->whereHas('terrain.complex.address', function ($subQuery) use ($sqlDistance, $data) {
                    $subQuery->addSelect(DB::raw("{$sqlDistance} AS distance"));
                    $subQuery->havingRaw("distance <= ?", [(int)$data['distance']]);
                });
            })
            ->get();


        return View('Infrastructure::Recherche.searchPage', [
            'clubs' => $clubs,
            'categories' => Category::select('category')->groupBy('category')->get(),
            'sports' => TerrainSpeciality::All(),
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

        return response()->json(['status' => 200, 'categories' => $complex->categories]);
    }

    public function handleAjaxGetSportsCategories(Request $request) {
       $q = $request->input('q');
        $sportsCaregories = SportCategory::where('title','LIKE',"%".$q."%")->get();
        $formattedData = $sportsCaregories;
        foreach ($formattedData as $caregory)
        {
            $caregory->id = $caregory->sport_id;
        }

      //  dd($request->input('q'));
        return response()->json(['status' => 200, 'categories' => $formattedData]);

    }

    public function handleAjaxGetSports(Request $request) {
        $q = $request->input('q');
        $sportsCaregories = Sport::where('sport_categories_id','=',$q)->get();
       /* $formattedData = $sportsCaregories;
        foreach ($formattedData as $caregory)
        {
            $caregory->id = $caregory->sport_id;
        }*/

        //  dd($request->input('q'));
        return response()->json(['status' => 200, 'sports' => $sportsCaregories]);

    }

}
