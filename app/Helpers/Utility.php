<?php 

namespace App\Helpers;

use App\Models\{Employee, User};
use Storage;
use Auth;
use DB;

class Utility{
    
    public static function datatableShowEntries(){
        return ['10', '25', '50', '100', '300', '500', '1000'];
    }
    
    public static function getAttendancePhoto($employee_no, $filename){
        return Storage::get('public/employees/'.$employee_no.'/attendance'.$filename); 
    }

    public static function attendanceType(){
        return [
            'time_in_am'  => 'Time In (AM)',
            'time_out_am' => 'Time Out (AM)',
            'time_in_pm'  => 'Time In (PM)',
            'time_out_pm' => 'Time Out (PM)',
            'time_in_ot'  => 'Time In (OT)',
            'time_out_ot' => 'Time Out (OT)',
        ];
    }

    public static function authUserAdmin(){
        if(Auth::check()){
            if(Auth::user()->type == 'admin'){
                return User::where('id', Auth::user()->id)->first();
            }else{
                return null;
            }
        }else{
            return null;
        }
    }

    public static function generateUniqueToken($len = 13) {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($len / 2));
        }else if(function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($len / 2));
        }else{
            throw new Exception("no cryptographically secure random function available");
        }

        return substr(bin2hex($bytes), 0, $len);
    }

    public static function generateTableToken($model_string, $key='key_token'){
        do{
            $continue     = true;
            $token        = self::generateUniqueToken(20);
            
            $model_string = 'App\\Models\\'.ucfirst($model_string);
            $model        = new $model_string();
            $check        = $model::where($key, $token)->count();

            if($check == 0){
                $continue = false;
            }

        }while($continue);
        
        return $token;
    }

    public static function generateUsernameFromEmail($email){
        $username = explode('@', $email)[0];
        
        do{
            $check_user   = User::where('name', $username)->first();
            if($check_user){
                $username     = $username.'.'.rand(1,100);
                $already_used = true;
            }else{
                $already_used = false;
            }
        }while($already_used);

        return $username;
    }
    
    public static function generateEmployeeNo(){
        do{
            $continue     = true;
            $generated_id = 'E-'.date('ym').rand(1000,9999);
            $check        = Employee::where('employee_no', $generated_id)->count();
            if($check == 0){
                $continue = false;
            }
        }while($continue);

        return $generated_id;
    }
}