<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('web.layout.head')
    @stack('styles')
    @vite('public/css/app.css')
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

    @stack('scripts')
</body>

</html>
