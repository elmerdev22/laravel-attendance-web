@extends('back-end.layout')
@section('title','Dashboard')
@section('page_header')
    @php 
        $page_header = [
            'title'       => 'Dashboard',
            'breadcrumbs' => [
                ['url' => '', 'label' => 'Dashboard'],
            ],
        ];
    @endphp
    @include('back-end.includes.page-header', $page_header)
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            in development........
        </div>
    </div>

@endsection
