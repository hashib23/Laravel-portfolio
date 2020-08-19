<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewModel;

class ReviewController extends Controller
{
    
	function ReviewIndex(){
		return view('review');
	}

	function getReviewsData(){
		$result = ReviewModel::orderBy('id','desc')->get();
        return $result;
	}

}
