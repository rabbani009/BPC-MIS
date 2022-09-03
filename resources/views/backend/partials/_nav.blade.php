<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <p style="font-size: 24px;margin-bottom: 0px">Bangladesh Business Promotion Council</p>
            <p style="font-size: 12px; margin-bottom: 0px">Management Information System</p>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('AdminLTE-3.2.0/dist/img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <li class="user-header bg-primary">
                    <img src="{{ asset('AdminLTE-3.2.0/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    <p>
                        {{ \Illuminate\Support\Facades\Auth::user()->name }} - {{ \Illuminate\Support\Facades\Auth::user()->role->name }}
                        <small>Member since {{ \Illuminate\Support\Facades\Auth::user()->created_at }}</small>
                    </p>
                </li>

                <li class="user-body">
                    <div class="row">
                        <div class="col-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </div>

                </li>

                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                    <a href="#" class="btn btn-default btn-flat float-right">Sign out</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
