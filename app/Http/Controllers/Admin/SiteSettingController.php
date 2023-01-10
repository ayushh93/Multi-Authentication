<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function index()
    {
        $site = SiteSetting::where('id',1)->first();
        return view('admin.site_settings.index',compact('site'));
    }
    public function edit($id)
    {
        $site = SiteSetting::findorfail($id);
        return view('admin.site_settings.edit',compact('site'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $site = SiteSetting::findorfail($id);
        $logo = $site->logo;
        $favicon = $site->favicon;
        //upload logo
        if($request->hasFile('logo')) {
            File::delete('uploads/logo/'.$logo);
            $image1             = $request->file('logo');
            $ImageUpload1        = Image::make($image1)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/logo/';
            $ImageUpload1->save($destinationPath.$name1);
        }else{
            $name1 = $logo;
        }
        //upload favicon
        if($request->hasFile('favicon')) {
            File::delete('uploads/logo/'.$favicon);
            $image2             = $request->file('favicon');
            $ImageUpload2        = Image::make($image2)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name2 = $image2->getClientOriginalName();
            $destinationPath    = 'uploads/logo/';
            $ImageUpload2->save($destinationPath.$name2);
        }else{
            $name2 = $favicon;
        }
        $site->title = $data['title'];
        $site->logo = $name1;
        $site->favicon = $name2;
        $status = $site->save();
        if($status){
            Session()->flash('success_message','Site Setting was successfully updated.');
        }else{
            Session()->flash('error_message','Sorry! Site Setting could not be updated at this moment.');
        }
        return redirect()->route('admin.site.index');
    }
}
