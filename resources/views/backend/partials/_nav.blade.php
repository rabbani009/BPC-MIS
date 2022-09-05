<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav align-items-start">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <div class="custom_title">
                <p class="mb-0">Bangladesh Business Promotion Council</p>
                <small class="mb-0">Management Information System</small>
            </div>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center justify-content-center" data-toggle="dropdown">
                <div class="d-flex flex-column align-items-center pr-2">
                    <span class="custom_font_size_sm d-none d-md-inline">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                    <small class="custom_font_size_xs align-self-end">System admin</small>
                </div>
                <img src="{{ asset('AdminLTE-3.2.0/dist/img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2 m-0" alt="User Image">

            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <li class="user-header bg-primary">
                    <img src="{{ asset('AdminLTE-3.2.0/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    <p>
                        {{ \Illuminate\Support\Facades\Auth::user()->name }} - {{ \Illuminate\Support\Facades\Auth::user()->role->name }}
                        <small>Member since {{ \Illuminate\Support\Facades\Auth::user()->created_at }}</small>
                    </p>
                </li>

                <li class="user-footer d-flex justify-content-between">
                    <div class="float-start">
                        <a href="{!! route('user.show', \Illuminate\Support\Facades\Auth::user()->id) !!}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="float-end">
                        <form action="{!! route('post.logout') !!}" method="post" id="logout_form">
                            {!! csrf_field() !!}
                            <a href="#" onclick="document.getElementById('logout_form').submit()" class="btn btn-default btn-flat">Log out</a>
                        </form>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>
