@extends('back-end.layouts.layout')
@section('title','Users')
@section('page_header')
    @php 
        $page_header = [
            'title'       => 'Users',
            'breadcrumbs' => [
                ['url' => '', 'label' => 'Users'],
            ],
        ];
    @endphp
    @include('back-end.layouts.includes.page-header', $page_header)
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- CONTENT HERE -->
            @livewire('back-end.user.index.listing')
        </div>
    </div>
    <!-- 
        NOTE: Always wrap the content in .row > .col-* 
    -->
@endsection
@section('js')

@endsection