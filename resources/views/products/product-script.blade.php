<script>
    $(document).ready(function(){
        // Create
        $(document).on('click', '#btn-create', function(e){
            e.preventDefault();
            $('.errorMessage').empty();
            var name = $('#name').val();
            var price = $('#price').val();
            $.ajax({
                url: "{{ route('product.create') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    name: name, 
                    price: price
                },
                success: function(res){
                    if(res.status=='success'){
                        $('#createProduct').modal('hide');
                        $('#createForm')[0].reset();
                        $('#tableProduct').load(location.href+' #tableProduct');
                        Command: toastr["success"]("Product has been created.", "Successfully!")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err){
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        $('.errorMessage').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }
            });
            return false;
        });
        // Show Edit
        $(document).on('click', '.update_product_form', function(){
            let id=$(this).data('id');
            let name=$(this).data('name');
            let price=$(this).data('price');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);
        })
        // Update
        $(document).on('click', '#btn-update', function(e){
            e.preventDefault();
            $('.errorMessage').empty();
            var up_id = $('#up_id').val();
            var up_name = $('#up_name').val();
            var up_price = $('#up_price').val();
            $.ajax({
                    url: "{{ route('product.update') }}",
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method:'PUT',
                        up_id:up_id,
                        up_name: up_name, 
                        up_price: up_price
                    },
                success: function(res){
                    if(res.status=='success'){
                        $('#updateProduct').modal('hide');
                        $('#updateForm')[0].reset();
                        $('#tableProduct').load(location.href+' #tableProduct');
                        Command: toastr["success"]("Product has been updated.", "Successfully!")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err){
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        $('.errorMessage').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }
            });
            return false;
        });
        // delete
        $(document).on('click', '#btn-delete', function(e){
            e.preventDefault();
            $('.errorMessage').empty();
            var product_id = $(this).data('id');
            if (confirm('Are you sure ?')) {
             $.ajax({
                url: "{{ route('product.delete') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    _method:'DELETE',
                    product_id:product_id,
                },
                success: function(res){
                    if(res.status=='success'){
                        $('#tableProduct').load(location.href+' #tableProduct');
                        Command: toastr["success"]("Product has been deleted.", "Successfully!")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err){
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        $('.errorMessage').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }
            });
            return false;   
            }
        });
        // Pagination
        $(document).on('click','.pagination a', function(e){
            e.preventDefault();
            let page=$(this).attr('href').split('page=')[1]
            product(page)
        })
        function product(page){
            $.ajax({
                url:"/pagination?page="+page,
                success:function(res){
                    $('.tabel-data').html(res);
                }
            })
        }
        // Searching
        $(document).on('keyup', function(e){
            e.preventDefault();
            let search_string=$('#search').val();
            $.ajax({
                url:"{{ route('product.search') }}",
                method:"GET",
                data:{
                    search_string:search_string
                },
                success:function(res){
                    $('.tabel-data').html(res);
                    if(res.status=='not_found'){
                        $('.tabel-data').html('<span class="text-center">Product <strong>' +search_string+ '</strong> Not Found.</span>')
                    }
                }
            })
        })
    });
</script>