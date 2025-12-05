<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        // Store in database
        DB::table('contact_messages')->insert([
            'user_id' => Auth::id(), // Nullable if guest
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'new',
            'date_sent' => now(),
        ]);

        // Send confirmation email
        try {
            \Illuminate\Support\Facades\Mail::to($request->email)->send(new \App\Mail\ContactFormMail($data));
        } catch (\Exception $e) { 
            // Log::error("Mail sending failed: " . $e->getMessage());
        }

        return redirect()->route('contact.index')->with('success', 'Your message has been sent successfully! We have sent a confirmation email to your inbox.');
    }
}
