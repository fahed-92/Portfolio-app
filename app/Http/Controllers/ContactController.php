<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        // Store the email in the database
        Email::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'is_read' => false
        ]);

        // Send email notification
        Mail::to('fahed9285@gmail.com')->send(new ContactForm($details));

        return response()->json(['success' => 'Your message has been sent. Thank you!']);
    }
}
