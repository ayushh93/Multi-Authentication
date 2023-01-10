<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aboutotherdetail;
use App\Models\Category;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\Whoarewe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $gallery = Gallery::latest()->get();
        $trekking = Category::where('id',1)->first();
        $expeditions = Category::where('id',2)->first();
        $otherdetails = Aboutotherdetail::where('id',1)->first();
        $whoarewe = Whoarewe::where('id',1)->first();
        $clients = Client::latest()->get();
        return view('frontend.index',compact('gallery','trekking','expeditions','otherdetails','whoarewe','clients'));
    }
}
