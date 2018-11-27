<?php

namespace App\Modules\Reviews\Controllers;

use App\Modules\Infrastructures\Models\Complex;
use App\Modules\Infrastructures\Models\Terrain;
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

}