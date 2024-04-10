@extends('layouts.app')

@section('head')
    <title>Users Management</title>

    <style>
        input.form-control.form-control-sm {
            border-radius: 0.375rem;
        }
    </style>
@endsection

@section('content')
    {{-- create user --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h3 id="offcanvasRightLabel" class="h4 offcanvas-title">User Creation Form</h3>
            <button type="button" class="btn-close text-reset flex justify-center align-items-center"
                data-bs-dismiss="offcanvas" aria-label="Close"><span class="bx bx-x text-2xl"></span></button>
        </div>
        <div class="offcanvas-body mt-8 mx-0 flex-grow-0">
            <form id="addUserForm">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="input-name">Full Name</label>
                    <div class="input-group input-group-merge">
                        <span id="input-name2" class="input-group-text"><i class="bx bx-user"></i></span>
                        <input type="text" name="name" class="form-control rounded-md" id="input-name"
                            value="{{ old('name') }}" placeholder="Juan Dela Cruz" autofocus autocomplete="name"
                            required />
                    </div>
                    @error('name')
                        <span class="text-danger text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="input-email">Email</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                        <input type="email" id="input-email" name="email" class="form-control rounded-md"
                            value="{{ old('email') }}" placeholder="example" autocomplete="email" required />
                    </div>
                    <div class="form-text text-xs">You can use letters, numbers & periods</div>
                    @error('email')
                        <span class="text-danger text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="input-username">Username</label>
                    <div class="input-group input-group-merge">
                        <span id="input-username2" class="input-group-text">@</span>
                        <input type="text" id="input-username" name="username" class="form-control rounded-md"
                            value="{{ old('username') }}" placeholder="jdelacruz" autocomplete="username" required />
                    </div>
                    @error('username')
                        <span class="text-danger text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="input-contact-number">Phone No</label>
                    <div class="input-group input-group-merge">
                        <span id="input-contact-number2" class="input-group-text"><i class="bx bx-phone"></i></span>
                        <input type="tel" id="input-contact-number" name="contact_number"
                            class="form-control phone-mask rounded-md" value="{{ old('contact_number') }}"
                            placeholder="0912 345 6789" autocomplete="tel" required />
                    </div>
                    @error('contact_number')
                        <span class="text-danger text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end gap-1 mt-4">
                    <button type="reset" class="btn btn-outline-info">Reset</button>
                    <button type="submit" class="btn btn-primary">Create <i
                            class="bx bx-right-arrow-alt ml-1"></i></button>
                </div>
            </form>
        </div>
    </div>

    {{-- edit user --}}
    <x-off-canvas id="editUserOffcanvas" title="Edit User">
        <form id="editUserForm">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="edit-name">Full Name</label>
                <div class="input-group input-group-merge">
                    <span id="input-name2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" name="name" class="form-control rounded-md" id="edit-name"
                        value="{{ old('name') }}" placeholder="Juan Dela Cruz" autofocus autocomplete="name" required />
                </div>
                @error('name')
                    <span class="text-danger text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="edit-email">Email</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                    <input type="email" id="edit-email" name="email" class="form-control rounded-md"
                        value="{{ old('email') }}" placeholder="example" autocomplete="email" required />
                </div>
                <div class="form-text text-xs">You can use letters, numbers & periods</div>
                @error('email')
                    <span class="text-danger text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="edit-username">Username</label>
                <div class="input-group input-group-merge">
                    <span id="input-username2" class="input-group-text">@</span>
                    <input type="text" id="edit-username" name="username" class="form-control rounded-md"
                        value="{{ old('username') }}" placeholder="jdelacruz" autocomplete="username" required />
                </div>
                @error('username')
                    <span class="text-danger text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="edit-contact-number">Phone No</label>
                <div class="input-group input-group-merge">
                    <span id="input-contact-number2" class="input-group-text"><i class="bx bx-phone"></i></span>
                    <input type="tel" id="edit-contact-number" name="contact_number"
                        class="form-control phone-mask rounded-md" value="{{ old('contact_number') }}"
                        placeholder="0912 345 6789" autocomplete="tel" required />
                </div>
                @error('contact_number')
                    <span class="text-danger text-xs">{{ $message }}</span>
                @enderror
            </div>

            <input type="text" class="d-none" name="id" hidden id="id">

            <div class="flex justify-end gap-1 mt-4">
                <button type="reset" class="btn btn-outline-info">Reset</button>
                <button type="submit" class="btn btn-primary update-btn">Update<i
                        class="bx bx-right-arrow-alt ml-1"></i></button>
            </div>
        </form>
    </x-off-canvas>

    {{-- title --}}
    <div class="mt-8 mb-2 flex justify-between mx-2">
        <h1 class="h2">Users Table</h1>
    </div>

    {{-- table --}}
    <div class="flex justify-end mb-3">
        <a class="btn btn-primary flex justify-center align-items-center py-2 px-3 border-0" data-bs-toggle="offcanvas"
            href="#offcanvasRight" role="button" aria-controls="offcanvasRight">
            Create New User<span class="mdi mdi-plus ml-2"></span>
        </a>
    </div>
    <div class="row mb-8">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-lg text-nowrap">
                        <table id="data-table" class="table table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Contact Number</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function loadTable() {
            let columns = [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'username',
                    name: 'username',
                },
                {
                    data: 'contact_number',
                    name: 'contact_number'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data) {
                        var btn = '';
                        if (data == 'active') {
                            btn +=
                                '<div><span class="px-3 py-1 text-green-600 text-capitalize border-1 rounded-full border-green-600 mt-1 mr-2">' +
                                data + '</span></div>'
                        } else {
                            btn +=
                                '<div><span class="px-3 py-1 text-danger text-capitalize border-1 rounded-full border-danger mt-1 mr-2">' +
                                data + '</span></div>'
                        }

                        return btn;
                    }
                },
                {
                    data: 'actions',
                    name: 'actions'
                },
            ];

            let table = $('#data-table').DataTable({
                processing: true,
                pageLength: 25,
                responsive: true,
                serverSide: true,
                scrollX: 460,
                scrollY: 500,
                ajax: {
                    url: "{{ route('users.index') }}"
                },
                columns: columns,
                order: [
                    [0, 'desc'] // Sort by the first column (index 0) in descending order
                ]
            });
        }

        $(document).ready(function() {
            loadTable();

            // add new user
            $('#addUserForm').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    data: formData,
                    type: "POST",
                    url: "{{ route('users.store') }}",
                    success: function(response) {
                        $('#offcanvasRight').offcanvas('hide');
                        $('#data-table').DataTable().destroy();
                        loadTable();

                        if (response.status == 200) {
                            butterup.toast({
                                title: 'Success!',
                                message: response.message,
                                type: 'success',
                                icon: true,
                                dismissable: false,
                            });
                        } else {
                            butterup.toast({
                                title: response.error,
                                message: response.message,
                                type: 'error',
                                icon: true,
                                dismissable: false,
                            });
                        }
                    }
                });
            });

            // show edit form
            $(document).on('click', '.edit-btn', function(e) {
                $('#editUserOffcanvas').offcanvas('show');

                var id = $(this).attr('id');

                $.ajax({
                    url: "{{ route('users.edit', [':id']) }}".replace(':id', id),
                    method: 'GET',
                    success: function(response) {
                        $('#edit-name').val(response.user.name);
                        $('#edit-email').val(response.user.email);
                        $('#edit-username').val(response.user.username);
                        $('#edit-contact-number').val(response.user.contact_number);
                        $('#id').val(response.user.id);

                        console.log();
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            });

            // edit user
            $(document).on('submit', '#editUserForm', function(e) {
                e.preventDefault();

                let formData = $(this).serialize();
                let id = $(this).find('[name="id"]').val();

                $.ajax({
                    url: "{{ route('users.update', [':id']) }}".replace(':id', id),
                    method: 'PUT',
                    data: formData,
                    success: function(response) {
                        if (response.status == 200) {
                            $('#editUserOffcanvas').offcanvas('hide');
                            $('#data-table').DataTable().destroy();
                            loadTable();

                            butterup.toast({
                                title: 'Success!',
                                message: response.message,
                                type: 'success',
                                icon: true,
                                dismissable: true,
                            });
                        } else if (response.status == 500) {
                            butterup.toast({
                                title: 'Heads Up!',
                                message: response.message,
                                type: 'warning',
                                icon: true,
                                dismissable: true,
                            });
                        } else {
                            butterup.toast({
                                title: 'Error!',
                                message: response.message,
                                type: 'error',
                                icon: true,
                                dismissable: true,
                            });
                        }
                    },
                    error: function(error) {
                        console.log('Error:', error);
                        butterup.toast({
                            title: 'Error!',
                            message: response.message,
                            type: 'error',
                            icon: true,
                            dismissable: true,
                        });
                    }
                });
            });

            // delete user
            $(document).on("click", ".remove-btn", function(e) {
                let id = $(this).attr("id");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Remove user from list",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('users.destroy', ['user' => ':id']) }}".replace(
                                ':id',
                                id),
                            method: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id
                            },
                            success: function(response) {
                                if (response.status) {
                                    Swal.fire('Removed!', response.message, 'success')
                                        .then(
                                            result => {
                                                if (result.isConfirmed) {
                                                    $('#data-table').DataTable()
                                                        .destroy();
                                                    loadTable();
                                                }
                                            })
                                }
                            }
                        })
                    }
                })
            });
        });
    </script>
@endpush
