<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
     //
     public function store(Request $request)
     {
         $data = $request->all();
         $validated = $request->validate([
             'name' => 'required',
             'email' => 'required | email',
             'phone_number' => 'required | numeric | digits_between:9,15',
             'message' => 'required',
         ]);
         $contact = new Contact();
         $contact->name = $data['name'];
         $contact->email = $data['email'];
         $contact->phone_number = $data['phone_number'];
         $contact->message = $data['message'];
         $status = $contact->save();
         if ($status) {
             Session()->flash('success_message','Contact message was sent successfully.');
             return redirect()->back();
         }
         else
         {
             Session()->flash('error_message','Sorry! Enquiry could not be sent at this moment.');
             return redirect()->back();
         }
     }
     public function index()
     {
         $contacts = Contact::latest()->get();
         return view('admin.contact.index',compact('contacts'));
     }
     public function destroy($id)
     {
         $contact= Contact::findorfail($id);
         $status = $contact->delete();
         if($status)
         {
             Session()->flash('success_message','Contact was successfully deleted.');
         }
         else
         {
             Session()->flash('error_message','Sorry! Contact could not be deleted at this moment.');
         }
         return redirect()->route('admin.contact.index');
     }
     public function updateContactStatus(Request  $request)
     {
         $contact = Contact::find($request->contact_id); 
         $contact->status = $request->status; 
         $contact->save(); 
         return response()->json(['success_message'=>'Status change successfully.']); 
    }
}
