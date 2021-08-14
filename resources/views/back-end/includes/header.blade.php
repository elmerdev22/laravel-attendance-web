<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                <span class="fa fa-user-circle"></span> 
                @php $account = Utility::authUserAdmin(); @endphp
                {{ucwords($account->first_name.' '.$account->last_name)}} 
                <i class="fas fa-caret-down"></i>
            </a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 dropdown-menu-right shadow">
                <li data-toggle="modal" data-target="#change_password">
                    <a href="javascript:void(0);" class="dropdown-item sayang-dropdown-item">Change Password </a>
                </li>
                <li>
                    <a href="{{route('auth.logout', ['redirect' => 'admin_login'])}}" class="dropdown-item sayang-dropdown-item">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>