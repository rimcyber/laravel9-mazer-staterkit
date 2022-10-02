<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/logo/favicon.png') }}" type="image/png">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>

<body>
    <div id="app">
        @include('backend.layouts.sidebar')

        <div id="main" class='layout-navbar'>
            @include('backend.layouts.header')
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                    </div>
                    {{ $slot }}
                </div>

                @include('backend.layouts.footer')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @stack('scripts')
    <script>
        @if (Session::has('success'))
            Toastify({
                text: "{{ Session::get('success') }}",
                duration: 4000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "center",
            }).showToast();
        @endif
    </script>
</body>

</html>
