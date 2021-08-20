@extends('back-end.layout')
@section('title','Add Employees')
@section('page_header')
    @php 
        $page_header = [
            'title'       => 'Add Employees',
            'breadcrumbs' => [
                ['url' => route('back-end.employees.index'), 'label' => 'Employees'],
                ['url' => '', 'label' => 'Add Employees'],
            ],
        ];
    @endphp
    @include('back-end.includes.page-header', $page_header)
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- CONTENT HERE -->
            @livewire('back-end.employees.add.index')
        </div>
    </div>
@endsection