<div class="modal fade bd-example-modal-xl" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>





            <div class="modal-body">
                <label><b>Upload CSV</b></label>


                <form method="post" action="{{ url('post-add-book') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">


                        <div class="col-md-7">
                            {{-- <label><b>Upload CSV</b></label> --}}
                            <input class="block mt-1 w-full" name='books_csv_file' placeholder='Image' accept=".csv" type='file' value='' required/>
                        </div>

                        <div class="col-md-5">
                            <x-primary-button class="ml-3" type="submit">
                                Import Books
                            </x-primary-button>
                        </div>

                    </div>

                </form>

                <div style="padding: 20px;text-align: center" class="justify-content-center">
                    <span>OR</span>
                </div>

                <form action="javascript:void(0)" method="POST" id="add-book">

                {{-- <form method="post" action="{{ url('post-add-book') }}" enctype="multipart/form-data"> --}}
                    @csrf

                    <div class='post-body post-content' id='post-body'>
                        <div class="">
                            <label><b>Title</b></label>
                            <input class="block mt-1 w-full" name='title' placeholder='Title' maxlength="255" type='text' value='' required />
                        </div>

                        <div class="mt-4">
                            <label><b>Author</b></label>
                            <input class="block mt-1 w-full" name='author' placeholder='Author' maxlength="255" type='text' value='' required />
                        </div>

                        <div class="mt-4">
                            <label><b>Genre</b></label>
                            <input class="block mt-1 w-full" name='genre' placeholder='Genre' maxlength="255" type='text' value='' required />
                        </div>


                        <div class="mt-4">
                            <label><b>Image</b></label>
                            <input class="block mt-1 w-full" name='book_image' placeholder='Image' accept="image/png,image/jpg,image/jpeg" type='file' value='' required />
                        </div>

                        <div class="mt-4">
                            <label><b>Publisher</b></label>
                            <input class="block mt-1 w-full" name='publisher' placeholder='Publisher' maxlength="255" type='text' value='' required />
                        </div>

                        <div class="mt-4">
                            <label><b>Published on</b></label>
                            <input class="block mt-1 w-full" name='published' placeholder='Published on' maxlength="255" type='date' value='' required />
                        </div>


                        <div class="mt-4">
                            <label><b>Description</b></label>
                            <textarea class="form-control" name="description" rows="10" placeholder="Description" required></textarea>
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
                    Add Book
                </x-primary-button>
            </div>

            </form>
        </div>
    </div>
</div>



<script type="module">

                                                                $(document).ready(function($){

                                                                                                // on submit...
                                                                                                $('#add-book').submit(function(e){
                                                                                                e.preventDefault();


                                                                                                // ajax
                                                                                                $.ajax({
                                                                                                type:"POST",
                                                                                                url: "{{ url('post-add-book') }}",
                                                                                                data: $(this).serialize(), // get all form field value in serialize form
                                                                                                success: function(response){
                                                                                                $("#show_message").fadeIn();
                                                                                                //$("#ajax-form").fadeOut();

                                                                                                console.log(response);

                                                                                                $('#add-book')[0].reset();


                                                                                           //  location.reload();
                                                                                                },

                                                                                               error: function(response){
                                                                                            $("#show_message").fadeIn();
                                                                                            //$("#ajax-form").fadeOut();

                                                                                            // $('#user-add-form')[0].reset();



                                                                                            }
                                                                                                });
                                                                                                });
                                                                                                return false;
                                                                                                });
</script>
