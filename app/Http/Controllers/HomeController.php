<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailNewContact;
use Illuminate\Support\Facades\Mail;
use App\Message;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
    public function contact()
    {
        return view('contact');
    }

    public function contactStore(Request $request)
    {
        $data = $request->all();
        $newMessage = new Message();
        $newMessage->fill($data);
        $newMessage->save();

        Mail::to('info@boolpress.com')->send(new MailNewContact($newMessage));
        return redirect()->route('posts.index');
    }


}
