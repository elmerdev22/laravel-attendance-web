<?php

namespace App\Http\Controllers\Api\MobileV1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use PhotoUtility;
use Utility;

class LoginController extends Controller
{
    public function index(Request $request){
        
        $response = [
            'success' => false,
            'data'    => [],
            'message' => 'Invalid Employee No.'
        ];

        $data  = Employee::where('employee_no', 'E-'.$request->employeeNo)->first();
        
        if($data){
    
            $photo = PhotoUtility::employeePhoto($data->employee_no, $data->photo, 'profile');

            $response['success'] = true;
            $response['data'] = [
                'photo'       => $data->photo ? $photo : Utility::getDefaultPhoto('user'),
                'employee_no' => $data->employee_no,
                'first_name'  => $data->first_name,
                'last_name'   => $data->last_name,
                'key_token'   => $data->key_token,
            ];
            $response['message'] = 'Successfully Login.';
        }
        
        return response()->json($response, 200);
    }
}
