<?php

namespace App\Http\Livewire\BackEnd\Employees;

use Livewire\Component;
use Livewire\WithPagination;
use QueryUtility;

class Listing extends Component
{
    use WithPagination;
	public $search = '', $show_entries=10, $sort = [], $sort_type='asc';

    public function data(){
        $filter['select'] = [
            'employees.*'
        ];

		if($this->search){
			$filter['orWhereLike'] = $this->search;
		}

        $data = QueryUtility::employees($filter)->paginate($this->show_entries);

        return $data;
    }

    public function render(){
        $data = $this->data();
        return view('livewire.back-end.employees.listing', compact('data'));
    }
}
