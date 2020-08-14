<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;

class VisitorController extends Controller
{
    
	function VisitorIndex(){

		$VisitorsData=VisitorModel::all();
		
		return view('visitor',['VisitorsData'=> $VisitorsData]);
	}

}
