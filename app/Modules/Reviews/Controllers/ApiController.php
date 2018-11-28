<?php

namespace App\Modules\Reviews\Controllers;

use App\Modules\Infrastructures\Models\Complex;
use App\Modules\Infrastructures\Models\Terrain;
use App\Modules\Infrastructures\Models\Equipment;
use App\Modules\Reviews\Models\Review;
use App\Modules\User\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{

    public function getWishlist(Request $request , $userId){

        if (!$request->has('token') or !checkApiToken($request->input('token')) or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }

        $user = User::find($userId);
        if(!$user)
        {
            return response()->json(['status' => 404]);
        }

        return response()->json(['status' => 200 , 'wishlist' => $user->wishlists()->get()]);

    }

    public function handleAddToWishlist(Request $request , $userId){

        if (!$request->has('token') or !checkApiToken($request->input('token')) or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }

        $user = User::find($userId);
        if(!$user)
        {
            return response()->json(['status' => 404]);
        }

        if(!$request->has('id') or !$request->has('type'))
        {
            return response()->json(['status' => 404]);
        }

        if($request->input('type') == 1){

            $complex = Complex::find($request->input('id'));

            $wishlist = $complex->wishlists()->where('user_id',$userId)->first();


            if(!$complex or $wishlist)
            {
                return response()->json(['status' => 405]);
            }

            $complex->wishlists()->create([
                'user_id' => $userId
            ]);
        }else
        {
            $terrain = Terrain::find($request->input('id'));

            $wishlist = $terrain->wishlists()->where('user_id',$userId)->first();

            if(!$terrain or $wishlist)
            {
                return response()->json(['status' => 405]);
            }

            $terrain->wishlists()->create([
                'user_id' => $userId
            ]);
        }

        return response()->json(['status' => 200]);

    }

    public function handleDeleteFromWishlist(Request $request , $userId){

        if (!$request->has('token') or !checkApiToken($request->input('token')) or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }

        $user = User::find($userId);
        if(!$user)
        {
            return response()->json(['status' => 404]);
        }

        if(!$request->has('id') or !$request->has('type'))
        {
            return response()->json(['status' => 404]);
        }

        if($request->input('type') == 1){

            $complex = Complex::find($request->input('id'));

            if(!$complex)
            {
                return response()->json(['status' => 404]);
            }

            $complex->wishlists()->delete();
        }else
        {
            $terrain = Terrain::find($request->input('id'));

            if(!$terrain)
            {
                return response()->json(['status' => 404]);
            }

            $terrain->wishlists()->delete();
        }

        return response()->json(['status' => 200]);
    }

    public function handleAddReview(Request $request , $userId){

    if (!$request->has('token') or !checkApiToken($request->input('token')) 
            or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }

        $user = User::find($userId);
        if(!$user)
        {
            return response()->json(['status' => 404]);
        }

         if(!$request->has('id') or !$request->has('type') or !$request->has('note'))
        {
            return response()->json(['status' => 404]);
        }

         if($request->input('type') == 1){

           $complex = Complex::find($request->input('id'));

           if(!$complex)
            {
                return response()->json(['status' => 404]);
            }

            $complex->reviews()->create([
                'note' => $request->input('note'),
                'comment' => ($request->has('comment')) ? $request->input('comment') : '',
                'user_id' => $userId
            ]);
            }elseif ($request->input('type') == 2){

            $terrain = Terrain::find($request->input('id'));

           if(!$terrain)
            {
                return response()->json(['status' => 404]);
            }

            $terrain->reviews()->create([
                'note' => $request->input('note'),
                'comment' => ($request->has('comment')) ? $request->input('comment') : '',
                'user_id' => $userId
            ]);
        }else{

           $equipment = Equipment::find($request->input('id'));

           if(!$equipment)
            {
                return response()->json(['status' => 404]);
            }

            $equipment->reviews()->create([
                'note' => $request->input('note'),
                'comment' => ($request->has('comment')) ? $request->input('comment') : '',
                'user_id' => $userId
            ]);

        }

         return response()->json(['status' => 200]);
    }

    public function getReviews(Request $request , $userId){

        if (!$request->has('token') or !checkApiToken($request->input('token'))
            or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }

          $user = User::find($userId);
          if(!$user)
           {
            return response()->json(['status' => 404]);
           }

           return response()->json(['status' => 200 , 'reviews' => $user->reviews()->with('reviewed')->get()]);

    }

    public function handleDeleteReview(Request $request){

        if (!$request->has('token') or !checkApiToken($request->input('token')) or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }
        if(!$request->has('id'))
        {
            return response()->json(['status' => 404]);
        }

        $review = Review::find($request->input('id'));

        if(!$review)
        {
            return response()->json(['status' => 404]);
        }

        $review->delete();

        return response()->json(['status' => 200]);
    }

    public function handleAddReport(Request $request , $userId){

        if (!$request->has('token') or !checkApiToken($request->input('token'))
            or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }

        $user = User::find($userId);
        if(!$user)
        {
            return response()->json(['status' => 404]);
        }

        if(!$request->has('id') or !$request->has('type') or !$request->has('title'))
        {
            return response()->json(['status' => 404]);
        }

        if($request->input('type') == 1){

            $complex = Complex::find($request->input('id'));

            if(!$complex)
            {
                return response()->json(['status' => 404]);
            }

            $report = $complex->reports()->create([
                'title' => $request->input('title'),
                'description' => ($request->has('description')) ? $request->input('description') : null,
                'user_id' => $userId
            ]);


        }elseif ($request->input('type') == 2){

            $terrain = Terrain::find($request->input('id'));

            if(!$terrain)
            {
                return response()->json(['status' => 404]);
            }

            $report = $terrain->reports()->create([
                'title' => $request->input('title'),
                'description' => ($request->has('description')) ? $request->input('description') : null,
                'user_id' => $userId
            ]);

        }else{

            $equipment = Equipment::find($request->input('id'));

            if(!$equipment)
            {
                return response()->json(['status' => 404]);
            }

            $report = $equipment->reports()->create([
                'title' => $request->input('title'),
                'description' => ($request->has('description')) ? $request->input('description') : null,
                'user_id' => $userId
            ]);
        }

        if($request->has('images')){

            $images = $request->input('images');
            foreach ($images as $image){

            $report->medias()->create([
                'link' => $image['link'],
                'type' => 4
            ]);
        }
        }

        return response()->json(['status' => 200]);
    }

    public function getReports(Request $request , $userId){

        if (!$request->has('token') or !checkApiToken($request->input('token'))
            or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }

        $user = User::find($userId);
        if(!$user)
        {
            return response()->json(['status' => 404]);
        }

        return response()->json(['status' => 200 , 'reports' => $user->reports()->with('reported')->with('medias')->get()]);
    }
}