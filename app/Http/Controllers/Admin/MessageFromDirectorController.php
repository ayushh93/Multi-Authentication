<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Messagefromdirector;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class MessageFromDirectorController extends Controller
{
    public function index()
    {
        $message = Messagefromdirector::where('id',1)->first();
        return view('admin.about.messagefromdirector.index',compact('message'));
    }
    public function edit($id)
    {
        $message = Messagefromdirector::findorfail($id);
        return view('admin.about.messagefromdirector.edit',compact('message'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $message = Messagefromdirector::findorfail($id);
        $imagea = $message->image;
        //upload 1st image
        if($request->hasFile('image1')) {
            File::delete('uploads/about/messagefromdirector/'.$imagea);
            $image1             = $request->file('image1');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/about/messagefromdirector/';
            $ImageUpload1->save($destinationPath.$name1);
        }else{
            $name1 = $imagea;
        }
        $message->title = $data['title'];
        $message->image = $name1;
        $message->description = $data['description'];
        $status = $message->save();
         if($status){
            Session()->flash('success_message','Message from director was successfully updated.');
        }else{
            Session()->flash('error_message','Sorry! Message from director could not be updated at this moment.');
        }
        return redirect()->route('admin.about.messagefromdirector.index');
    }
}
