<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Employee;
use App\Helpers\Utility;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        try{

            // Create Admin
            $email_admin   = 'admin@gmail.com';

            $admin           = new User();
            $admin->name     = Utility::generateUsernameFromEmail($email_admin);
            $admin->email    = $email_admin;
            $admin->type     = 'admin';
            $admin->password = Hash::make('password');
            $admin->save();

            // Create User Employee
            $email   = 'elmer@gmail.com';

            $user                    = new User();
            $user->name              = Utility::generateUsernameFromEmail($email);
            $user->email             = $email;
            $user->type              = 'employee';
            $user->password          = Hash::make('password');
            if($user->save()){
                $employee              = new Employee();
                $employee->user_id     = $user->id;
                $employee->employee_no = Utility::generateEmployeeNo('Employee');
                $employee->first_name  = 'Elmer';
                $employee->last_name   = 'Torres';
                $employee->key_token   = Utility::generateTableToken('Employee');
                $employee->save();
            }
        }catch(\Exception $e){
            dd($e);
        }
    }
}
