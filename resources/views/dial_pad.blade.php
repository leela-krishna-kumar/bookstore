<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta name="csrf-token" content="{{ csrf_token() }}" />

        @include('layouts.head')

        <link rel="stylesheet" href="{{ asset('css/dial_pad.css') }}">

        <title>Home | Book Store</title>

    </head>

    <body class="font-sans antialiased">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="min-h-screen bg-gray-100">

            @include('layouts.navigation')

            <main>
                @include('dial_pad_ui')
            </main>

        </div>

    </body>


    @include('layouts.scripts')

    <script src="{{ asset('/js/dial_pad.js') }}"></script>

</html>
