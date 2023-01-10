<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CostDescription;
use App\Models\Costdetail;
use App\Models\Document;
use App\Models\Gallery;
use App\Models\Itinerary;
use App\Models\Messagefromdirector;
use App\Models\Ourteam;
use App\Models\Package;
use App\Models\Privacypolicy;
use App\Models\Review;
use App\Models\Termsandcondition;
use App\Models\Videogallery;
use App\Models\Whoarewe;
use App\Models\Whyus;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /* About pages starts */
    public function whyus()
    {
        $whyus = Whyus::latest()->get();
        return view('frontend.about.whyus',compact('whyus'));
    }
    public function messagefromdirector()
    {
        $message = Messagefromdirector::where('id',1)->first();
        return view('frontend.about.message-from-director',compact('message'));
    }
    public function whoarewe()
    {
        $whoarewe = Whoarewe::where('id',1)->first();
        return view('frontend.about.whoarewe',compact('whoarewe'));
    }
    public function documents()
    {
        $documents = Document::latest()->get();
        return view('frontend.about.document',compact('documents'));
    }
    public function ourteam()
    {
        $ourteam = Ourteam::latest()->get();
        return view('frontend.about.our-team',compact('ourteam'));
    }
    public function reviews()
    {
        $reviews = Review::latest()->get();
        return view('frontend.about.review',compact('reviews'));
    }
    /* About pages ends */

    public function blogs()
    {
        $blogs = Blog::latest()->get();
        return view('frontend.blogs',compact('blogs'));
    }
    public function blogsingle($slug)
    {
        $blog = Blog::where('slug',$slug)->first();
        $blogs = Blog::orderBy('date','DESC')->paginate(5);
        return view('frontend.blog-single',compact('blog','blogs'));
    }
    public function gallery()
    {
        $gallery = Gallery::latest()->get();
        return view('frontend.gallery',compact('gallery'));
    }
    public function videogallery()
    {
        $videogallery = Videogallery::latest()->get();
        return view('frontend.video-gallery',compact('videogallery'));
    }
    public function packagesingle($id)
    {
        $package = Package::findorfail($id);
        $itinerary = Itinerary::where('package_id',$package->id)->orderBy('day','ASC')->get();
        $costdescription = CostDescription::where('package_id',$package->id)->first();
        $costdetails = Costdetail::where('package_id',$package->id)->orderBy('from','ASC')->get();
        return view('frontend.package-single',compact('package','itinerary','costdescription','costdetails'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function privacypolicy()
    {
        $data = Privacypolicy::latest()->get();
        return view('frontend.privacy-policy',compact('data'));
    }
    public function termsandcondition()
    {
        $data = Termsandcondition::latest()->get();
        return view('frontend.terms-and-condition',compact('data'));
    }
}
