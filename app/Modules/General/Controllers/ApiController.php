<?php


namespace App\Modules\General\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class ApiController extends Controller
{

    public function handleUploadImage(Request $request){

        if (!$request->has('token') or !checkApiToken($request->input('token')) or $request->getContentType() !== 'json') {
            return response()->json(['status' => 403]);
        }

        if(!$request->has('picture')
        ){
            return response()->json([
                'status' => 404
            ]);
        }

        $picture = time() . '-' . str_random(8) . '.png';

        $fullImagePath = public_path('storage/uploads/'.$picture);
        Image::make(transform64BitPicture($request->input('picture')))->save($fullImagePath);
        $photoPath = 'storage/uploads/'.$picture;

        return response()->json(['status' => 200, 'picture' => $photoPath]);

    }

}