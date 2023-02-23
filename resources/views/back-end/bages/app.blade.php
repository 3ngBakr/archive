<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ app()->getLocale() == 'ar' ?'rtl':'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{--favicon--}}
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png"/>

    @if (app()->getLocale() == 'ar')
        {{--plugins--}}
        <link href="{{ asset('assets/plugins/simplebar/css/simplebar-rtl.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar-rtl.min.css') }}"
              rel="stylesheet"/>
        <link href="{{ asset('assets/plugins/metismenu/css/metisMenu-rtl.min.css') }}" rel="stylesheet"/>
        @stack('plugins_css')
        {{--loader--}}
        <link href="{{ asset('assets/css/pace-rtl.min.css') }}" rel="stylesheet"/>
        <script src="{{ asset('assets/js/pace.min.js') }}" defer></script>
        {{--Bootstrap CSS --}}
        <link href="{{ asset('assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/google-fonts.min.css') }}" rel="stylesheet">
        {{--        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">--}}
        <link href="{{ asset('assets/css/app-rtl.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/icons-rtl.min.css') }}" rel="stylesheet">
        {{--Theme Style CSS--}}
        <link rel="stylesheet" href="{{ asset('assets/css/dark-theme-rtl.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/css/semi-dark-rtl.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/css/header-colors-rtl.min.css') }}"/>
    @else
        {{--plugins--}}
        <link href="{{ asset('assets/plugins/simplebar/css/simplebar.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet"/>
        @stack('plugins_css')
        {{-- loader--}}
        <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet"/>
        <script src="{{ asset('assets/js/pace.min.js') }}" defer></script>
        {{-- Bootstrap CSS --}}
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/google-fonts.min.css') }}" rel="stylesheet">
        {{--        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">--}}
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
        {{--Theme Style CSS--}}
        <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/css/semi-dark.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/css/header-colors.min.css') }}"/>
    @endif
    <style>
        label.required::after {
            content: " *";
            color: red;
        }

        tbody > tr > th {
            font-weight: inherit !important;
        }
    </style>
    @stack('styles')
</head>

<body>
{{--wrapper--}}
<div class="wrapper">

    {{--sidebar wrapper --}}
    @include('back-end.inc.sidebar')
    {{--end sidebar wrapper --}}

    {{--start header --}}
    @include('back-end.inc.header')
    {{--end header --}}

    {{--start page wrapper --}}
    <div class="page-wrapper">
        <div class="page-content">
            @yield('content')
        </div>
    </div>
    {{--end page wrapper --}}

    {{--start overlay--}}
    <div class="overlay toggle-icon"></div>
    {{--end overlay--}}

    {{--Start Back To Top Button--}}
    <a href="#" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

    {{--End Back To Top Button--}}
    @include('back-end.inc.footer');
</div>
{{--end wrapper--}}

{{-- Bootstrap JS --}}
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

{{--plugins--}}
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.min.js') }}"></script>

@stack('plugins_js')

{{--app JS--}}
<script src="{{ asset('assets/js/app.min.js') }}"></script>

@stack('scripts')
</body>
</html>
