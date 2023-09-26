<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
//creating the contact page
class ContactController extends Controller
{
    //this function stores the contact that has been provided by the user
    public function store(ContactRequest $request)
    {
        //it validate the request
        $contact = $request->validated();
        //it create the new contact
        $createContact = Contact::create($contact);
        //it return back to the page it came from
        return back()->with('success','Message Sent Successfully');
    }

    public function index(Request $request)
    {
        //in this page we can see the contact messge that has been sent to the admin
        $contacts = $this->search($request)->paginate(10);
        //this is the contact view page
        return view('contact.admin-contact', compact('contacts'));
    }
    public function update($id)
    {
        //this is to amke the contact as read by the admin
        $contact = Contact::where('id',$id)->first();
            $contact->update([
                'is_read'=>1,
            ]);
            //this is to redirect the user to the before page
        return back();
    }

    public function search($request){

        //in here we can search the contact
        $query = Contact::latest();

        //this search for every other column in database
        if($request->search){
            $query = $query->orWhere(function ($query) use ($request) {
                $searchTerm = '%' . $request->search . '%';
                $query->where('contact_fullname', 'like', $searchTerm)
                    ->orWhere('contact_email', 'like', $searchTerm)
                    ->orWhere('contact_message', 'like', $searchTerm)
                    ->orWhere('contact_numbers', 'like', $searchTerm);
            });
        }
        //this search for the status
        if($request->status != null){
            if($request->status == 0) {
                $query = $query->where('is_read', 0);
            }
            else {
                $query = $query->where('is_read', 1);
            }
        }

        return $query;
    }
}
