<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> @yield('title') </title>

    <link href="{{ asset('technology_shoplle/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('technology_shoplle/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('technology_shoplle/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('technology_shoplle/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('technology_shoplle/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('technology_shoplle/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('technology_shoplle/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('technology_shoplle/js/html5shiv.js') }}"></script>
    <script src="{{ asset('technology_shoplle/js/respond.min.js') }}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('technology_shoplle/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('technology_shoplle/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('technology_shoplle/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('technology_shoplle/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('technology_shoplle/images/ico/apple-touch-icon-57-precomposed.png') }}">
    @yield('style')
</head>
<body>
    @include('client.partials.header')

    @yield('content')

    @include('client.partials.footer')

    <!-- jQuery -->
    <script src="{{ asset('technology_shoplle/js/jquery.js') }}"></script>
    <script src="{{ asset('technology_shoplle/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('technology_shoplle/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('technology_shoplle/js/price-range.js') }}"></script>
    <script src="{{ asset('technology_shoplle/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('technology_shoplle/js/main.js') }}"></script>
    @yield('javascript')
</body>
</html>
