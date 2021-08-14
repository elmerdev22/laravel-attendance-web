<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @php
        $account    = Utility::authUserAdmin();
        $photo_link = 'https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png';
    @endphp
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{$account->photo ? $account->photo : $photo_link}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Attendance</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar sayang-sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{$account->photo ? $account->photo : $photo_link}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('back-end.dashboard.index')}}" class="d-block">{{ucwords($account->name)}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills sayang-nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('back-end.dashboard.index')}}" class="nav-link {{Route::is('back-end.dashboard.*') ? 'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('back-end.employees.index')}}" class="nav-link {{Route::is('back-end.employees.*') ? 'active':''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Employees</p>
                    </a>
                </li>
            </ul>
        </nav><!-- /.sidebar-menu -->
    </div><!-- /.sidebar -->
</aside>