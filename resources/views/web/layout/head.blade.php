<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

{{-- to change title of a page, use ---> @section('title', 'new title') --}}
<title>@yield('title', 'Default Title')</title>

{{-- styles --}}
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/footer/footer.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/header/header.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/header/greetings.css') }}">


{{-- images / icons --}}
<link rel="icon" type="image/x-icon" href="{{ URL::asset('assets/ico/main.ico') }}">
