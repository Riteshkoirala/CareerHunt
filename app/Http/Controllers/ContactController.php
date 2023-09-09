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

    public function index(Request $request)
    {
        $contacts = $this->search($request)->paginate(10);
        return view('contact.admin-contact', compact('contacts'));
    }
    public function update($id)
    {
        $contact = Contact::where('id',$id)->first();
            $contact->update([
                'is_read'=>0,
            ]);
        return back();
    }

    public function search($request){

        $query = Contact::latest();

        if($request->search){
            $query = $query->orWhere(function ($query) use ($request) {
                $searchTerm = '%' . $request->search . '%';

                $query->where('contact_fullname', 'like', $searchTerm)
                    ->orWhere('contact_email', 'like', $searchTerm)
                    ->orWhere('contact_message', 'like', $searchTerm)
                    ->orWhere('contact_numbers', 'like', $searchTerm);
            });
        }
        if($request->status){
            if($request->status == 1) {
                $query = $query->where('is_read', 1);
            }
            if($request->status == 0) {
                $query = $query->where('is_read', 0);
            }
        }

        return $query;
    }
}
