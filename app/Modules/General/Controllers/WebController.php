<?php

namespace App\Modules\General\Controllers;

use App\Modules\Complex\Models\Club;
use App\Modules\Complex\Models\Sport;
use App\Modules\Content\Models\Post;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Modules\Complex\Models\Terrain;

use App\Modules\Complex\Models\Complex;

use App\Modules\Complex\Models\Category;


use App\Modules\Complex\Models\Equipment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


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
        return view('General::search.searchPage',['latitude'=>'','longitude'=>'','categories'=>Category::all(),'address'=>'','sports'=>Sport::all()]);
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
            'categories' => Category::select('category')->groupBy('category')->get(),
            'sports' => Sport::All(),
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'address' => $data['address'],
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
            'categories' => Category::select('category')->groupBy('category')->get(),
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


        return View('General::search.searchPage', [
            'terrains' => $terrains,
            'categories' => Category::select('category')->groupBy('category')->get(),
            'sports' => Sport::All(),
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'address' => $data['address'],
            'oldCategories' => $data['categories']
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
            'categories' => Category::select('category')->groupBy('category')->get(),
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


}
