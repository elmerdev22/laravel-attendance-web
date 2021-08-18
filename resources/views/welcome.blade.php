@extends('front-end.layout')
@section('title','Welcome')
@section('content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img style="width: auto; height: 70%;" src="{{Utility::getDefaultPhoto('selfie')}}" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection