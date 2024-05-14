<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController; 
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentClassYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\feeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;

use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\ExamFeeController;

use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\Employee\MonthlySalaryController;

use App\Http\Controllers\Backend\Marks\MarksController;
use App\Http\Controllers\Backend\Marks\GradeController;

use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\account\StudentFeeController;
use App\Http\Controllers\Backend\account\AccountSalaryController;



/*
|--------------------------------------------------------------------------
| Web Routes 
|-------------------------------------------------------------------------- 
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => 'auth'],function(){
     


//User management All routes


Route::prefix('users')->group(function () {

    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');

});

// User Profile and change password

Route::prefix('profile')->group(function () {

    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
   
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');

});

// User Profile and change password

Route::prefix('setups')->group(function () {

    // Student Class Routes
    Route::get('student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');

    Route::get('student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');

    Route::post('student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('store.student.class');

    Route::get('student/class/edit{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');

    Route::post('student/class/update{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');
   
    Route::get('student/class/delete{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');
    
     // Student year Routes
     Route::get('student/year/view', [StudentClassYearController::class, 'ViewYear'])->name('student.year.view');
     Route::get('student/year/add', [StudentClassYearController::class, 'StudentYearAdd'])->name('student.year.add');
     Route::post('student/year/store', [StudentClassYearController::class, 'StudentYearStore'])->name('store.student.year');
     Route::get('student/year/edit{id}', [StudentClassYearController::class, 'StudentYearEdit'])->name('student.year.edit');
     Route::post('student/year/update{id}', [StudentClassYearController::class, 'StudentYearUpdate'])->name('update.student.year');
     Route::get('student/year/delete{id}', [StudentClassYearController::class, 'StudentYearDelete'])->name('student.year.delete');

      // Student Group Routes
      Route::get('student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
      Route::get('student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])->name('student.group.add');
      Route::post('student/group/store', [StudentGroupController::class, 'StudentGroupStore'])->name('store.student.group');
      Route::get('student/group/edit{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
      Route::post('student/group/update{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('update.student.group');
      Route::get('student/group/delete{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');

      // Student Shift Routes
      Route::get('student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');
      Route::get('student/shift/add', [StudentShiftController::class, 'StudentShiftAdd'])->name('student.shift.add');
      Route::post('student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])->name('store.student.shift');
      Route::get('student/shift/edit{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
      Route::post('student/shift/update{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('update.student.shift');
      Route::get('student/shift/delete{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');

      // Fee Category Routes
      Route::get('fee/category/view', [feeCategoryController::class, 'ViewFeeCat'])->name('fee.category.view');
      Route::get('fee/category/add', [feeCategoryController::class, 'FeeCatAdd'])->name('fee.category.add');
      Route::post('fee/category/store', [feeCategoryController::class, 'FeeCatStore'])->name('store.fee.category');
      Route::get('fee/category/edit{id}', [feeCategoryController::class, 'FeeCatEdit'])->name('fee.category.edit');
      Route::post('fee/category/update{id}', [feeCategoryController::class, 'FeeCatUpdate'])->name('update.fee.category');
      Route::get('fee/category/delete{id}', [feeCategoryController::class, 'FeeCategoryDelete'])->name('fee.category.delete');

    // Fee Category Amount Routes
      Route::get('fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
      Route::get('fee/amount/add', [FeeAmountController::class, 'AddFeeAmount'])->name('fee.amount.add');
      Route::post('fee/amount/store', [FeeAmountController::class, 'StoreFeeAmount'])->name('store.fee.amount');
      Route::get('fee/amount/edit{fee_category_id}', [FeeAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');
      Route::post('fee/amount/update{fee_category_id}', [FeeAmountController::class, 'UpdateFeeAmount'])->name('update.fee.amount');
      Route::get('fee/amount/details{fee_category_id}', [FeeAmountController::class, 'DetailsFeeAmount'])->name('fee.category.details');
      Route::get('fee/amount/delete{fee_category_id}', [FeeAmountController::class, 'DeleteFeeAmount'])->name('fee.category.delete');



      // Exam Type  Routes 
      Route::get('exam/type/view', [ExamTypeController::class, 'ExamType'])->name('exam.type.view');
      Route::get('exam/type/add', [ExamTypeController::class, 'AddExamType'])->name('exam.type.add');
      Route::post('exam/type/store', [ExamTypeController::class, 'StoreExamtype'])->name('store.exam.type');
      Route::get('exam/type/edit{id}', [ExamTypeController::class, 'EditExamType'])->name('exam.type.edit');
      Route::post('exam/type/update{id}', [ExamTypeController::class, 'UpdateExamType'])->name('update.exam.type');
      Route::get('exam/type/delete{id}', [ExamTypeController::class, 'DeleteExamType'])->name('exam.type.delete');


       // School Subject  all Routes 
       Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSubject'])->name('school.subject.view');
       Route::get('school/subject/add', [SchoolSubjectController::class, 'AddSubject'])->name('school.subject.add');
       Route::post('school/subject/store', [SchoolSubjectController::class, 'StoreSubject'])->name('store.school.subject');
       Route::get('school/subject/edit{id}', [SchoolSubjectController::class, 'EditSubject'])->name('school.subject.edit');
       Route::post('school/subject/update{id}', [SchoolSubjectController::class, 'UpdateSubject'])->name('update.school.subject');
       Route::get('school/subject/delete{id}', [SchoolSubjectController::class, 'DeleteSubject'])->name('school.subject.delete');

           // Assign Subjects Routes
      Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
      Route::get('assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.sbject.add');
      Route::post('assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');
      Route::get('assign/subject/edit{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');
      Route::post('assign/subject/update{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');
      Route::get('assign/subject/details{class_id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');
      

       // Designation all Routes 
       Route::get('designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');
       Route::get('designation/add', [DesignationController::class, 'AddDesignation'])->name('designation.add');
       Route::post('designation/store', [DesignationController::class, 'StoreDesignation'])->name('store.designation');
       Route::get('designation/edit{id}', [DesignationController::class, 'EditDesignation'])->name('designation.edit');
       Route::post('designation/update{id}', [DesignationController::class, 'UpdateDesignation'])->name('update.designation');
       Route::get('designation/delete{id}', [DesignationController::class, 'DeleteDesignation'])->name('designation.delete');

           
});

    Route::prefix('students')->group(function () {
         // Students Registration all Routes  
         Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
         Route::get('/reg/add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');
         Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');
         Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');

         Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
         Route::post('/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');
         
         Route::get('/reg/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');
         Route::post('/reg/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdatePromotion'])->name('promotion.student.registration');
         Route::get('/reg/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');

         // Student Roll  Generate Route
         Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');
         Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');
         Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');

        //Registration Fee Routes
         Route::get('/reg/fee/view', [RegistrationFeeController::class, 'RegFeeView'])->name('registration.fee.view');
         Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class, 'RegFeeClassData'])->name('student.registration.fee.classwise.get');
         Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');

        //Monthly Fee Routes
        Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
        Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
        Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');

        //Exam Fee Routes
        Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
        Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');
        Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');
    });

        //  Employees Management

Route::prefix('employees')->group(function () {

    Route::get('reg/employees/view', [EmployeeRegController::class, 'EmployeeView'])->name('employees.registration.view');
    Route::get('reg/employees/add', [EmployeeRegController::class, 'EmployeeAdd'])->name('employee.registration.add');
    Route::post('reg/employees/store', [EmployeeRegController::class, 'EmployeeStore'])->name('store.employee.registration');
    Route::get('reg/employees/edit/{id}', [EmployeeRegController::class, 'EmployeeEdit'])->name('employee.registration.edit');
    Route::post('reg/employees/update/{id}', [EmployeeRegController::class, 'EmployeeUpdate'])->name('update.employee.registration');
    Route::get('reg/employees/details/{id}', [EmployeeRegController::class, 'EmployeeDetails'])->name('employee.registration.details');

    // Employee Salary All route
    Route::get('salary/employee/view', [EmployeeSalaryController::class, 'SalaryView'])->name('employee.salary.view');
    Route::get('salary/employee/increment/{id}', [EmployeeSalaryController::class, 'SalaryIncrement'])->name('employee.salary.increment');
    Route::post('salary/employee/store/{id}', [EmployeeSalaryController::class, 'SalaryStore'])->name('update.increment.store');
    Route::get('salary/employee/details/{id}', [EmployeeSalaryController::class, 'SalaryDetails'])->name('employee.salary.details');
    
    // Employee Leave All route
    Route::get('employee/leave/view', [EmployeeLeaveController::class, 'LeaveView'])->name('employee.leave.view');
    Route::get('leave/employee/add', [EmployeeLeaveController::class, 'LeaveAdd'])->name('employee.leave.add');
    Route::post('leave/employee/store', [EmployeeLeaveController::class, 'LeaveStore'])->name('store.employee.leave');
    Route::get('leave/employee/edit/{id}', [EmployeeLeaveController::class, 'LeaveEdit'])->name('employee.leave.edit');
    Route::post('leave/employee/update/{id}', [EmployeeLeaveController::class, 'LeaveUpdate'])->name('update.employee.leave');
    Route::get('leave/employee/delete/{id}', [EmployeeLeaveController::class, 'LeaveDelete'])->name('employee.leave.delete');

     // Employee Leave All route
     Route::get('employee/attendance/view', [EmployeeAttendanceController::class, 'AttendanceView'])->name('employee.attendance.view');
     Route::get('employee/attendance/add', [EmployeeAttendanceController::class, 'AttendanceAdd'])->name('employee.attendance.add');
     Route::post('employee/attendance/store', [EmployeeAttendanceController::class, 'AttendanceStore'])->name('store.employee.attendance');
     Route::get('employee/attendance/edit/{date}', [EmployeeAttendanceController::class, 'AttendanceEdit'])->name('employee.attendance.edit');
     Route::get('employee/attendance/details/{date}', [EmployeeAttendanceController::class, 'AttendanceDetails'])->name('employee.attendance.details');
     
     // Employee Monthly Salary All route
     Route::get('monthly/salary/view', [MonthlySalaryController::class, 'MonthlySalaryView'])->name('employee.monthly.salary');
     Route::get('monthly/salary/get', [MonthlySalaryController::class, 'MonthlySalaryGet'])->name('employee.monthly.salary.get');
     Route::get('monthly/salary/payslip/{employee_id}', [MonthlySalaryController::class, 'MonthlySalaryPayslip'])->name('employee.monthly.salary.payslip');
});

// Marks Management Routes

Route::prefix('marks')->group(function () {

    Route::get('marks/entry/add', [MarksController::class, 'MarksView'])->name('marks.entry.add');
    Route::post('marks/entry/store', [MarksController::class, 'MarksStore'])->name('marks.entry.store');
    Route::get('marks/entry/edit', [MarksController::class, 'MarksEdit'])->name('marks.entry.edit');
    Route::get('marks/getstudents/edit', [MarksController::class, 'MarksEditGetStudents'])->name('student.edit.getstudents');
    Route::post('marks/update/view', [MarksController::class, 'MarksUpdate'])->name('marks.entry.update');

    // Marks Entry Grade
    Route::get('marks/grade/view', [GradeController::class, 'MarksGradeView'])->name('marks.entry.grade');
    Route::get('marks/grade/add', [GradeController::class, 'MarksGradeAdd'])->name('marks.grade.add');
    Route::post('marks/grade/store', [GradeController::class, 'MarksGradeStore'])->name('store.marks.grade');
    Route::get('marks/grade/edit/{id}', [GradeController::class, 'MarksGradeEdit'])->name('marks.grade.edit');
    Route::post('marks/grade/update/{id}', [GradeController::class, 'MarksGradeUpdate'])->name('update.marks.grade');

});

Route::get('marks/getsubject', [DefaultController::class, 'GetSubject'])->name('marks.getsubject');
Route::get('student/marks/getstudents', [DefaultController::class, 'GetStudents'])->name('student.marks.getstudents');



// Marks Management Routes

Route::prefix('accounts')->group(function () {

    Route::get('student/fee/view', [StudentFeeController::class, 'StudentFeeView'])->name('student.fee.view');
    Route::get('student/fee/add', [StudentFeeController::class, 'StudentFeeAdd'])->name('student.fee.add');
    Route::get('account/fee/getstudent', [StudentFeeController::class, 'StudentFeeGetStudent'])->name('account.fee.getstudent');
    Route::post('account/fee/store', [StudentFeeController::class, 'StudentFeeStore'])->name('account.fee.store');

    //Employee salary
    Route::get('account/salary/view', [AccountSalaryController::class, 'AccountSalaryView'])->name('account.salary.view');
    Route::get('account/salary/add', [AccountSalaryController::class, 'AccountSalaryAdd'])->name('account.salary.add');
    Route::get('account/salary/getemployee', [AccountSalaryController::class, 'AccountSalaryGetEmployee'])->name('account.salary.getemployee');
    Route::post('account/salary/store', [AccountSalaryController::class, 'AccountSalaryStore'])->name('account.salary.store');
    // Marks Entry Grade


});



}); //End of Middleware Auth Riute
