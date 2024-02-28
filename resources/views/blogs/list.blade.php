<title>Click Invitations - Users</title>
@include('header');
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Users</h4>                          
                            <a type="button" class="btn btn-primary ml-auto" href="{{ route('blog.create') }}">
                                <i data-feather="plus"></i>Add
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Short Description</th>
                                            <th>Page Title</th>
                                            <th>Meta Tag</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $value)
                                            <tr class="text-center">
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->title }} </td>
                                                <td>{{ $value->slug }}</td>
                                                <td>{{ $value->short_description }}</td>
                                                <td>{{ $value->page_title }}</td>
                                                <td>{{ $value->meta_tag }}</td>
                                                <td class="d-flex justify-content-center align-items-center">
                                                    {{-- <a href="#" onclick="getuserDatafromDB('{{ $value->id }}')"
                                                        data-id="{{ $value->id }}" data-toggle="modal"
                                                        data-target=".bd-example-modal-lg"
                                                        class="btn btn-primary">Details</a> --}}
                                                           <a href="{{ route('blog.show', $value->slug) }}"class="btn btn-primary ml-2"  target="_blank">Details</a>
                                                    <button type="button" data-id="{{ $value->id }}"
                                                        onclick="deleteUserfromDB('{{ $value->id }}')"
                                                        class="btn btn-danger ml-2 text-white delete">Delete</button>
                                                        <a href="{{ route('blog.edit', $value->slug) }}" class="btn btn-secondary ml-2" target="_blank">Edit</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Delete Modal --}}

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" id="deleteModal"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel" style="color:black ">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this user?</p>
                <input type="hidden" id="delete_id">
                <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">No</button>
                <button type="button" id="deletebtn" class="btn btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>


@include('footer')

<script>
    $('#adduser').submit(function() {
        swal({
            title: 'Success',
            icon: 'success',
            text: 'New User Added',
        })
    })

    function deleteUserfromDB(id) {
        $('#delete_id').val(id);
        $('#deleteModal').modal('show');
    }

    $('#deletebtn').click(function() {
        var UserId = $('#delete_id').val();
        $(this).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        );
        $.ajax({
            url: "{{ route('blog.delete') }}",
            type: "DELETE",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            data: {
                id: UserId
            },
            success: function(data) {
                console.log(data);
                $('#deleteModal').modal('hide');
                window.location.reload();
            },
            error: function(data) {
                console.log(data);
                $('#deleteModal').modal('hide');
                alert('Failed to delete user.');
            }
        });
    });
</script>

<style>
    button svg {
        height: 15px;
        width: 15px;
        margin-right: 5px;
    }
</style>
