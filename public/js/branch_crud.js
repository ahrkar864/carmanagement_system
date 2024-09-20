$(document).ready(function() {

    $(document).on('click', '#openModal', function() {
        $('#formData')[0].reset(); 
        $('#formId').val('');
        $('#formMethod').val('POST'); 
        $('.error-text').empty(); 
        $('#branchModal').show();
    });
    
    
    $(document).on('click', '.editModal', function() {
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: `/admin/branches/${id}/edit`,
            dataType: "json",
            success: function(res) {
                $('#branch_code').val(res.branch_code);
                $('#branch_name').val(res.branch_name);
                $('#branch_short_name').val(res.branch_short_name);
                $('#branch_address').val(res.branch_address);
    
                $('#formMethod').val('PUT');
                $('#formId').val(id);
                $('.error-text').empty();
                $('#branchModal').show();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
    
    
    $('#formData').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        let formData = new FormData(form[0]);
    
        let method = $('#formMethod').val();
        let id = $('#formId').val();
        let actionUrl = (method === 'POST') ? '/admin/branches' : `/admin/branches/${id}`;
        
        if (method === 'PUT') {
            formData.append('_method', 'PUT');
        }
    
    
        $.ajax({
            url: actionUrl,
            type: 'POST', 
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.success 
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                $('.error-text').empty();
                $.each(errors, function(field, messages) {
                    $('#' + field + 'Error').text(messages[0]);
                });
            }
        });
    });
    
    
    
    $(document).on('click', '.deleteModal', function() {
        let id = $(this).data('id'); 
        let url = $(this).data('url'); 
        Swal.fire({
            icon: 'warning',
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url, 
                    method: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), 
                    },
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            'Your item has been deleted.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Error!',
                            'Something went wrong. Please try again.',
                            'error'
                        );
                    }
                });
            }
        });
    });

});



// });



