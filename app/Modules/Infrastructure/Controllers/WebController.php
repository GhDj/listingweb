<?php

namespace App\Modules\Infrastructures\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Modules\Infrastructures\Models\Terrain;
use  App\Modules\Infrastructures\Models\Complex;
use  App\Modules\Infrastructures\Models\Category;

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
        'result' => Terrain::find($id)
      ]);
    }

    /**
    * Display Details Club Page
    *
    * @return \Illuminate\Http\Response
    */
    public function showClubDetails()
    {
      return view('Infrastructure::Recherche.clubDetails');
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
              if ($data = @file_get_contents("http://ip-api.com/json")) {
                  $json = json_decode($data, true);
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

            $results = Terrain::select('terrains.*')
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
                   'results' => $results,
                   'categories' => Category::All()
                 ]);





}












}
