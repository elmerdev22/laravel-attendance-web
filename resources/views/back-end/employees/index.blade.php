@extends('back-end.layout')
@section('title','Employees')
@section('page_header')
    @php 
        $page_header = [
            'title'       => 'Employees',
            'breadcrumbs' => [
                ['url' => '', 'label' => 'Employees'],
            ],
        ];
    @endphp
    @include('back-end.includes.page-header', $page_header)
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- CONTENT HERE -->
            @livewire('back-end.employees.listing')
        </div>
    </div>
@endsection