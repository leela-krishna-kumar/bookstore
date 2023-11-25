<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        @include('layouts.head')
        <link rel="stylesheet" href="{{ asset('css/cards.css') }}">

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
                @livewire('book')
            </main>

        </div>

    </body>

    @include('book_add_modal')

    @include('book_update_modal')


    @include('layouts.scripts')

</html>
