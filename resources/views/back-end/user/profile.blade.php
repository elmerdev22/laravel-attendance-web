@extends('back-end.layouts.layout')
@section('title', ucwords($data->first_name.' '.$data->last_name).' - User Profile')
@section('page_header')
    @php 
        $page_header = [
            'title'       => 'User Profile',
            'breadcrumbs' => [
                ['url' => route('back-end.user.index'), 'label' => 'Users'],
                ['url' => '', 'label' => ucwords($data->first_name.' '.$data->last_name)],
            ],
        ];
    @endphp
    @include('back-end.layouts.includes.page-header', $page_header)
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            @livewire('back-end.user.profile.account-information', ['key_token' => $data->key_token])
        </div>
        <div class="col-md-9">
            @livewire('back-end.user.profile.purchase-history', ['key_token' => $data->key_token])
        </div>
    </div>
    <!-- 
        NOTE: Always wrap the content in .row > .col-* 
    -->
@endsection
@section('js')

@endsection