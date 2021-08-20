<?php 

namespace App\Helpers;

use Storage;
use Auth;

class PhotoUtility{
    
    public static function employeePhoto($employee_no, $file_name, $type){
        return Storage::disk('s3')->url('employees/'.$employee_no.'/'.$type.'/'.$file_name);
    }

}