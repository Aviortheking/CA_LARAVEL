<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ContactUS;
use App\Mail\EmailReceipt;
use Illuminate\Support\Facades\Form;
use App\Mail\ContactEmail;
use Mail;
use Exception;

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

        try {
            Mail::send(new ContactEmail(array('name' => $request->get('name'),'email' => $request->get('email'),'user_message' => $request->get('message'))));
        } catch (Exception $e) {
            return back()->with('error', 'Erreur lors de l\'envoie du Mail, Réessayer');
        }
        Mail::to($request->get('email'))->send(new EmailReceipt(array('name' => $request->get('name'))));

        return back()->with('success', 'Bien joué mec!');
    }
}
