<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }
    public function contact_form(ContactRequest $request)

    {
        Mail::to('text.mail.d@yandex.by')->send(new ContactMail($request->validated()));
        return redirect(route('home'));
    }
}
