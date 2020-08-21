<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhotoModel;

class PhotoController extends Controller
{
    function PhotoIndex(){
        return view('photo');
    }

    function PhotoUpload(Request $request){
        $photoPath=  $request->file('photo')->store('public');

        $photoName=(explode('/',$photoPath))[1];

        $host=$_SERVER['HTTP_HOST'];
        $location="http://".$host."/storage/".$photoName;

        $result= PhotoModel::insert(['location'=>$location]);
        return $result;
    }

    function PhotoJSON(){
        return PhotoModel::all();
    }

}



