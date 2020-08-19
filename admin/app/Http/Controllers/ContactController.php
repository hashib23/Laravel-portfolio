<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactModel;

class ContactController extends Controller
{
        function ContactIndex(){
        return view('contact');
    }

    function getContactsData(){
        $result = ContactModel::orderBy('id','desc')->get();
        return $result;
    }

    function getContactDetails(Request $req){
        $id = $req->input('id');
        $result = ContactModel::where('id', '=', $id)->get();
        return $result;
    }

    function ContactDelete(Request $req){
        $id = $req->input('id');
        $result = ContactModel::where('id', '=', $id)->delete();
        if ($result == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    function ContactUpdate(Request $req)
    {
        $id = $req->input('id');
        $name = $req->input('name');
        $mobile = $req->input('mobile');
        $email = $req->input('email');
        $msg = $req->input('msg');

        $result = ContactModel::where('id', '=', $id)->update([
        'contact_name' => $name, 'contact_mobile' => $mobile, 'contact_email' => $email, 'contact_msg'=>$msg ]);

        if ($result == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
