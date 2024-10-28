<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title', 'Landing Page')</title>
    @php
    $dinas = \App\Models\Dinas::find(1); // Ganti '1' dengan ID yang sesuai
    $logo = $dinas->logo; // Default logo jika tidak ditemukan
    @endphp
    <link rel="icon" type="image/x-icon" href="{{ asset('images/' . $logo)  }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet">
    <link href="{{ asset('assets/landing_page/css/styles.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    @include('layouts.front.header')
    @yield('content')
    @include('layouts.front.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/landing_page/js/scripts.js') }}"></script>
</body>
</html>
