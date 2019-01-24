<?php

namespace App\Modules\General\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Modules\Infrastructures\Models\Terrain;

use App\Modules\Infrastructures\Models\Complex;

use App\Modules\Infrastructures\Models\Category;

use App\Modules\Infrastructures\Models\TerrainSpeciality;

use App\Modules\Infrastructures\Models\Equipment;


class WebController extends Controller
{

    /**
    * Display Home Page
    *
    * @return \Illuminate\Http\Response
    */
    public function showHome()
    {
      return view('General::welcome',[
        'results' => Terrain::All(),
        'categories' => Category::All(),
        'sports' => TerrainSpeciality::All(),
        'equipements' => Equipment::All(),
        'complexs' => Complex::All(),
        'footballTerrains' => Terrain::where('speciality_id', 1)->take(4)->with('medias')->get()
      ]);
    }

    public function getTerrainsBySport($sport)
	  {
        $terrains = Terrain::where('speciality_id', $sport)
        ->take(4)
         ->with('medias')
        ->get();

        $sport = TerrainSpeciality::find($sport);

      	if ($terrains) {
      		return Response()->json(['status' => '200', 'terrains' => $terrains, 'sport'=>$sport]);

      		} else {
      		return Response()->json(['status' => '404']);

      		}
  	}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("General::index");
    }

}
