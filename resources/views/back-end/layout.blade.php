<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(Request::is('/'))
      <title> {{config('app.name')}} - @yield('title')</title>
    @else
      <title>@yield('title') | {{config('app.name')}}</title>
    @endif
    {{-- <link rel="icon" type="image/icon" href="{{UploadUtility::content_photo('icon', false)}}"> --}}
    
    @yield('css')
    <!-- Kindly removed once the packages need is working properly -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('template/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template/assets/dist/css/adminlte.css')}}">
    <!-- Google Font: Quicksand -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
    {{-- Scroll Bar --}}
    <link rel="stylesheet" href="{{asset('template/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- end of to be removed packages -->
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <!-- End Preloader -->
    <div class="wrapper">

        <!-- Navbar header -->
        @include('back-end.includes.header')

        <!-- Main Sidebar Container -->
        @include('back-end.includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('page_header')
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            @yield('content')
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <footer class="main-footer">
            @include('back-end.includes.footer')
        </footer>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->

    @livewireScripts
    
    <!-- Kindly removed once the packages need is working properly -->
    <script src="{{asset('template/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('template/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('template/assets/dist/js/sweetalert2.min.js') }}"></script>
    <!-- Admin lte -->
    <script src="{{asset('template/assets/dist/js/adminlte.min.js')}}"></script>
    <!-- SCroll bar -->
    <script src="{{asset('template/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- end of to be removed packages -->
    <script type="text/javascript">
    
        window.livewire.on('notif_alert', param => {
            Swal.fire({
                position: param['position'],
                icon: param['type'],
                title: param['message'],
                showConfirmButton: param['confirm_button'],
                timer: param['timer']
            })
        });

      window.livewire.on('alert', param => {
        var config = {
            position  : 'center',
        };

        if('title' in param)
            config['title'] = param['title'];
        if('type' in param)
            config['icon'] = param['type'];
        if('message' in param)
            config['html'] = param['message'];
        if('showConfirmButton' in param)
            config['showConfirmButton'] = param['showConfirmButton'];
        if('timer' in param)
            config['timer'] = param['timer'];

        Swal.fire(config);
    });

    window.livewire.on('alert_link', param => {
        Swal.fire({
            position         : 'center',
            icon             : param['type'],
            html             : param['message'],
            title            : param['title'],
            showConfirmButton: true,
            allowOutsideClick: false,
        }).then((result) => {
            if(result.value){
                if('redirect' in param){
                    window.location = param['redirect'];                       
                }else{
                    window.location.reload();                       
                }
            }
        });
    });
    </script>
    @yield('js')
    @stack('scripts')
</body>
</html>
