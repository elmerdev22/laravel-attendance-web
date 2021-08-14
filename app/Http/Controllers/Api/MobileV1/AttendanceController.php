<?php

namespace App\Http\Controllers\Api\MobileV1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use Storage;
use DB;

class AttendanceController extends Controller
{
    public function attendance(Request $request, $key_token){
        
        $response = [
            'success' => false,
            'message' => '',
        ];

        if($request->has('photo')){

            DB::beginTransaction();

            try{
                
                $file     = $request->file('photo');
                $exte     = $file->extension();
                $filename = $request->attendanceValue.'_'.date('Ymdhis').'.'.$exte;
                $filepath = 'employees/'.$request->employeeNo.'/'.'attendance';
                Storage::disk('s3')->putFileAs($filepath, $file, $filename);

                $employee = Employee::where('key_token', $key_token)->first();

                $attendance              = new Attendance();
                $attendance->employee_id = $employee->id;
                $attendance->photo       = $filename;
                $attendance->type        = $request->attendanceValue;
                if($attendance->save()){
                    $response['success'] = true;
                    $response['message'] = 'Successful '.$request->attendanceLabel.' '.date('h:i:s a').' ';
                    DB::commit();
                }

            }catch(\Exception $e){
                $response['message'] = $e;
                DB::rollback();
            }

        }

        return response()->json($response, 200);
    }
}
