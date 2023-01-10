<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        //
        $subcategories = Subcategory::orderBy('category_id','ASC')->get();
        return view('admin.package-management.subcategories.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.package-management.subcategories.create',compact('categories'));
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
        $subcategory = new Subcategory();
        $subcategory->title = $data['title'];
        $subcategory->category_id = $data['category_id'];
         $status = $subcategory->save();
         if($status){
             Session()->flash('success_message','Sub Category was successfully added.');
         }else{
             Session()->flash('error_message','Sorry! Sub Category could not be added at this moment.');
         }
         return redirect()->route('admin.package.subcategories.index');
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
        $subcategory = Subcategory::findorfail($id);
        $categories = Category::all();
        return view('admin.package-management.subcategories.edit',compact('subcategory','categories'));
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
        $subcategory = Subcategory::findorfail($id);
        $subcategory->title = $data['title'];
        $subcategory->category_id = $data['category_id'];
         $status = $subcategory->save();
         if($status){
             Session()->flash('success_message','Sub Category was successfully updated.');
         }else{
             Session()->flash('error_message','Sorry! Sub Category could not be updated at this moment.');
         }
         return redirect()->route('admin.package.subcategories.index');
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
        $subcategory = Subcategory::findorfail($id);
        $status = $subcategory->delete();
        if($status)
        {
            Session()->flash('success_message','Sub Category was successfully deleted.');
        }
        else
        {
            Session()->flash('error_message','Sorry! Sub Category could not be deleted at this moment.');
        }
        return redirect()->route('admin.package.subcategories.index');
    }
}
