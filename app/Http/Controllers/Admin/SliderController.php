<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        //
        $sliders = Slider::latest()->get();
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.sliders.create');
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
        $slider = new Slider();
        $slider->title = $data['title'];
        $slider->excerpt = $data['excerpt'];
         //upload image
         if($request->hasFile('image')) {
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $ext1 = $image1->getClientOriginalExtension();
            $name1               = time().'.'. $ext1;
            $destinationPath    = 'uploads/slider/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         $slider->image = $name1;
         $status = $slider->save();
         if($status){
             Session()->flash('success_message','Slider was successfully added.');
         }else{
             Session()->flash('error_message','Sorry! Slider could not be added at this moment.');
         }
         return redirect()->route('admin.sliders.index');
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
        $slider = Slider::findorfail($id);
        return view('admin.sliders.edit',compact('slider'));
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
        $slider = Slider::findorfail($id);
        $slider->title = $data['title'];
        $slider->excerpt = $data['excerpt'];
        $image = $slider->image;
         //upload logo
         if($request->hasFile('image')) {
            File::delete('uploads/slider/'.$image);
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $ext1 = $image1->getClientOriginalExtension();
            $name1               = time().'.'. $ext1;
            $destinationPath    = 'uploads/slider/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         else
         {
            $name1 = $image;
         }
         $slider->image = $name1;
         $status = $slider->save();
         if($status){
             Session()->flash('success_message','Slider was successfully updated.');
         }else{
             Session()->flash('error_message','Sorry! Slider could not be updated at this moment.');
         }
         return redirect()->route('admin.sliders.index');
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
        $slider = Slider::findorfail($id);
        $image = $slider->image;
        $status = $slider->delete();
        if($status)
        {
            File::delete('uploads/slider/'.$image);
            Session()->flash('success_message','Slider was successfully deleted.');
        }
        else
        {
            Session()->flash('error_message','Sorry! Slider could not be deleted at this moment.');
        }
        return redirect()->route('admin.sliders.index');
    }
}
