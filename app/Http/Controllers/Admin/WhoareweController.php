<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Whoarewe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class WhoareweController extends Controller
{
    public function index()
    {
        $data = Whoarewe::where('id',1)->first();
        return view('admin.about.whoarewe.index',compact('data'));
    }
    public function edit($id)
    {
        $data = Whoarewe::findorfail($id);
        return view('admin.about.whoarewe.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $whoarewe = Whoarewe::findorfail($id);
        $imagea = $whoarewe->image;
        //upload 1st image
        if($request->hasFile('image1')) {
            File::delete('uploads/about/whoarewe/'.$imagea);
            $image1             = $request->file('image1');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/about/whoarewe/';
            $ImageUpload1->save($destinationPath.$name1);
        }else{
            $name1 = $imagea;
        }
        $whoarewe->title = $data['title'];
        $whoarewe->image = $name1;
        $whoarewe->description = $data['description'];
        $status = $whoarewe->save();
         if($status){
            Session()->flash('success_message','Who are we page was successfully updated.');
        }else{
            Session()->flash('error_message','Sorry! Who are we page could not be updated at this moment.');
        }
        return redirect()->route('admin.about.whoarewe.index');
    }
}
