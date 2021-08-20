@extends('back-end.layout')
@section('title', ucwords($data->first_name.' '.$data->last_name).' - Edit Employee')
@section('page_header')
    @php 
        $page_header = [
            'title'       => 'Edit Employee',
            'breadcrumbs' => [
                ['url' => route('back-end.employees.index'), 'label' => 'Employees'],
                ['url' => '', 'label' => ucwords($data->first_name.' '.$data->last_name)],
            ], 
        ];
    @endphp
    @include('back-end.includes.page-header', $page_header)
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- CONTENT HERE -->
            @livewire('back-end.employees.edit.index', ['employee_id' => $data->id])
        </div>
    </div>
@endsection