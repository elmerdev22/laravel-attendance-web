<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use QueryUtility;

class EmployeesController extends Controller
{
    public function index(){
        return view('back-end.employees.index');
    }

    public function profile($employee_no, $key_token){

        $filter['select'] = [
            'employees.*'
        ];
        
        $filter['where']['employees.key_token'] = $key_token;
        
        $data = QueryUtility::employees($filter)->first();

        return view('back-end.employees.profile', compact('data'));
    }

    public function add(){
        return view('back-end.employees.add');
    }
    
}
