<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class RegionController extends Controller
{
    public function index()
    {
        //
        $regions = Region::latest()->get();
        return view('admin.regions.index',compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.regions.create');
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
        $region = new Region();
        $region->title = $data['title'];
        $region->excerpt = $data['excerpt'];
         //upload image
         if($request->hasFile('image')) {
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $ext1 = $image1->getClientOriginalExtension();
            $name1               = time().'.'. $ext1;
            $destinationPath    = 'uploads/region/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         $region->image = $name1;
         $status = $region->save();
         if($status){
             Session()->flash('success_message','region was successfully added.');
         }else{
             Session()->flash('error_message','Sorry! region could not be added at this moment.');
         }
         return redirect()->route('admin.regions.index');
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
        $region = Region::findorfail($id);
        return view('admin.regions.edit',compact('region'));
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
        $region = Region::findorfail($id);
        $region->title = $data['title'];
        $region->excerpt = $data['excerpt'];
        $image = $region->image;
         //upload logo
         if($request->hasFile('image')) {
            File::delete('uploads/region/'.$image);
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $ext1 = $image1->getClientOriginalExtension();
            $name1               = time().'.'. $ext1;
            $destinationPath    = 'uploads/region/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         else
         {
            $name1 = $image;
         }
         $region->image = $name1;
         $status = $region->save();
         if($status){
             Session()->flash('success_message','Region was successfully updated.');
         }else{
             Session()->flash('error_message','Sorry! Region could not be updated at this moment.');
         }
         return redirect()->route('admin.regions.index');
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
        $region = Region::findorfail($id);
        $image = $region->image;
        $status = $region->delete();
        if($status)
        {
            File::delete('uploads/region/'.$image);
            Session()->flash('success_message','Region was successfully deleted.');
        }
        else
        {
            Session()->flash('error_message','Sorry! Region could not be deleted at this moment.');
        }
        return redirect()->route('admin.regions.index');
    }
}
