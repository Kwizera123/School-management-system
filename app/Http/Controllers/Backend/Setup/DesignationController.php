<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DesignationSubject;

class DesignationController extends Controller
{
    public function ViewDesignation(){
        $data['allData'] = DesignationSubject::all();
        return view('backend.setup.designation.view_designation', $data);
    }

    public function AddDesignation(){
        return view('backend.setup.designation.add_designation');
    }

    public function StoreDesignation(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:designation_subjects,name',
        ]);
        $data = new DesignationSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function EditDesignation($id){
        $editData = DesignationSubject::find($id);
        return view('backend.setup.designation.edit_designation',compact('editData'));
    
    }

    public function UpdateDesignation(request $request, $id){
        $data = DesignationSubject::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:designation_subjects,name,'.$data->id
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function DeleteDesignation($id){
        $user = DesignationSubject::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Designation Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('designation.view')->with($notification);
    }
}
