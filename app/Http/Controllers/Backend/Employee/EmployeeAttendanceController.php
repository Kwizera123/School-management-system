<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use DB;
use PDF;

use App\Models\DesignationSubject;
use App\Models\EmployeeSallaryLog;

use App\Models\LeavePurpose;
use App\Models\EmployeeLeave;
use App\Models\EmployeeAttendance;


class EmployeeAttendanceController extends Controller
{
    public function AttendanceView(){
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->get();
        //$data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','DESC')->get(); <!-- doesn't work with my viresion of Mamp serve . it works in xampp-->
        //$data['allData'] = EmployeeAttendance::orderBy('id','DESC')->get();
        return view('backend.employee.employee_attendance.employee_attendace_view',$data);
    }

    public function AttendanceAdd(){
        $data['employees'] = User::where('usertype','employee')->get();
        return view('backend.employee.employee_attendance.employee_attendace_add',$data);
    }

    public function AttendanceStore(Request $request){

        EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
        $countemployee = count($request->employee_id);
        for($i=0; $i < $countemployee ; $i++){
            $attend_status = 'attend_status'.$i;
            $attend = new EmployeeAttendance();
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        }//End For Loop

        $notification = array(
            'message' => 'Employee Attendance Data updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.attendance.view')->with($notification);

    }//End Method

    public function AttendanceEdit($date){
        $data['editData'] = EmployeeAttendance::where('date',$date)->get();
        $data['employees'] = User::where('usertype','employee')->get();
        return view('backend.employee.employee_attendance.employee_attendace_edit',$data);
    }

    public function AttendanceDetails($date){
        $data['details'] = EmployeeAttendance::where('date',$date)->get();
        return view('backend.employee.employee_attendance.employee_attendace_details',$data);
    }
}
