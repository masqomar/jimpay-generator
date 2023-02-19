<!DOCTYPE html>
<html lang="en">
@if (auth()->user()->type == 'admin')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('mazer') }}/css/main/app.css">
    <link rel="stylesheet" href="{{ asset('mazer') }}/css/main/app-dark.css">
    <link rel="shortcut icon" href="{{ asset('mazer') }}/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('mazer') }}/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('mazer') }}/css/shared/iconly.css">
    @stack('css')
</head>

<body>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @else

            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
                <meta http-equiv="Pragma" content="no-cache" />
                <meta http-equiv="Expires" content="0" />
                <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
                <meta name="apple-mobile-web-app-capable" content="yes" />
                <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <title>@yield('title') - {{ config('app.name', 'JIMPay') }}</title>
                <meta name="description" content="Kopkar JIM Mobile App">
                <meta name="keywords" content="kopkar jim, jimpay, koperasi karyawan jbi, kampung inggris, kampung inggris lc, kampung inggris pare" />
                <link rel="icon" type="image/png" href="{{ asset ('assets') }}//img/favicon.png" sizes="32x32">
                <link rel="apple-touch-icon" sizes="180x180" href="{{ asset ('assets') }}//img/icon/192x192.png">
                <link rel="stylesheet" href="{{ asset ('assets') }}//css/style.css">
                <link rel="manifest" href="__manifest.json">
            </head>

            <body>
                <!-- App Capsule -->
                <div id="jimApp">
                    @endif