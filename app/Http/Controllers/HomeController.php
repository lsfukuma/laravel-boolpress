<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\userMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
    public function contact()
    {
        return view('contact');
    }

    public function sendMail(Request $request)
    {
        Mail::to('admin@boolpress.info')->send(new userMail());
        return redirect()->route('/posts');
    }
}
