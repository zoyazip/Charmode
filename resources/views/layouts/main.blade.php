<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('web.layout.head')
</head>

<body>
    <header>
        @include('web.layout.header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('web.layout.footer')
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>