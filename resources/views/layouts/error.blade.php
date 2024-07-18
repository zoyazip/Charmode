<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('web.layout.head')
    @vite('public/css/app.css')
    @stack('styles')
</head>

<body class="w-screen h-screen flex justify-center items-center">
    @yield('content')
    @if ($showCookiePopup)
        @include('web.layout.cookies')
        <script src="{{ URL::asset('js/cookies.js') }}" defer></script>
    @endif
</body>

</html>