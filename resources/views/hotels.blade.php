<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    @include('layouts.top-bar')
    @include('layouts.nav-bar')


    <div class="mt-5">
        @foreach ($hotels as $hotel)
            <p>{{ $hotel->name }}</p>
        @endforeach
    </div>




    <script>
        document.onscroll = (event) => {
            const navBar = document.querySelector('#navbar')
            const scrollThreshold = 66;
            if (window.scrollY > scrollThreshold) {
                navBar.classList.add('fixed', 'top-0', 'left-0', 'right-0')
                document.body.classList.add('pt-28')
            }

            if (window.scrollY < scrollThreshold) {
                navBar.classList.remove('fixed', 'top-0', 'left-0', 'right-0')
                document.body.classList.remove('pt-28')
            }
        }
    </script>
</body>

</html>
