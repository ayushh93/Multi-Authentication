<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Gallery::latest()->get();
        return view('admin.gallery.photogallery.index', compact('images'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        //upload product images
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $gallery = new Gallery();
                $ImageUpload    = Image::make($image)->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $name = $image->getClientOriginalName();
                $destinationPath    = 'uploads/gallery/';
                $ImageUpload->save($destinationPath.$name); 
                $gallery->image = $name;
                $gallery->save();
            }
        }
        Session()->flash('success_message', 'Images Has Been Added Successfully To The Gallery');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $gallery = Gallery::findorfail($id);
        $image = $gallery->image;
        $status = $gallery->delete();
        if($status)
        {
            File::delete('uploads/gallery/'.$image);
            Session()->flash('success_message','Image was successfully deleted.');
        }
        else
        {
            Session()->flash('error_message','Sorry! Image could not be deleted at this moment.');
        }
        return redirect()->back();
    }
}
