<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceModel;

class ServiceController extends Controller
{

    function ServiceIndex(){
        return view('services');
    }

    function getServicesData(){
        $result = ServiceModel::orderBy('id','desc')->get();
        return $result;
    }

    function getServiceDetails(Request $req){
        $id = $req->input('id');
        $result = ServiceModel::where('id', '=', $id)->get();
        return $result;
    }

    function ServiceDelete(Request $req){
        $id = $req->input('id');
        $result = ServiceModel::where('id', '=', $id)->delete();
        if ($result == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    function ServiceUpdate(Request $req)
    {
        $id = $req->input('id');
        $name = $req->input('name');
        $desc = $req->input('desc');
        $img = $req->input('img');

        $result = ServiceModel::where('id', '=', $id)->update([
        'service_name' => $name, 'service_desc' => $desc, 'service_img' => $img]);

        if ($result == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    function ServiceAdd(Request $req){
        $name = $req->input('name');
        $desc = $req->input('desc');
        $img = $req->input('img');
        $result=ServiceModel::insert([
            'service_name' =>$name,
            'service_desc' =>$desc,
            'service_img' =>$img
            ]);

        if ($result == true){
            return 1;
        }
        else
        {
            return 0;
        }
    }   
}