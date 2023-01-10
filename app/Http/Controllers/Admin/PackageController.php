<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CostDescription;
use App\Models\Costdetail;
use App\Models\Itinerary;
use App\Models\Package;
use App\Models\Packagegallery;
use App\Models\Recommendedgears;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $packages = Package::orderBy('subcategory_id', 'ASC')->get();
        return view('admin.package-management.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('title', 'ASC')->get();
        return view('admin.package-management.package.create', compact('categories'));
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
            'subcategory_id' => 'required',
            'duration' => 'required | max:191',
            'elevation' => 'required | max:191',
            'group_size' => 'required | max:191',
            'description' => 'required',
            'image1' => 'required',
            'map' => 'required',
        ]);
        $package = new Package();
        $package->subcategory_id = $data['subcategory_id'];
        //upload image1
        if ($request->hasFile('image1')) {
            $image1             = $request->file('image1');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/package/images/';
            $ImageUpload1->save($destinationPath . $name1);
            $package->image = $name1;
        }
        //upload image2
        if ($request->hasFile('map')) {
            $map             = $request->file('map');
            $ImageUpload1        = Image::make($map)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name2 = $map->getClientOriginalName();
            $destinationPath    = 'uploads/package/maps/';
            $ImageUpload1->save($destinationPath . $name2);
            $package->map = $name2;
        }
        $package->title = $data['title'];
        $package->duration = $data['duration'];
        $package->season = $data['season'];
        $package->accomodation = $data['accomodation'];
        $package->difficulty = $data['difficulty'];
        $package->elevation = $data['elevation'];
        $package->group_size = $data['group_size'];
        $package->description = $data['description'];
        $status = $package->save();
        if ($status) {
            // Initializing recommended gears table for this package
            $gear = new Recommendedgears();
            $gear->package_id = $package->id;
            $gear->save();
            // Initializing recommended gears table for this package
            $cost = new CostDescription();
            $cost->package_id = $package->id;
            $cost->save();
            Session()->flash('success_message', 'Package was successfully added.');
        } else {
            Session()->flash('error_message', 'Sorry! Package could not be added at this moment.');
        }
        return redirect()->route('admin.package.packages.index');
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
        $categories = Category::orderBy('title', 'ASC')->get();
        $package = Package::findorfail($id);
        return view('admin.package-management.package.edit', compact('package', 'categories'));
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
            'subcategory_id' => 'required',
            'duration' => 'required | max:191',
            'elevation' => 'required | max:191',
            'group_size' => 'required | max:191',
            'description' => 'required'
        ]);
        $package = Package::findorfail($id);
        $imagea = $package->image;
        $imageb = $package->map;
        $package->subcategory_id = $data['subcategory_id'];
        //upload image1
        if ($request->hasFile('image1')) {
            File::delete('uploads/package/images/' . $imagea);
            $image1             = $request->file('image1');
            $ImageUpload1        = Image::make($image1)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name1 = $image1->getClientOriginalName();
            $destinationPath    = 'uploads/package/images/';
            $ImageUpload1->save($destinationPath . $name1);
            $package->image = $name1;
        } else {
            $name1 = $imagea;
        }
        //upload image2
        if ($request->hasFile('map')) {
            File::delete('uploads/package/maps/' . $imageb);
            $map             = $request->file('map');
            $ImageUpload1        = Image::make($map)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name2 = $map->getClientOriginalName();
            $destinationPath    = 'uploads/package/maps/';
            $ImageUpload1->save($destinationPath . $name2);
            $package->map = $name2;
        } else {
            $name2 = $imageb;
        }
        $package->title = $data['title'];
        $package->duration = $data['duration'];
        $package->season = $data['season'];
        $package->accomodation = $data['accomodation'];
        $package->difficulty = $data['difficulty'];
        $package->elevation = $data['elevation'];
        $package->group_size = $data['group_size'];
        $package->description = $data['description'];
        $status = $package->save();
        if ($status) {
            Session()->flash('success_message', 'Package was successfully updated.');
        } else {
            Session()->flash('error_message', 'Sorry! Package could not be updated at this moment.');
        }
        return redirect()->route('admin.package.packages.index');
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
        $package =  Package::findorfail($id);
        $imagea = $package->image;
        $imageb = $package->map;
        //checking if package has gallery
        if ($package->gallery) {
            $gallery = $package->gallery;
            foreach($gallery as $item)
            {
                $images[] = $item->image;
                foreach ($images as $item) {
                    File::delete('uploads/package/gallery/' . $item);
                }
            }
        }
        $status = $package->delete();
        if ($status) {
            File::delete('uploads/package/images/' . $imagea);
            File::delete('uploads/package/maps/' . $imageb);
            Session()->flash('success_message', 'Package was successfully deleted.');
        } else {
            Session()->flash('error_message', 'Sorry! Package could not be deleted at this moment.');
        }
        return redirect()->route('admin.package.packages.index');
    }

    public function addGallery($id)
    {
        $images = Packagegallery::where('package_id', $id)->get();
        $package = Package::findorfail($id);
        return view('admin.package-management.package.gallery', compact('images', 'package'));
    }

    public function storeGallery(Request $request)
    {
        $data = $request->all();
        //upload product images
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $gallery = new Packagegallery();
                $ImageUpload    = Image::make($image)->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $name = $image->getClientOriginalName();
                $destinationPath    = 'uploads/package/gallery/';
                $ImageUpload->save($destinationPath . $name);
                $gallery->image = $name;
                $gallery->package_id = $data['package_id'];
                $gallery->save();
            }
        }
        Session()->flash('success_message', 'Images Has Been Added Successfully To The Gallery');
        return redirect()->back();
    }

    public function deleteGallery($id)
    {
        $gallery = Packagegallery::findorfail($id);
        $image = $gallery->image;
        $status = $gallery->delete();
        if ($status) {
            File::delete('uploads/package/gallery/' . $image);
            Session()->flash('success_message', 'Package Gallery was successfully deleted.');
        } else {
            Session()->flash('error_message', 'Sorry! Package Gallery could not be deleted at this moment.');
        }
        return redirect()->back();
    }

    public function recommendedGears($id)
    {
        $package = Package::findorfail($id);
        $gear = Recommendedgears::where('package_id', $id)->first();
        return view('admin.package-management.package.recommended-gears', compact('package', 'gear'));
    }

    public function updaterecommendedGears(Request $request, $id)
    {
        $gear = Recommendedgears::findorfail($id);
        $gear->gearlist = $request->gearlist;
        $gear->package_id = $request->package_id;
        $status = $gear->save();
        if ($status) {
            Session()->flash('success_message', 'Recommended gears was successfully updated.');
        } else {
            Session()->flash('error_message', 'Sorry! Recommended gears could not be updated at this moment.');
        }
        return redirect()->back();
    }

    public function itinerary($id)
    {
        $package = Package::findorfail($id);
        $itinerary = Itinerary::where('package_id',$id)->orderBy('day','ASC')->get();
        return view('admin.package-management.package.itinerary', compact('package','itinerary'));
    }
    public function storeitinerary(Request $request)
    {
        $data = $request->all();
        foreach ($data['day'] as $key => $val)
        {
            $itinerary = new Itinerary();
            $itinerary->package_id = $data['package_id'];
            $itinerary->day = $val;
            $itinerary->excerpt = $data['excerpt'][$key];
            $status = $itinerary->save();
        }
        if($status){
            Session()->flash('success_message','Itinerary was successfully added.');
        }else{
            Session()->flash('error_message','Sorry! Itinerary could not be added at this moment.');
        }
        return redirect()->back();
    }
    public function updateitinerary(Request $request, $id)
    {
        $data = $request->all();
        $itinerary = Itinerary::findorfail($id);
        $itinerary->day = $data['day'];
        $itinerary->excerpt = $data['excerpt'];
        $status = $itinerary->save();
        if($status){
            Session()->flash('success_message','Itinerary was successfully updated.');
        }else{
            Session()->flash('error_message','Sorry! Itinerary could not be updated at this moment.');
        }
        return redirect()->back();
    }
    public function deleteitinerary ($id)
    {
        $itinerary = Itinerary::findorfail($id);
        $status = $itinerary->delete();
        if($status){
            Session()->flash('success_message','Itinerary was successfully deleted.');
        }else{
            Session()->flash('error_message','Sorry! Itinerary could not be deleted at this moment.');
        }
        return redirect()->back();
    }
    public function costdetail($id)
    {
        $package = Package::findorfail($id);
        $costdetails = Costdetail::where('package_id',$id)->orderBy('from','ASC')->get();
        return view('admin.package-management.package.cost-detail', compact('package','costdetails'));
    }
    public function storecostdetail(Request $request)
    {
        $data = $request->all();
        foreach ($data['from'] as $key => $val)
        {
            $costdetail = new Costdetail();
            $costdetail->package_id = $data['package_id'];
            $costdetail->from = $val;
            $costdetail->to = $data['to'][$key];
            $costdetail->cost = $data['cost'][$key];
            $status = $costdetail->save();
        }
        if($status){
            Session()->flash('success_message','Cost Detail was successfully added.');
        }else{
            Session()->flash('error_message','Sorry! Cost Detail could not be added at this moment.');
        }
        return redirect()->back();
    }
    public function updatecostdetail(Request $request, $id)
    {
        $data = $request->all();
        $costdetail = Costdetail::findorfail($id);
        $costdetail->from = $data['from'];
        $costdetail->to = $data['to'];
        $costdetail->cost = $data['cost'];
        $status = $costdetail->save();
        if($status){
            Session()->flash('success_message','Cost Detail was successfully updated.');
        }else{
            Session()->flash('error_message','Sorry! Cost Detail could not be updated at this moment.');
        }
        return redirect()->back();
    }
    public function deletecostdetail ($id)
    {
        $costdetail = Costdetail::findorfail($id);
        $status = $costdetail->delete();
        if($status){
            Session()->flash('success_message','Cost Detail was successfully deleted.');
        }else{
            Session()->flash('error_message','Sorry! Cost Detail could not be deleted at this moment.');
        }
        return redirect()->back();
    }

    public function costdescription($id)
    {
        $package = Package::findorfail($id);
        $cost = CostDescription::where('package_id', $id)->first();
        return view('admin.package-management.package.cost-description', compact('package', 'cost'));
    }

    public function updatecostdescription(Request $request, $id)
    {
        $cost = CostDescription::findorfail($id);
        $cost->includes = $request->includes;
        $cost->excludes = $request->excludes;
        $cost->package_id = $request->package_id;
        $status = $cost->save();
        if ($status) {
            Session()->flash('success_message', 'Cost Description was successfully updated.');
        } else {
            Session()->flash('error_message', 'Sorry! Cost Description could not be updated at this moment.');
        }
        return redirect()->back();
    }


}
