<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class EmailController extends Controller
{
    public function sendEmail(Request $request){

    $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $details = [
            'subject' => $request->input('subject'),
            'body' => $request->input('body'),
        ];
        $email = User::pluck('email'); 

        foreach ($email as $emails) {
            Mail::to($emails)->send(new SendMail($details));
        }

        return redirect('/');
        // return redirect()->back()->with('success', 'Email sent successfully!');
}
}
