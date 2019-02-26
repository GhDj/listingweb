<?php

namespace App\Modules\General\Controllers;

use App\Modules\Content\Models\Post;
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
        'posts'=>Post::OrderBy('id')->limit(3)->get(),
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

}
