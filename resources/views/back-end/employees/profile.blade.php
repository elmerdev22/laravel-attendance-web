@extends('back-end.layout')
@section('title', ucwords($data->first_name.' '.$data->last_name).' - Employee Profile')
@section('css')
<link rel="stylesheet" href="{{asset('template/assets/plugins/fullcalendar/main.min.css')}}">
<link rel="stylesheet" href="{{asset('template/assets/plugins/fullcalendar-daygrid/main.min.css')}}">
<link rel="stylesheet" href="{{asset('template/assets/plugins/fullcalendar-timegrid/main.min.css')}}">
<link rel="stylesheet" href="{{asset('template/assets/plugins/fullcalendar-bootstrap/main.min.css')}}">
@endsection
@section('page_header')
    @php 
        $page_header = [
            'title'       => 'Employee Profile',
            'breadcrumbs' => [
                ['url' => route('back-end.employees.index'), 'label' => 'Employee'],
                ['url' => '', 'label' => ucwords($data->first_name.' '.$data->last_name)],
            ],
        ];
    @endphp
    @include('back-end.includes.page-header', $page_header)
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            @livewire('back-end.employees.profile.information', ['key_token' => $data->key_token])
        </div>
        <div class="col-md-9">
            @livewire('back-end.employees.profile.attendance', ['employee_id' => $data->id])
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset('template/assets/plugins/fullcalendar/main.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/fullcalendar-daygrid/main.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/fullcalendar-timegrid/main.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/fullcalendar-interaction/main.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/fullcalendar-bootstrap/main.min.js')}}"></script>
@endsection