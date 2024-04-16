<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SchoolSubjectController extends Controller
{
    public function ViewSubject(){
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject', $data);
    }

    public function AddSubject(){
        return view('backend.setup.school_subject.add_school_subject');
    }

    public function StoreSubject(request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects,name',
        ]);
        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('school.subject.view')->with($notification);
    }

    public function EditSubject($id){
        $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject',compact('editData'));
    
    }

    public function UpdateSubject(request $request, $id){
        $data = SchoolSubject::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects,name,'.$data->id
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subejct Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('school.subject.view')->with($notification);
    }

    public function DeleteSubject($id){
        $user = SchoolSubject::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Subject Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('school.subject.view')->with($notification);
    }
}
