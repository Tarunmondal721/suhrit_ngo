<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
          // Retrieve all gallery images from the database

          return view('contact.index');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'number' => 'required | max:10'
            ]);
            $data = $request->all();
            $contact = Contact::create($data);
            return redirect()->back()->with('success', 'Your message has been sent successfully');
    }
}
