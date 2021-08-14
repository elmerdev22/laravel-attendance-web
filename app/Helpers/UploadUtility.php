<?php 

namespace App\Helpers;

use Storage;
use Auth;

class UploadUtility{
    
    public static function filePath($type){
        return [
            'attendance_photo' => '',
            'employee_photo'   => '',
            'user_photo'       => '',
        ];
    }

}