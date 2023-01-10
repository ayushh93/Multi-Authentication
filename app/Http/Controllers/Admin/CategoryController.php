<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function index()
    {
        //
        $categories = Category::latest()->get();
        return view('admin.package-management.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.package-management.categories.create');
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
        $category = new Category();
        $category->title = $data['title'];
        if (empty($data['featured'])) {
            $category->featured = 0;
        } else {
            $category->featured = 1;
        }
         $status = $category->save();
         if($status){
             Session()->flash('success_message','Category was successfully added.');
         }else{
             Session()->flash('error_message','Sorry! Category could not be added at this moment.');
         }
         return redirect()->route('admin.package.categories.index');
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
        $category = Category::findorfail($id);
        return view('admin.package-management.categories.edit',compact('category'));
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
        $category = Category::findorfail($id);
        $category->title = $data['title'];
        if (empty($data['featured'])) {
            $category->featured = 0;
        } else {
            $category->featured = 1;
        }
         $status = $category->save();
         if($status){
             Session()->flash('success_message','Category was successfully updated.');
         }else{
             Session()->flash('error_message','Sorry! Category could not be updated at this moment.');
         }
         return redirect()->route('admin.package.categories.index');
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
        $category = Category::findorfail($id);
        $status = $category->delete();
        if($status)
        {
            Session()->flash('success_message','Category was successfully deleted.');
        }
        else
        {
            Session()->flash('error_message','Sorry! Category could not be deleted at this moment.');
        }
        return redirect()->route('admin.package.categories.index');
    }
}
