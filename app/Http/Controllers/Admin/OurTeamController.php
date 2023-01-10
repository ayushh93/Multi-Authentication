<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ourteam;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = Ourteam::latest()->get();
        return view('admin.about.our_team.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('admin.about.our_team.create');
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
        $member = new Ourteam();
        $member->name = $data['name'];
        $member->designation = $data['designation'];
        $member->facebook_link = $data['facebook_link'];
        $member->instagram_link = $data['instagram_link'];
        $member->twitter_link = $data['twitter_link'];
         //upload image
         if($request->hasFile('image')) {
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/about/our_team/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         $member->image = $name1;
         $status = $member->save();
         if($status){
             Session()->flash('success_message','Team Member was successfully added.');
         }else{
             Session()->flash('error_message','Sorry! Team Member could not be added at this moment.');
         }
         return redirect()->route('admin.about.ourteam.index');
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
        
        $member = Ourteam::findorfail($id);
        return view('admin.about.our_team.edit',compact('member'));
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
        $member = Ourteam::findorfail($id);
        $member->name = $data['name'];
        $member->designation = $data['designation'];
        $member->facebook_link = $data['facebook_link'];
        $member->instagram_link = $data['instagram_link'];
        $member->twitter_link = $data['twitter_link'];
        $image = $member->image;
         //upload image
         if($request->hasFile('image')) {
            File::delete('uploads/about/our_team/'.$image);
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/about/our_team/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         else
         {
            $name1 = $image;
         }
         $member->image = $name1;
         $status = $member->save();
         if($status){
             Session()->flash('success_message','Team Member was successfully updated.');
         }else{
             Session()->flash('error_message','Sorry! Team Member could not be updated at this moment.');
         }
         return redirect()->route('admin.about.ourteam.index');
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
        $member = Ourteam::findorfail($id);
        $image = $member->image;
        $status = $member->delete();
        if($status)
        {
            File::delete('uploads/about/our_team/'.$image);
            Session()->flash('success_message','Team Member was successfully deleted.');
        }
        else
        {
            Session()->flash('error_message','Sorry! Team Member could not be deleted at this moment.');
        }
        return redirect()->route('admin.about.ourteam.index');
    }
}
