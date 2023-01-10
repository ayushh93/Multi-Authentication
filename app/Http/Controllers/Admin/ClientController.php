<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()->get();
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $client = new Client();
        $client->name = $data['name'];
         //upload image
         if($request->hasFile('image')) {
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $ext1 = $image1->getClientOriginalExtension();
            $name1               = time().'.'. $ext1;
            $destinationPath    = 'uploads/clients/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         $client->image = $name1;
         $status = $client->save();
         if($status){
             Session()->flash('success_message','Client was successfully added.');
         }else{
             Session()->flash('error_message','Sorry! Client could not be added at this moment.');
         }
         return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client = Client::findorfail($id);
        return view('admin.clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $client = Client::findorfail($id);
        $client->name = $data['name'];
        $image = $client->image;
         //upload image
         if($request->hasFile('image')) {
            File::delete('uploads/clients/'.$image);
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $ext1 = $image1->getClientOriginalExtension();
            $name1               = time().'.'. $ext1;
            $destinationPath    = 'uploads/clients/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         else
         {
            $name1 = $image;
         }
         $client->image = $name1;
         $status = $client->save();
         if($status){
             Session()->flash('success_message','Client was successfully updated.');
         }else{
             Session()->flash('error_message','Sorry! Client could not be updated at this moment.');
         }
         return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $client = Client::findorfail($id);
        $image = $client->image;
        $status = $client->delete();
        if($status)
        {
            File::delete('uploads/clients/'.$image);
            Session()->flash('success_message','Client was successfully deleted.');
        }
        else
        {
            Session()->flash('error_message','Sorry! Client could not be deleted at this moment.');
        }
        return redirect()->route('admin.clients.index');
    }
}
