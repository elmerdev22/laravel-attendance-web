<?php

namespace App\Http\Livewire\BackEnd\Employees\Edit;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Employee;
use Storage;
use QueryUtility;
use PhotoUtility;
use Utility;
use Hash;
use DB;

class Index extends Component
{
    use WithFileUploads;
    public $employee_id, $photo, $first_name, $middle_name, $last_name, $contact_no, $gender, $birth_date, $email_address, $current_photo;

    public function mount($employee_id){

        $this->employee_id = $employee_id;
        $data = $this->data();

        $this->first_name    = $data->first_name;
        $this->middle_name   = $data->middle_name;
        $this->last_name     = $data->last_name;
        $this->contact_no    = $data->contact_no;
        $this->gender        = $data->gender;
        $this->birth_date    = $data->birth_date;
        $this->email_address = $data->email;
        $this->current_photo = $data->photo ? PhotoUtility::employeePhoto($data->employee_no, $data->photo, 'profile') : null;
    }

    public function data(){
        
        $filter['select'] = [
            'users.email',
            'users.id as user_id',
            'employees.*'
        ];
        
        $filter['where']['employees.id'] = $this->employee_id;
        
        $data = QueryUtility::employees($filter)->first();

        return $data;
    }

    public function submit(){
       
        $response = [
            'success' => false,
            'message' => '',
        ];
        
        $data = $this->data();

        $rules = [
            'first_name'    => 'required',
            'middle_name'   => 'required',
            'last_name'     => 'required',
            'email_address' => 'required|email',
            'contact_no'    => 'required|numeric',
            'gender'        => 'required',
            'birth_date'    => 'required',
            'photo'         => 'max:2048',           // 2MB Max
        ];

        if($data->email != $this->email_address){
            $rules['email_address'] = 'required|unique:users,email|email';
        }

        $this->validate($rules);

        DB::beginTransaction();
        try{

            $user           = User::whereId($data->user_id)->first();
            $user->name     = Utility::generateUsernameFromEmail($this->email_address);
            $user->email    = $this->email_address;
            if($user->save()){
                $employee              = Employee::whereId($data->id)->first();
                $employee->first_name  = $this->first_name;
                $employee->middle_name = $this->middle_name;
                $employee->last_name   = $this->last_name;
                $employee->contact_no  = $this->contact_no;
                $employee->gender      = $this->gender;
                $employee->birth_date  = $this->birth_date;
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
            dd($e);
        }
    
        if($response['success']){
            DB::commit();
            $this->emit('alert', [
                'type'    => 'success',
                'title'   => 'Successfully',
                'message' => 'Employee Successfully Updated!'
            ]);
        }else{
            DB::rollback();
            $this->emit('alert', [
                'type'    => 'error',
                'title'   => 'Failed',
                'message' => 'An error occured while employee details.'
            ]);
        }
    }

    public function render(){
        return view('livewire.back-end.employees.edit.index');
    }
}