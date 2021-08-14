@extends('front-end.layout')
@section('title','Forgot Password')
@section('page_header')
    @php 
        $page_header = [
            'title'       => '',
            'breadcrumbs' => [
                ['url' => '', 'label' => 'Forgot Password'],
            ],
        ];
    @endphp
    @include('front-end.includes.page-header', $page_header)
@endsection
@section('content')

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content" style="min-height:84vh">
    <div class="container">
        <!-- ============================ COMPONENT LOGIN   ================================= -->
        <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
            <div class="card-body">
                <h4 class="card-title mb-4">Forgot Password</h4>
                <p>Enter your email to send your Reset link.</p>

                @if (session('status'))
                    <div class="alert alert-primary" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> {{session('status')}}
                    </div>
                @endif
                
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                    <!-- /.col -->
                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </form>
            </div> <!-- card-body.// -->
        </div> <!-- card .// -->
        <p class="text-center mt-4">Don't have account? <a href="{{url('/register')}}">Sign up</a></p>
        <br><br>
        <!-- ============================ COMPONENT LOGIN  END.// ================================= -->
    </div>
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection
