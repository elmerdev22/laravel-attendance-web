<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>@yield('title') | {{config('app.name')}}</title>
		<link rel="icon" type="image/icon" href="">
		@yield('css')
		<!-- Kindly removed once the packages need is working properly -->
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('template/assets/plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('template/assets/dist/css/adminlte.min.css')}}">
		<!-- Google Font: Quicksand -->
		<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
		<!-- end of to be removed packages -->
		@livewireStyles
	</head>
	<body>
		
        @if(!Route::is('admin.login'))
			<!-- ========================= HEADER ========================= -->
			@include('front-end.header.index')
			<!-- ========================= HEADER END// ========================= -->
        @endif
		
		<!-- ========================= CONTENT ========================= -->
			<div style="padding-top: 60px;">
				@yield('content')
			</div>
		<!-- ========================= CONTENT END// ========================= -->
		
        @if(!Route::is('admin.login'))
			<!-- ========================= FOOTER ========================= -->
			@include('front-end.footer.index')
			<!-- ========================= FOOTER END // ========================= -->
        @endif
		
        <script src="{{asset('template/assets/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('template/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- SweetAlert2 -->
        @yield('js')
		@livewireScripts
		@stack('scripts')
	</body>
</html>

