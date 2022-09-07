<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;
use Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request){

        Mail::to($request->input('to_email'))->cc($request->input('from_email'))->send(new Contact($request->input('from_email'), 
                                                                                       $request->input('to_email'),
                                                                                       $request->input('name'),
                                                                                       $request->input('phone'),
                                                                                       $request->input('message'),
                                                                                       $request->input('return_path')));

        return redirect("/".$request->return_path);
    }
}
