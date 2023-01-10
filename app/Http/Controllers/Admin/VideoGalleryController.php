<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Videogallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $videos = Videogallery::latest()->get();
        return view('admin.gallery.videogallery.index', compact('videos'));
    }
    public function store(Request $request)
    {
        if($request->hasFile('video')){
            $videogallery = new Videogallery();
            $file = $request->file('video');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/uploads/gallery/video';
            $file->move($path, $filename);
            $videogallery->video = $filename;
            $status = $videogallery->save();
        }
        if($status)
        Session()->flash('success_message', 'Video Has Been Added Successfully To The Video Gallery');
        else
        Session()->flash('error_message', 'Video Could not be Added To The Video Gallery');
        
        return redirect()->back();
    }
    public function destroy($id)
    {
        $video = Videogallery::findorfail($id);
        $videoa = $video->video;
        $status = $video->delete();
        if ($status) {
            File::delete('uploads/gallery/video/' . $videoa);
            Session()->flash('success_message', 'Video was successfully deleted.');
        } else {
            Session()->flash('error_message', 'Sorry! Video could not be deleted at this moment.');
        }
        return redirect()->back();
    }
}
