<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Theme style -->

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield('addCss')
</head>

<body>

    @include('layouts.navbar')

		{{-- sidebar --}}
        @if (auth()->user()->role == 'ADMIN')
            @include('layouts.sidebar.sidebar-admin')
        @elseif(auth()->user()->role == 'TEACHER')
            @include('layouts.sidebar.sidebar-teacher')
        @else
            @include('layouts.sidebar.sidebar-student')
        @endif

        

        <!-- Content Wrapper. Contains page content -->
        
        <!-- /.content-wrapper -->

        {{-- @include('layouts.footer') --}}
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->


    @yield('addJavascript')
</body>

</html>
