$(document).ready(function() {
    $(document).on('click', '#openModal', function() {
        $('#formData')[0].reset(); 
        $('#formId').val('');
        $('#formMethod').val('POST'); 
        $('.error-text').empty(); 
        $('#userModal').show();
    });

    $(document).on('click', '.editModal', function() {
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: `/admin/users/${id}/edit`,
            dataType: "json",
            success: function(res) {
                let user = res.user;

                $('#p_required').remove();
                $('#pc_required').remove();

                console.log(user);
                $('#name').val(user.name);
                $('#employee_number').val(user.employee_number);
                $('#password').val(user.password);
                $('#password_confirmation').val(user.password);
                $('select[name="title"]').val(user.title).change();
                $('select[name="branch_id"]').val(user.branch_id).change();
                $('select[name="department_id"]').val(user.department_id).change();
                $('select[name="position_id"]').val(user.position_id).change();
                $('select[name="role_id"]').val(res.role_id).change(); // Set the role ID
                $('select[name="status"]').val(user.status).change();

  

                $('.error-text').empty();
                $('#formId').val(id);
                $('#formMethod').val('PUT');
                $('#userModal').show();
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
        let actionUrl = (method === 'POST') ? '/admin/users' : `/admin/users/${id}`;
    
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
                    // $('#branchModal').hide();
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
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.success 
                        }).then(() => {
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


