<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Pet project for magebit bootcamp">

{{-- to change title of a page, use ---> @section('title', 'new title') --}}
<title>@yield('title', 'Default Title')</title>

{{-- styles --}}
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/footer/footer.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/header/header.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/header/greetings.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

{{-- images / icons --}}
<link rel="icon" type="image/x-icon" href="{{ URL::asset('assets/ico/main.ico') }}">

{{-- popups --}}
<link rel="stylesheet" href="{{ URL::asset('css/cookies/cookie_popup.css') }}">
