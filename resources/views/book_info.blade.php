<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('layouts.head')

        <link rel="stylesheet" href="{{ asset('css/cards.css') }}">

        <title>Book Information | Book Store</title>
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            @include('layouts.navigation')

            <!-- Page Heading -->
            {{-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                   Admin
                </div>
            </header> --}}

            <!-- Page Content -->
            <main>

                <div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4 mx-auto" style="padding-top: 60px;">

                    <div>

                        <address class="author">
                            <p>Home > Book Info</p>
                        </address>

                        <span class="blogdate">
                            <a href="{{ url()->previous() }}"><u>
                                    < Go Back</u></a>
                        </span>
                    </div>



                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded " style="justify-content: center;">

                        <div class="container">

                            <article>

                                <span class="tag tag-teal">{{$book['genre']}}</span>
                                <h1 style="">{{ ucfirst($book['title']) }}</h1>
                                <address class="author">By {{$book['author']}}</address>
                                <span class="blogdate">published by <strong>{{$book['publisher']}}</strong> on <strong>{{$book['published']}}</strong></span>

                                <center>
                                    <div class="" style="justify-content: center">
                                        <img src="{{ asset($book['image']) }}" alt="rover" />
                                    </div>
                                </center>

                                <h4 style="padding-top: 20px;">Description</h4>

                                <section class="content" style="padding: 10px;">
                                    <p>{{$book['description']}}</p>
                                </section>
                            </article>

                        </div>

                    </div>

                </div>

            </main>
        </div>
    </body>

    @livewireScripts

</html>
