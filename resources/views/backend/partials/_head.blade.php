<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{config('myconfig.app_name')}} | {{$commons['page_title']}}</title>

<link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">

<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">

<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css?v=3.2.0') }}">

@yield('page_level_css_plugins')

<link rel="stylesheet" href="{{ asset('Custom/css/custom.css') }}">

@yield('page_level_css_files')
