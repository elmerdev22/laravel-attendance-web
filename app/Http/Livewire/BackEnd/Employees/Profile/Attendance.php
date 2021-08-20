<?php

namespace App\Http\Livewire\BackEnd\Employees\Profile;

use Livewire\Component;
use App\Models\Attendance as Attendances;
use PhotoUtility;
use Utility;

class Attendance extends Component
{
    public $employee_id;

    public function mount($employee_id){
        $this->employee_id = $employee_id;
    }

    public function data(){
        return Attendances::where('employee_id', $this->employee_id)->get();
    }

    public function render(){
        $data = $this->data();
        return view('livewire.back-end.employees.profile.attendance', compact('data'));
    }

    public function showPhoto($id){
        $attendance = Attendances::with(['employee'])->whereId($id)->first();
        $photo      = PhotoUtility::employeePhoto($attendance->employee->employee_no, $attendance->photo, 'attendance');
        
        $data = [
            'type'  => Utility::attendanceType()[$attendance->type],
            'photo' => $photo,
            'time'  => date('F d, Y h:i:s A', strtotime($attendance->created_at)),
        ];

        $this->emit('showPhoto', $data);

    }
}
