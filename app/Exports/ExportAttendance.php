<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Employee;
use App\Models\Attendance;

class ExportAttendance implements FromCollection
{
    public $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $data     = $this->data;
        $employee = Employee::with(['attendances'])->whereId($data['employee_id'])->get();
        // $attendance = Attendance::where('employee_id', $data['employee_id'])->whereBetween('created_at', [$data['start_date'], $data['end_date'] ])->get();
        
        dd($employee);
    }
}
