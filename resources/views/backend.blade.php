<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.partials._head')
</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        @include('backend.partials._nav')

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="#" class="" style="display: block;background-color: white; text-align: center">
                <img src="{{ asset('Custom/img/logo.png') }}" alt="Business promotion council" class="" style="width: 128px">
            </a>

            <!--Sidebar-->
            @include('backend.partials._sidebar')

        </aside>

        <div class="content-wrapper">

            @include('backend.partials._content_header')

            @yield('content')

        </div>

        @include('backend.partials._footer')

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>

    @include('backend.partials._scripts')
</body>
</html>
