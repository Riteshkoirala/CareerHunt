<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $contact = $request->validated();

        $createContact = Contact::create($contact);

        return back()->with('success','Message Sent Successfully');
    }
}
