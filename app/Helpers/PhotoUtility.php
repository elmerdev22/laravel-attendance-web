<?php 

namespace App\Helpers;

use Storage;
use Auth;

class PhotoUtility{
    
    public static function attendancePhoto($employee_no, $file_name){
        return Storage::disk('s3')->url('employees/'.$employee_no.'/'.'attendance/'.$file_name);
    }

}