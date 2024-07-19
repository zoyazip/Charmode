<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('web.layout.head')
    @stack('styles')
    {{-- @vite('public/css/app.css') --}}
</head>

<body>
    <header class="header">
        @include('web.layout.header')
    </header>

    <main class="inner-container">
        @yield('content')
    </main>

    <footer>
        @include('web.layout.footer')
    </footer>

    @if ($showCookiePopup)
        @include('web.layout.cookies')
        <script src="{{ URL::asset('js/cookies.js') }}" defer></script>
    @endif

    @stack('scripts')

</body>

</html>
