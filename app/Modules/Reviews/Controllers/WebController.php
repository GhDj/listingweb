<?php

namespace App\Modules\Reviews\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use App\Modules\Reviews\Models\Report;
use App\Modules\Infrastructures\Models\Terrain;
use Validator;
use UxWeb\SweetAlert\SweetAlert;

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
              SweetAlert::error('Oops', 'Vérifier que tous les champs sont remplis ! !')->persistent('Fermer');
              return back();
            }

            $user = User::find(1); // TODO: Change To Auth
            $terrain = Terrain::find($terrain_id);

            if (empty($terrain)) {
              SweetAlert::error('Oops', 'Ce Terrain n\'existe pas ! !')->persistent('Fermer');
              return back();
            }

            $report = $terrain->reports()->create(['title' => $request->input('title'),
                                                   'description' => $request->input('description'),
                                                   'reported_id' => $terrain->id,
                                                   'user_id' => $user->id
                                              ]);
            if (!$report) {
            SweetAlert::error('Oops !', 'Un error se produit lors de l\'envoi de votre rapport !')->persistent('Fermer');
            }

            SweetAlert::success('Bien !', 'Votre Report a été envoyé avec succès !')->persistent('Fermer');
            return back();
    }

}
