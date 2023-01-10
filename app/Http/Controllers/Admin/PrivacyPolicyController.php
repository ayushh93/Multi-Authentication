<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Privacypolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        //
        $data = Privacypolicy::latest()->get();
        return view('admin.privacy-policy.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.privacy-policy.create');

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
        $privacy = new Privacypolicy();
        $privacy->title = $data['title'];
        $privacy->excerpt = $data['excerpt'];
         $status = $privacy->save();
         if($status){
             Session()->flash('success_message','Privacy Policy was successfully added.');
         }else{
             Session()->flash('error_message','Sorry! Privacy Policy could not be added at this moment.');
         }
         return redirect()->route('admin.privacypolicy.index');
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
        $privacy = Privacypolicy::findorfail($id);
        return view('admin.privacy-policy.edit',compact('privacy'));
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
        $privacy = Privacypolicy::findorfail($id);
        $privacy->title = $data['title'];
        $privacy->excerpt = $data['excerpt'];
         $status = $privacy->save();
         if($status){
             Session()->flash('success_message','Privacy Policy was successfully updated.');
         }else{
             Session()->flash('error_message','Sorry! Privacy Policy could not be updated at this moment.');
         }
         return redirect()->route('admin.privacypolicy.index');
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
        $privacy = Privacypolicy::findorfail($id);
        $status = $privacy->delete();
        if($status)
        {
            Session()->flash('success_message','Privacy Policy was successfully deleted.');
        }
        else
        {
            Session()->flash('error_message','Sorry! Privacy Policy could not be deleted at this moment.');
        }
        return redirect()->route('admin.privacypolicy.index');
    }
}
