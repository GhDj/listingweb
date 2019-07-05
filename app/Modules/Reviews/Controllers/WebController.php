<?php

namespace App\Modules\Reviews\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use App\Modules\Reviews\Models\Report;
use App\Modules\Reviews\Models\Wishlist;
use App\Modules\Complex\Models\Terrain;
use App\Modules\Complex\Models\Club;
use Validator;
use Toastr;
use UxWeb\SweetAlert\SweetAlert;
use Image;
use App\Modules\General\Models\Media;
use Auth;
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

            $user = Auth::user();
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

    public function hundleUserReviews(Request $request,$terrain_id)
    {


            $validator = Validator::make($request->All(),[
                "rating" => "required",
                "comment" => "required",
                "image"  => 'mimes:jpeg,jpg,png | max:1000'
            ],
            [
              "rating.required" => "Veuillez choisir votre rating pour ce terrain ",
              "comment.required" =>  "Champ commantire est obligatoire",
              "image.mimes" => 'Choisir un format validé Pour l\'image ',
              "image.max" => 'Champ image est obligatoire',

            ]  );

            if ($validator->fails()) {
                 $error = $validator->errors()->first();
                 SweetAlert::error('Oops !', $error)->persistent('Fermer');
                 return back();
              }

           $user = Auth::user();
           $terrain = Terrain::find($terrain_id);

           if (empty($terrain)) {
             SweetAlert::error('Oops', 'Ce Terrain n\'existe pas ! !')->persistent('Fermer');
             return back();
           }
           $ratingValue = 0;



           switch ($request->input('rating'))
             {
            case 1:
             $ratingValue = 5;
             break;

            case 2:
             $ratingValue = 4;
             break;

            case 3:
             $ratingValue = 3;
             break;

            case 4:
             $ratingValue = 2;
             break;

            case 5:
             $ratingValue = 1;
             break;
             }

           $review = $terrain->reviews()->create(['note' => $ratingValue,
                                                  'comment' => $request->input('comment'),
                                                  'user_id' => $user->id
                                             ]);

          if (isset($request->image)) {
            $image = $request->image;

            $photo = 'review-' . str_random(5) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $fullImagePath = public_path('storage/uploads/reviews/' . $photo);
            Image::make($image->getRealPath())->save($fullImagePath);
            $imagePath = asset('/').'storage/uploads/reviews/' . $photo;

            $media = Media::create([
                'link' => $imagePath,
                'review_id' => $review->id,
                'type' => 2
            ]);

            dd($review->id);
          }


            Toastr::success('Votre commantaire a été ajouter avec succès !', 'Bien !', ["positionClass" => "toast-top-full-width","showDuration"=> "4000", "hideDuration"=> "1000", "timeOut"=> "300000"]);
            return back();


    }

    public function hundleUserWichlist($type,$id)
    {
     $user = Auth::user();

      switch ($type)
      	{
            case 'terrain':
            	$terrain = Terrain::find($id);
            	$test = $user->wishlists->where('wished_id', $id)->where('wished_type', 'App\Modules\Complex\Models\Terrain')->first();
            	if ($test)
            		{
            		$wishlist = Wishlist::where('user_id', $user->id)->where('wished_id', $id)->where('wished_type', 'App\Modules\Complex\Models\Terrain')->delete();
                $favorieTerrains = $wishlist - 1;
            		return Response()->json(['status' => 'deleted', "id" => $id, 'type' => $type , 'favorieTerrains'=>$favorieTerrains]);
            		}
            	  else
            		{
            		$terrain->wishlists()->create(['user_id' => $user->id]);
            		return Response()->json(['status' => 'added', 'id' => $id, 'type' => $type, 'favorieTerrains'=>$terrain->wishlists->count()]);
            		}

            	break;

              case 'club':
              	$club = Club::find($id);
              	$test = $user->wishlists->where('wished_id', $id)->where('wished_type', 'App\Modules\Complex\Models\Club')->first();
              	if ($test)
              		{
              		$wishlist = Wishlist::where('user_id', $user->id)->where('wished_id', $id)->where('wished_type', 'App\Modules\Complex\Models\Club')->delete();
              		return Response()->json(['status' => 'deleted', 'id' => $id, 'type' => $type,'favorieClubs'=>$club->wishlists->count()]);
              		}
              	  else
              		{
              		$club->wishlists()->create(['user_id' => $user->id]);
              		return Response()->json(['status' => 'added', 'id' => $id, 'type' => $type,'favorieClubs'=>$club->wishlists->count()]);
              		}

              	break;
      	}

      }

}
