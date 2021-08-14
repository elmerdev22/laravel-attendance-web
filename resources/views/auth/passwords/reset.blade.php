@extends('front-end.layout')
@section('title','Reset Password')
@section('page_header')
    @php 
        $page_header = [
            'title'       => '',
            'breadcrumbs' => [
                ['url' => '', 'label' => 'Reset Password'],
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

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password" placeholder="New password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Reset Password') }}
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