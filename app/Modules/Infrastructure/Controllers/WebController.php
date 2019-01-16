<?php

namespace App\Modules\Infrastructures\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Modules\Infrastructures\Models\Terrain;
use  App\Modules\Infrastructures\Models\Complex;
use  App\Modules\Infrastructures\Models\Category;
use App\Modules\Infrastructures\Models\Club;
use App\Modules\Infrastructure\Models\Team;
use App\Modules\Infrastructures\Models\TerrainSpeciality;

class WebController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Infrastructures::index");
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

        return view('Infrastructure::Recherche.terrainDetails',[
        'terrain' => Terrain::find($id)
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

      $specialitys = TerrainSpeciality::whereHas('teams.club', function ($query) use ($id){
                      $query->where('id',$id);
                })->get();

      return view('Infrastructure::Recherche.clubDetails',[
      'club' => $club,
      'specialitys' => $specialitys
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


            if(isset($data['latitude']) and !empty($data['latitude'])){
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

            if($latitude != null and $longitude != null){
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
                          (' . $latitude  . ')
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
              ->when(isset($data['name']), function ($query) use ($data){
                  $query->Where('name', 'LIKE', '%' .$data['name'] . '%');
              })
              ->when(isset($data['category']) and $data['category'] != -1, function ($query) use ($data){
                  $query->whereHas('category', function ($subQuery) use ($data) {
                      $subQuery->where('id', $data['category']);
                  });
              })
              ->when($sqlDistance != null, function ($query) use ($sqlDistance){
                  $query->whereHas('complex.address', function ($subQuery) use ($sqlDistance) {
                      $subQuery->addSelect(DB::raw("{$sqlDistance} AS distance"));
                      $subQuery->havingRaw("distance <= ?", [10]);
                    });
              })->get();



              return View('Infrastructure::Recherche.searchPage',[
                   'terrains' => $terrains,
                   'categories' => Category::All()
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

            if(isset($data['latitudeClub']) and !empty($data['latitudeClub'])){
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

            if($latitude != null and $longitude != null){
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
                          (' . $latitude  . ')
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
              ->when(isset($data['name']), function ($query) use ($data){
                  $query->Where('name', 'LIKE', '%' .$data['name'] . '%');
              })
              ->when(isset($data['speciality']) , function ($query) use ($data){
                  $query->whereHas('teams', function ($subQuery) use ($data) {
                      $subQuery->where('speciality_id', $data['speciality']);
                  });
              })
              ->when($sqlDistance != null, function ($query) use ($sqlDistance){
                  $query->whereHas('terrain.complex.address', function ($subQuery) use ($sqlDistance) {
                      $subQuery->addSelect(DB::raw("{$sqlDistance} AS distance"));
                      $subQuery->havingRaw("distance <= ?", [50]);
                    });
              })
          ->get();

              return View('Infrastructure::Recherche.searchPage',[
                   'clubs' => $clubs,
                   'categories' => Category::All()
                 ]);

    }













}
