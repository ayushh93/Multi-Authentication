<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactDetail;
use Illuminate\Http\Request;

class ContactDetailController extends Controller
{
    public function index()
    {
        $contact = ContactDetail::where('id',1)->first();
        return view('admin.contact_details.index',compact('contact'));
    }
    public function edit($id)
    {
        $contact = ContactDetail::findorfail($id);
        return view('admin.contact_details.edit',compact('contact'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validated = $request->validate([
            'email' => 'required | email',
            'address' => 'required',
            'contact_number' => 'required | numeric | digits_between:9,15',
        ]);
        $contact = ContactDetail::findorfail($id);
        $contact->email = $data['email'];
        $contact->address = $data['address'];
        $contact->contact_number = $data['contact_number'];
        $contact->facebook_link = $data['facebook_link'];
        $contact->instagram_link = $data['instagram_link'];
        $contact->twitter_link = $data['twitter_link'];
        $contact->youtube_link = $data['youtube_link'];
        $contact->map = $data['map'];
        $status = $contact->save();
        if($status){
            Session()->flash('success_message','Contact Detail was successfully updated.');
        }else{
            Session()->flash('error_message','Sorry! Contact Detail could not be updated at this moment.');
        }
        return redirect()->route('admin.contactdetail.index');
    }
}
