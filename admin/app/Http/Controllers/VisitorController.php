<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;

class VisitorController extends Controller
{
    
	function VisitorIndex(){

		$VisitorsData=VisitorModel::orderBy('id','desc')->get();
		
		return view('visitor',['VisitorsData'=> $VisitorsData]);
	}

}
