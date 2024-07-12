<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

{{-- to change title of a page, use ---> @section('title', 'new title') --}}
<title>@yield('title', 'Default Title')</title>

{{-- styles --}}
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/footer/footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/header/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/register/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">

