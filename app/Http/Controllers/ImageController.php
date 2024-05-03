<?php

namespace App\Http\Controllers;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected function showImage($filename)
{
   //check image exist or not
   $exists = Storage::disk('public')->exists('images/'.$filename);
   
   if($exists) {
      
      //get content of image
      $content = Storage::get('public/images/'.$filename);
      
      //get mime type of image
      $mime = Storage::mimeType('public/images/'.$filename);
      //prepare response with image content and response code
      $response = Response::make($content, 200);
      //set header 
      $response->header("Content-Type", $mime);
      // return response
      return $response;
   } else {
      abort(404);
   }
}
}
