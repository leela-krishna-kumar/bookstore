<div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
        <div class="rounded-t mb-0 px-4 py-3 border-0">

            <div class="flex flex-wrap items-center">
                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <h3 class="text-base text-blueGray-700" style="font-weight: bold; font-size: 24px;">Book Store</h3>
                </div>
                <div class="text-right form-inline" wire:ignore>
                    <input class="sel" type="text" placeholder="Search..." wire:model="search">

                    @if (Auth::user()->account_type == 'admin')
                        <x-primary-button class="ml-3 sel" data-toggle="modal" data-target="#addBookModal">
                        + Add Book
                        </x-primary-button>
                    @endif
                </div>
            </div>


            <br />






        </div>

        <div class="d-flex justify-content-center" style="padding: 18px;">
            {!! $books_data->links() !!}
        </div>


        <div class="container">

            @if (!$books_data->isEmpty())
            @foreach ($books_data as $book)

            @php
                $hashids = new Hashids\Hashids();

              $book_id_hash =  $hashids->encode($book->id);
            @endphp


            <div class="card">
                <div class="card-header" onclick="window.location.href='book-details/{{$book_id_hash}}'" style="cursor: pointer;">
                    <img src="{{ asset($book['image']) }}" alt="rover" />
                </div>
                <div class="card-body">
                    <div>
                        <span class="tag tag-teal">{{$book['genre']}}</span>

                    @if (Auth::user()->account_type == 'admin')
                        <div style="float: right;  position: absolute;  right: 0; top:234px">
                            <button type="submit" class="btn btn-icon" data-toggle="modal" data-target="#updateBookModal-{{$book->id}}">
                                <i class="bi bi-pencil"></i>
                            </button>

                        <a class="btn btn-icon delete-confirm" href="{{ url('delete-book/' . $book_id_hash) }}">
                            <i class="bi bi-trash3"></i>
                        </a>
                    </div>
                    @endif

                </div>

                            <h3 style="font-weight: bold">
                                {{ ucfirst($book['title']) }}
                            </h3>
                            <p>
                                {{$book['description']}}
                            </p>
                            <div class="user">
                                {{-- <img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user" /> --}}
                                <div class="user-info">
                                    <h5>{{$book['author']}}</h5>
                                    <small>{{$book['publisher']}},</small>
                                    <small>{{$book['published']}}</small>
                                </div>
                            </div>
                </div>
            </div>
            @endforeach

            @else

                <p class="text-center">No related book information</p>
            @endif

        </div>

        <div class="d-flex justify-content-center" style="padding: 30px;">
            {!! $books_data->links() !!}
        </div>








        {{-- <div class="block w-full overflow-x-auto">
                    <table class="items-center bg-transparent w-full border-collapse ">
                        <thead>
                            <tr>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Article name
                                </th>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Content
                                </th>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Author
                                </th>
                        </thead>

                        <tbody>
                            @if (!$books_data->isEmpty())
                            @foreach ($books_data as $article)

                            <tr>
                                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                    {{$article->title}}
        </th>
        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
            {{$article->genre}}
        </td>
        <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
            {{$article->author}}
        </td>
        </tr>
        @endforeach
        @else
        <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
            No Results Found
        </td>
        @endif
        </tbody>

        </table>
    </div> --}}
</div>


</div>
