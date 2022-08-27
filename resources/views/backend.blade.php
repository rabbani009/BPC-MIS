<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.partials._head')
</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        @include('backend.partials._nav')

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="../../index3.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
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