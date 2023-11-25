@livewireScripts

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script src="{{ asset('/js/sweetalert.min.js') }}"></script>
<script>
    $('.delete-confirm').on('click', function (event) {
                            event.preventDefault();
                            const url = $(this).attr('href');
                            swal({
                                title: 'Are you sure?',
                                text: 'Permanantly Delete this record?',
                                icon: 'warning',
                                buttons: ["Cancel", "Yes!"],
                            }).then(function (value) {
                                if (value) {
                                    window.location.href = url;
                                }
                            });
                        });

</script>
