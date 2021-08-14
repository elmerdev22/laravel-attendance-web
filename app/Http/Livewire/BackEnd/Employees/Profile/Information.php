<?php

namespace App\Http\Livewire\BackEnd\Employees\Profile;

use Livewire\Component;
use QueryUtility;

class Information extends Component
{
    
    public $key_token;

    public function mount($key_token){
        $this->key_token = $key_token;
    }

    public function data(){
        
        $filter['select'] = [
            'users.email',
            'employees.*'
        ];
        
        $filter['where']['employees.key_token'] = $this->key_token;
        
        $data = QueryUtility::employees($filter)->first();

        return $data;
    }

    public function render(){
        $data = $this->data();
        return view('livewire.back-end.employees.profile.information', compact('data'));
    }
}
