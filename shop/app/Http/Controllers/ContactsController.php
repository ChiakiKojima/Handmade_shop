<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class ContactsController extends Controller
{
    public function contact() {
        $user = Auth::user();
        return view('contact.form', [ 'user' => $user ]);
    }
    public function contactConfirm(ContactRequest $request) {
        $contact = $request->validated();
        Session::put('contact', $contact);
        $contact = Session::get('contact');
        //dump($contact);
        return view('contact.contact_confirm', compact('contact'));
    }
    public function sendMail() {
        $data = Session::get('contact');
        # Mailファサード
        Mail::send(['text' => 'contact.email_message'], $data, function($message) use($data){ //メール送信処理
        $message->to($data["email"])->subject($data["title"])->bcc('from@example.com'); 
        });
        
        \Flash::success('お問い合わせを送信しました。');
        return redirect()->route('home');
    }
    
}
