<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExportAttendance;
use QueryUtility;
use Excel;

class EmployeesController extends Controller
{
    public function index(){
        return view('back-end.employees.index');
    }

    public function add(){
        return view('back-end.employees.add');
    }

    public function profile($employee_no, $key_token){
        $data = self::employeeDetails($key_token);
        return view('back-end.employees.profile', compact('data'));
    }

    public function edit($employee_no, $key_token){
        $data = self::employeeDetails($key_token);
        return view('back-end.employees.edit', compact('data'));
    }

    public function employeeDetails($key_token){
        
        $filter['select'] = [
            'employees.*'
        ];

        $filter['where']['employees.key_token'] = $key_token;
        
        return QueryUtility::employees($filter)->first();
    }

    public function exportAttendance(Request $request, $employee_id){

        $dates = explode(' - ', $request->daterangepicker);

        $data = [
            'employee_id' => $employee_id,
            'start_date'  => date('Y-m-d', strtotime($dates[0])),
            'end_date'    => date('Y-m-d', strtotime($dates[1])),
        ];
        
        return Excel::download(new ExportAttendance($data), 'attendance.xlsx');
    }
    
}
