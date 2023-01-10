<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aboutotherdetail;
use Illuminate\Http\Request;

class AboutOtherDetailController extends Controller
{
    public function index()
    {
        $other = Aboutotherdetail::where('id',1)->first();
        return view('admin.about.otherdetails.index',compact('other'));
    }
    public function edit($id)
    {
        $other = Aboutotherdetail::findorfail($id);
        return view('admin.about.otherdetails.edit',compact('other'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $other = Aboutotherdetail::findorfail($id);
        $other->title1 = $data['title1'];
        $other->value1 = $data['value1'];
        $other->title2 = $data['title2'];
        $other->value2 = $data['value2'];
        $other->title3 = $data['title3'];
        $other->value3 = $data['value3'];
        $status = $other->save();
         if($status){
            Session()->flash('success_message','Other Details was successfully updated.');
        }else{
            Session()->flash('error_message','Sorry! Other Details could not be updated at this moment.');
        }
        return redirect()->route('admin.about.otherdetails.index');
    }
}
