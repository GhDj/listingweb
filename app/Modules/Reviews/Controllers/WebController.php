<?php

namespace App\Modules\Reviews\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use App\Modules\Reviews\Models\Report;
use App\Modules\Infrastructures\Models\Terrain;
use Validator;
use Toastr;

class WebController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Reviews::index");
    }


    public function hundleUserReport(Request $request,$terrain_id)
    {
          $validate = Validator::make($request->All(),[
            'title' => "required",
            'description' => "required",
            ]);

            if ($validate->fails()) {
              Toastr::error('Vérifier que tous les champs sont remplis !', 'Oops', ["positionClass" => "toast-top-full-width","showDuration"=> "4000", "hideDuration"=> "1000", "timeOut"=> "300000"]);
              return back();
            }

            $user = User::find(1); // TODO: Change To Auth
            $report = new Report();
            $terrain = Terrain::find($terrain_id);

            $report->title = $request->input('title');
            $report->description = $request->input('description');
            $report->reported_id = $terrain->id;
            $report->user_id = $user->id;
            $terrain->reports()->save($report);
            $report->save();

          if (!$report) {
            Toastr::error('Il semble qu\'il y ait un problème !', 'Oops', ["positionClass" => "toast-top-full-width","showDuration"=> "4000", "hideDuration"=> "1000", "timeOut"=> "300000"]);
          }

            Toastr::success('Votre Report a été envoyé avec succès !', 'Bien !', ["positionClass" => "toast-top-full-width","showDuration"=> "4000", "hideDuration"=> "1000", "timeOut"=> "300000"]);

            return back();
    }

}
