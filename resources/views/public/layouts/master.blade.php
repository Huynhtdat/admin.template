<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('public.layouts.header')
</head>
<body>
        @include('public.layouts.menu')
        @yield('content')
        @include('public.layouts.footer')
        @include('public.layouts.scrip')
</body>
</html>