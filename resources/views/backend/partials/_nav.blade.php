<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav align-items-start">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <div class="custom_title">
                <p class="mb-0">Bangladesh Business Promotion Council</p>
                <small class="mb-0 text-maroon">Management Information System</small>
            </div>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center justify-content-center" data-toggle="dropdown">
                <div class="d-flex flex-column align-items-center pr-2">
                    <span class="custom_font_size_sm d-none d-md-inline">{{ auth()->user()->name }}</span>
                    <small class="custom_font_size_xs align-self-end">{{auth()->user()->role->name}}</small>
                </div>
                <img src="{{(!empty($user->profile_image)) ? url('upload/profile_images/'. Auth::user()->profile_image):url('upload/no_image.jpg') }}" height="160px" width="160px" class="user-image img-circle elevation-2 m-0" alt="User Image">

            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <li class="user-header bg-primary">
                    <img src="{{(!empty($user->profile_image)) ? url('upload/profile_images/'. Auth::user()->profile_image):url('upload/no_image.jpg') }}" height="160px" width="160px"class="img-circle elevation-2" alt="User Image">
                    <p>
                        {{ auth()->user()->name }} - {{ auth()->user()->role->name }}
                        <small>Member since {{ auth()->user()->created_at }}</small>
                    </p>
                </li>

                <li class="user-footer d-flex justify-content-between">
                    <div class="float-start">
                        <a href="{{ route('profile.show', auth()->user()->id) }}" class="btn btn-info rounded-0">Profile</a>
                    </div>
                    <div class="float-end">
                        <form action="{{ route('post.logout') }}" method="post" id="logout_form">
                            {{ csrf_field() }}
                            <a href="#" onclick="document.getElementById('logout_form').submit()" class="btn btn-outline-warning rounded-0">Log out</a>
                        </form>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>
