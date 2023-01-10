<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    public function index()
    {
        //
        $documents = Document::latest()->get();
        return view('admin.about.documents.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.about.documents.create');
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
        $document = new Document();
        $document->title = $data['title'];
         //upload image
         if($request->hasFile('image')) {
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/about/documents/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         $document->image = $name1;
         $status = $document->save();
         if($status){
             Session()->flash('success_message','Document was successfully added.');
         }else{
             Session()->flash('error_message','Sorry! Document could not be added at this moment.');
         }
         return redirect()->route('admin.about.documents.index');
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
        $document = Document::findorfail($id);
        return view('admin.about.documents.edit',compact('document'));
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
        $document = Document::findorfail($id);
        $document->title = $data['title'];
        $image = $document->image;
         //upload logo
         if($request->hasFile('image')) {
            File::delete('uploads/about/documents/'.$image);
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1440, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/about/documents/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         else
         {
            $name1 = $image;
         }
         $document->image = $name1;
         $status = $document->save();
         if($status){
             Session()->flash('success_message','Document was successfully updated.');
         }else{
             Session()->flash('error_message','Sorry! Document could not be updated at this moment.');
         }
         return redirect()->route('admin.about.documents.index');
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
        $document = Document::findorfail($id);
        $image = $document->image;
        $status = $document->delete();
        if($status)
        {
            File::delete('uploads/about/documents/'.$image);
            Session()->flash('success_message','Document was successfully deleted.');
        }
        else
        {
            Session()->flash('error_message','Sorry! Document could not be deleted at this moment.');
        }
        return redirect()->route('admin.about.documents.index');
    }
}
