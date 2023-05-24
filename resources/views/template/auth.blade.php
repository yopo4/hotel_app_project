<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/logo/sip.png') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js"
        integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.0.1/css/countrySelect.min.css" />

        <script src="{{ asset('js/countrypicker.min.js') }}"></script>
        <script src="{{ asset('js/country.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.1.1/js/countrySelect.min.js"
        integrity="sha512-criuU34pNQDOIx2XSSIhHSvjfQcek130Y9fivItZPVfH7paZDEdtAMtwZxyPq/r2pyr9QpctipDFetLpUdKY4g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/sass/app.scss')
    <title>@yield('title')</title>
</head>

<body>
    <main>
        <div>
            @yield('content')
        </div>
    </main>
    @vite('resources/js/app.js')
</body>

</html>
