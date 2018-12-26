<?php

namespace App\Modules\Infrastructures\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    * Display Search Stade Page
    *
    * @return \Illuminate\Http\Response
    */
    public function showTerrainDetails()
    {
      return view('Infrastructure::Recherche.terrainDetails');
    }


}
