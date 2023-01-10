<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Termsandcondition;
use Illuminate\Http\Request;

class TermsandConditionController extends Controller
{
    public function index()
    {
        //
        $data = Termsandcondition::latest()->get();
        return view('admin.terms-and-condition.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.terms-and-condition.create');

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
        $term = new Termsandcondition();
        $term->title = $data['title'];
        $term->excerpt = $data['excerpt'];
         $status = $term->save();
         if($status){
             Session()->flash('success_message','Terms and Conditions was successfully added.');
         }else{
             Session()->flash('error_message','Sorry! Terms and Conditions could not be added at this moment.');
         }
         return redirect()->route('admin.termsandcondition.index');
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
        $term = Termsandcondition::findorfail($id);
        return view('admin.terms-and-condition.edit',compact('term'));
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
        $term = Termsandcondition::findorfail($id);
        $term->title = $data['title'];
        $term->excerpt = $data['excerpt'];
         $status = $term->save();
         if($status){
             Session()->flash('success_message','Terms and Conditions was successfully updated.');
         }else{
             Session()->flash('error_message','Sorry! Terms and Conditions could not be updated at this moment.');
         }
         return redirect()->route('admin.termsandcondition.index');
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
        $term = Termsandcondition::findorfail($id);
        $status = $term->delete();
        if($status)
        {
            Session()->flash('success_message','Terms and Conditions was successfully deleted.');
        }
        else
        {
            Session()->flash('error_message','Sorry! Terms and Conditions could not be deleted at this moment.');
        }
        return redirect()->route('admin.termsandcondition.index');
    }
}
