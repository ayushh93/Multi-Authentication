<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('title','ASC')->get();
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validated = $request->validate([
            'title' => 'required | max:191',
            'author' => 'required | max:191',
            'date' => 'required | date',
            'image1' => 'required',
            'blog' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);
        $blog = new Blog();

         //upload image1
         if($request->hasFile('image1')) {
            $image1             = $request->file('image1');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/blogs/';
            $ImageUpload1->save($destinationPath.$name1);
           $blog->image1 = $name1;

         }
            //upload image2
            if($request->hasFile('image2')) {
                $image2             = $request->file('image2');
                $ImageUpload1        = Image::make($image2)->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $name2 = $image2->getClientOriginalName();
                $destinationPath    = 'uploads/blogs/';
                $ImageUpload1->save($destinationPath.$name2);
                $blog->image2 = $name2;
             }
        $blog->title = $data['title'];
        $blog->author = $data['author'];
        $blog->slug = Str::slug($data['title']);
        $blog->date = $data['date'];
        $blog->blog = $data['blog'];
        $blog->meta_keyword = $data['meta_keyword'];
        $blog->meta_description = $data['meta_description'];
        $blog->blog_url = $data['blog_url'];
        $blog->blog_description = $data['blog_description'];
        $blog->twitter_url = $data['twitter_url'];
        $blog->twitter_description = $data['twitter_description'];
        $status = $blog->save();
        if($status){
            Session()->flash('success_message','Blog was successfully added.');
        }else{
            Session()->flash('error_message','Sorry! Blog could not be added at this moment.');
        }
        return redirect()->route('admin.blogs.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findorfail($id);
        return view('admin.blogs.show',compact('blog'));
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
        $blog = Blog::findorfail($id);
        return view('admin.blogs.edit',compact('blog'));
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
        $data = $request->all();
        $validated = $request->validate([
            'title' => 'required | max:191',
            'author' => 'required | max:191',
            'date' => 'required | date',
            'blog' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);
        $blog =  Blog::findorfail($id);
        $imagea = $blog->image1;
        $imageb = $blog->image2;
         //upload image1
         if($request->hasFile('image1')) {
            File::delete('uploads/blogs/'.$imagea);
            $image1             = $request->file('image1');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/blogs/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         else{
            $name1 = $imagea;
         }
            //upload image2
            if($request->hasFile('image2')) {
                File::delete('uploads/blogs/'.$imageb);
                $image2             = $request->file('image2');
                $ImageUpload1        = Image::make($image2)->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $name2 = $image2->getClientOriginalName();
                $destinationPath    = 'uploads/blogs/';
                $ImageUpload1->save($destinationPath.$name2);
             }
             else
             {
                $name2 = $imageb;
             }
        $blog->title = $data['title'];
        $blog->author = $data['author'];
        $blog->slug = Str::slug($data['title']);
        $blog->date = $data['date'];
        $blog->image1 = $name1;
        $blog->blog = $data['blog'];
        $blog->image2 = $name2;
        $blog->meta_keyword = $data['meta_keyword'];
        $blog->meta_description = $data['meta_description'];
        $blog->blog_url = $data['blog_url'];
        $blog->blog_description = $data['blog_description'];
        $blog->twitter_url = $data['twitter_url'];
        $blog->twitter_description = $data['twitter_description'];
        $status = $blog->save();
        if($status){
            Session()->flash('success_message','Blog was successfully updated.');
        }else{
            Session()->flash('error_message','Sorry! Blog could not be updated at this moment.');
        }
        return redirect()->route('admin.blogs.index');
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
        $blog =  Blog::findorfail($id);
        $imagea = $blog->image1;
        $imageb = $blog->image2;
        $status = $blog->delete();
        if($status)
        {
            File::delete('uploads/blogs/'.$imagea);
            File::delete('uploads/blogs/'.$imageb);
            Session()->flash('success_message','Blog was successfully deleted.');
        }
        else
        {
            Session()->flash('error_message','Sorry! Blog could not be deleted at this moment.');
        }
        return redirect()->route('admin.blogs.index');

    }
}
