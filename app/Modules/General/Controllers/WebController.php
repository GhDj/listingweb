<?php

namespace App\Modules\General\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Infrastructures\Models\Terrain;

use App\Modules\Infrastructures\Models\Complex;

use App\Modules\Infrastructures\Models\Category;

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
        'categories' => Category::All()
      ]);
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
