<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>BSolution | Sistema de Gestion Empresarial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SISTEMA LWPOS') }}</title>

    <!-- Styles -->
    @include('layouts.theme.styles')



{{--     <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">

    <link href="{{ asset('vendor/fontawesome/css/all.css') }}" rel="stylesheet">
 --}}
    @livewireStyles

</head>

<body class="loading" data-layout-mode="default" data-layout-color="light" data-topbar-color="dark"
    data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

    <div id="wrapper">

        @include('layouts.theme.header')

        {{-- <div class="overlay"></div>
        <div class="search-overlay"></div> --}}

        @include('layouts.theme.sidebar')

        <div id="content" class="content-page">
            <div class="content">
                {{-- Aqui va renderizar todo lo que venga del componente --}}
                @yield('content')
            </div>
        </div>

        @include('layouts.theme.footer')

    </div>


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>


    <!-- Scripts -->
    @include('layouts.theme.scripts')


    @livewireScripts

</body>

</html>
