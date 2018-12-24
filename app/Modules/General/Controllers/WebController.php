<?php

namespace App\Modules\General\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{

    /**
    * Display Home Page
    *
    * @return \Illuminate\Http\Response
    */
    public function showHome()
    {
      return view('General::welcome');
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
