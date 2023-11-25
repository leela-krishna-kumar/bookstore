@foreach ($books_data as $book)

<div class="modal fade bd-example-modal-xl" id="updateBookModal-{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Book Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="post" action="{{ url('post-update-book/'. $book->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class='post-body post-content' id='post-body'>
                        <div class="mt-4">
                            <label><b>Title</b></label>
                            <input class="block mt-1 w-full" name='title' placeholder='Title' maxlength="300" type='text' value='{{$book['title']}}' required />
                        </div>

                        <div class="mt-4">
                            <label><b>Author</b></label>
                            <input class="block mt-1 w-full" name='author' placeholder='Author' maxlength="300" type='text' value='{{$book['author']}}' required />
                        </div>

                        <div class="mt-4">
                            <label><b>Genre</b></label>
                            <input class="block mt-1 w-full" name='genre' placeholder='Genre' maxlength="300" type='text' value='{{$book['genre']}}' required />
                        </div>

                        <input type="hidden" name="book_image" value="{{ $book->image }}" />

                        <div class="mt-4">
                            <label><b>Image</b></label>
                            <input class="block mt-1 w-full" name='book_image' placeholder='Image' accept="image/png,image/jpg,image/jpeg" maxlength="300" type='file' value='{{ $book->image }}' />
                        </div>

                        <div class="mt-4">
                            <label><b>Publisher</b></label>
                            <input class="block mt-1 w-full" name='publisher' placeholder='Publisher' maxlength="300" type='text' value='{{$book['publisher']}}' required />
                        </div>

                        <div class="mt-4">
                            <label><b>Published on</b></label>
                            <input class="block mt-1 w-full" name='published' placeholder='Published on' maxlength="300" type='date' value='{{$book['published']}}' required />
                        </div>


                        <div class="mt-4">
                            <label><b>Description</b></label>
                            <textarea class="form-control" name="description" rows="10" placeholder="Description" required>{{$book['description']}}</textarea>
                        </div>


                    </div>



                    {{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                                                                                        $('.ckeditor').ckeditor();
                                                                                                    });
                                    </script> --}}

                    {{-- <script type="text/javascript">
                                        CKEDITOR.replace('wysiwyg-editor', {
                                                                                                            filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form'
                    });
                    </script> --}}

                </div>
                <div class="modal-footer">

                    <x-primary-button class="ml-3" type="submit">
                        Update Book
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</div>

@endforeach
