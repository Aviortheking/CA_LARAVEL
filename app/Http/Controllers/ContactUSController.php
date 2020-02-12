<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ContactUS;
use Mail;

class ContactUSController extends Controller
{
    public function contactUS()
    {
        return view('contactUS');
    }
    /** * Show the application dashboard. * * @return \Illuminate\Http\Response */
    public function contactUSPost(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required|email', 'message' => 'required']);
        ContactUS::create($request->all());


        $email_sender = $request->get('email');

        Mail::send(
            'email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ),
            function ($message) {
                $message->from('pouet@avior.me');
                $message->to('brossard.nicolas09@gmail.com', 'Admin')->subject('Super Cours Laravel');
            }
        );
        Mail::send(
            'email_receipt',
            array(
                'name' => $request->get('name'),
            ),
            function ($message) use ($email_sender) {
                $message->from('pouet@avior.me');
                $message->to($email_sender)->subject('Accusé de reception');
            }
        );
        return back()->with('success', 'Bien joué mec!');
    }
}
