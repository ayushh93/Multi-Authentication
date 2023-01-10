<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class ReviewController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('admin.about.review.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.review.create');
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
            'name' => 'required | max:191',
            'excerpt' => 'required',
            'image' => 'required',
            
        ]);
         //upload image1
         if($request->hasFile('image')) {
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $ext1 = $image1->getClientOriginalExtension();
            $name1               = time().'.'. $ext1;
            $destinationPath    = 'uploads/about/reviews/';
            $ImageUpload1->save($destinationPath.$name1);
         }
        $review = new Review();
        $review->name = $data['name'];
        $review->image = $name1;
        $review->excerpt = $data['excerpt'];
        $status = $review->save();
        if($status){
            Session()->flash('success_message','Review was successfully added.');
        }else{
            Session()->flash('error_message','Sorry! Review could not be added at this moment.');
        }
        return redirect()->route('admin.about.reviews.index');
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
        $review = Review::findorfail($id);
        return view('admin.about.review.edit',compact('review'));
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
            'name' => 'required | max:191',
            'excerpt' => 'required',
        ]);
        $review =  Review::findorfail($id);
        $imagea = $review->image;
         //upload image1
         if($request->hasFile('image')) {
            File::delete('uploads/about/reviews/'.$imagea);
            $image1             = $request->file('image');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/about/reviews/';
            $ImageUpload1->save($destinationPath.$name1);
         }
         else{
            $name1 = $imagea;
         }
         $review->name = $data['name'];
        $review->image = $name1;
        $review->excerpt = $data['excerpt'];
        $status = $review->save();
        if($status){
            Session()->flash('success_message','Review was successfully updated.');
        }else{
            Session()->flash('error_message','Sorry! Review could not be updated at this moment.');
        }
        return redirect()->route('admin.about.reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review =  Review::findorfail($id);
        $imagea = $review->image;
        $status = $review->delete();
        if($status)
        {
            File::delete('uploads/about/reviews/'.$imagea);
            Session()->flash('success_message','Review was successfully deleted.');
        }
        else
        {
            Session()->flash('error_message','Sorry! Review could not be deleted at this moment.');
        }
        return redirect()->route('admin.about.reviews.index');
    }
}
