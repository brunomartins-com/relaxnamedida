<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no" />
    <meta name="author" content="Bruno Martins">
    <title>@yield('title'){{ $websiteSettings['title'] }}</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="{!! asset('assets/images/dados-do-site/'.$websiteSettings['favicon']) !!}" rel="shortcut icon" />
    <link href="{{ asset('assets/images/dados-do-site/'.$websiteSettings['appleTouchIcon']) }}" rel="apple-touch-icon" />
    <link href="{!! asset('assets/css/main.css') !!}" rel="stylesheet" type="text/css" />
    {!! $websiteSettings['googleAnalytics'] !!}
    <!-- Meta Tags -->
    <meta name="title" content="@yield('title'){{ $websiteSettings['title'] }}" />
    <!-- Tags Facebook -->
    <meta property="og:title" content="@yield('title'){{ $websiteSettings['title'] }}" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:url" content="{{ \URL::current() }}" />
    <meta property="og:image" content="{{ asset('assets/images/dados-do-site/'.$websiteSettings['avatar']) }}" />
    <meta property="og:site_name" content="@yield('title'){{ $websiteSettings['title'] }}" />

    @yield('head')
    <style type="text/css">
        body{
            width: 100%;
            height: 1200px;
            background: url('/assets/images/bg-header.jpg') no-repeat center top;
        }
    </style>
</head>
<body>
<br/>
<center>
<h1 class="center"><img src="/assets/images/logo-concurso-relax-na-medida.png" alt="Concurso Relax Na Medida"></h1>
<h3 class="font-size-36" style="color: #4D2C1E; font-family: 'Roboto Slab', serif;">Estamos em manutenção.</h3>
</center>


</body>
</html>