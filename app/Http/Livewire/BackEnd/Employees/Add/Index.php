<?php

namespace App\Http\Livewire\BackEnd\Employees\Add;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Employee;
use Storage;
use Utility;
use Hash;
use DB;

class Index extends Component
{
    use WithFileUploads;
    public $photo, $first_name, $middle_name, $last_name, $contact_no, $gender, $birth_date, $email_address;

    public function submit(){
       
        $response = [
            'success' => false,
            'message' => '',
        ];
        
        $this->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email_address' => 'required|unique:users,email|email',
            'contact_no'    => 'required|numeric',
            'gender'        => 'required',
            'birth_date'    => 'required',
            'photo'         => 'max:2048',           // 2MB Max
        ]);

        DB::beginTransaction();
        try{

            $user           = new User();
            $user->name     = Utility::generateUsernameFromEmail($this->email_address);
            $user->email    = $this->email_address;
            $user->type     = 'employee';
            $user->password = Hash::make('password');
            if($user->save()){
                $employee              = new Employee();
                $employee->user_id     = $user->id;
                $employee->first_name  = $this->first_name;
                $employee->middle_name = $this->middle_name;
                $employee->last_name   = $this->last_name;
                $employee->contact_no  = $this->contact_no;
                $employee->gender      = $this->gender;
                $employee->birth_date  = $this->birth_date;
                $employee->employee_no = Utility::generateEmployeeNo('Employee');
                $employee->key_token   = Utility::generateTableToken('Employee');
                if($employee->save()){
                    if($this->photo){
                        $extension  = $this->photo->getClientOriginalExtension();
                        $photo_name = 'profile_photo_'.date('Ymdhis').'.'.$extension;
                        $photo      = $this->photo->storePubliclyAs('employees/'.$employee->employee_no.'/profile', $photo_name, 's3');
                        DB::table('employees')->where('id', $employee->id)->update(['photo' => $photo_name]);
                    }

                    $response['success'] = true;
                }
            }

        }catch(\Exception $e){
            $response['success'] = false;
        }
    
        if($response['success']){
            DB::commit();
            $this->emit('alert', [
                'type'    => 'success',
                'title'   => 'Successfully',
                'message' => 'Employee Successfully Added!'
            ]);
        }else{
            DB::rollback();
            $this->emit('alert', [
                'type'    => 'error',
                'title'   => 'Failed',
                'message' => 'An error occured while updating profile picture'
            ]);
        }
        
        $this->reset();
    }

    public function render(){
        return view('livewire.back-end.employees.add.index');
    }
}
