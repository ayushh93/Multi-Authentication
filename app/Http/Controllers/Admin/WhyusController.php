<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Whyus;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class WhyusController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $whyus = Whyus::latest()->get();
        return view('admin.about.whyus.index',compact('whyus'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.about.whyus.create');
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
        $validated = $request->validate([
            'title' => 'required',
            'excerpt' => 'required | max:200 ',
        ]);
        $whyus = new Whyus();
        $whyus->title = $data['title'];
        $whyus->excerpt = $data['excerpt'];
         //upload image
         if($request->hasFile('image')) {
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/about/whyus/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         $whyus->image = $name1;
         $status = $whyus->save();
         if($status){
             Session()->flash('success_message','Why us was successfully added.');
         }else{
             Session()->flash('error_message','Sorry! Why us could not be added at this moment.');
         }
         return redirect()->route('admin.about.whyus.index');
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
        $whyus = Whyus::findorfail($id);
        return view('admin.about.whyus.edit',compact('whyus'));
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
        $validated = $request->validate([
            'title' => 'required',
            'excerpt' => 'required | max:200 ',
        ]);
        $whyus = Whyus::findorfail($id);
        $whyus->title = $data['title'];
        $whyus->excerpt = $data['excerpt'];
        $image = $whyus->image;
         //upload logo
         if($request->hasFile('image')) {
            File::delete('uploads/about/whyus/'.$image);
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/about/whyus/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         else
         {
            $name1 = $image;
         }
         $whyus->image = $name1;
         $status = $whyus->save();
         if($status){
             Session()->flash('success_message','Why us was successfully updated.');
         }else{
             Session()->flash('error_message','Sorry! Why us could not be updated at this moment.');
         }
         return redirect()->route('admin.about.whyus.index');
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
        $whyus = Whyus::findorfail($id);
        $image = $whyus->image;
        $status = $whyus->delete();
        if($status)
        {
            File::delete('uploads/about/whyus/'.$image);
            Session()->flash('success_message','Why us was successfully deleted.');
        }
        else
        {
            Session()->flash('error_message','Sorry! Why us could not be deleted at this moment.');
        }
        return redirect()->route('admin.about.whyus.index');
    }
}
