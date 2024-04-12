@extends('layouts.app')

@section('head')
    <title>Role</title>
@endsection

@section('content')
    <x-off-canvas id="editRoleOffcanvas" title="Role Details">
        <form id="editRoleForm">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" name="name" readonly class="form-control" type="text" value="">
            </div>

            <div class="mb-3">
                <label for="permissions" class="form-label">Permissions</label>
                <select class="form-select" id="permissions" multiple="multiple" name="permissionSelect">
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->name }}" id="{{ $permission->name }}">{{ $permission->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-10 flex justify-end gap-2">
                <button type="submit" id="save-btn" class="btn btn-primary">Save</button>
                {{-- <button type="button" id="cancel-btn" class="btn btn-secondary">Cancel</button> --}}
            </div>
        </form>
    </x-off-canvas>

    <x-off-canvas id="newRoleOffcanvas" title="Update User Roles">
        <form action="" id="updateUserRoleForm">
            @csrf
            @php
                $users = \App\Models\User::all();
            @endphp

            <div class="mb-3">
                <label for="addName" class="form-label">Name</label>
                <select class="form-control" id="addName" required name="addNameSelect">
                    <option value=""></option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="addRole" class="form-label">Roles</label>
                <select class="form-select" id="addRole" required name="addRoleSelect">
                    <option value=""></option>
                    @foreach ($roles as $data => $role)
                        <option value="{{ $role->id }}" id="{{ $role->id }}_{{ $role->name }}">
                            {{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="addPermissions" class="form-label">Permissions</label>
                <select class="form-select" id="addPermissions" required multiple="multiple" name="addPermissionSelect">
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->name }}" id="{{ $permission->name }}_8">{{ $permission->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-10 flex justify-end gap-2">
                <button type="submit" id="test" class="btn btn-primary">Create!</button>
                {{-- <button type="button" id="cancel-btn" class="btn btn-secondary">Cancel</button> --}}
            </div>
        </form>
    </x-off-canvas>


    <div class="mt-8 mb-5 flex justify-between mx-2">
        <h1 class="h2">Roles Table</h1>
    </div>
    <div class="flex justify-end mb-3">
        <a class="btn btn-primary flex justify-center align-items-center py-2 px-3 border-0" data-bs-toggle="offcanvas"
            href="#newRoleOffcanvas" role="button" aria-controls="newRoleOffcanvas">
            Update User Roles<span class="mdi mdi-plus ml-2"></span>
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
                                    <th>Role</th>
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
                    name: 'id',
                    width: '10%'
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'role',
                    name: 'role',
                    render: function(data) {
                        var roleName = '';
                        if (data == 'user') {
                            roleName +=
                                '<div class="border py-2 px-4 badge rounded-pill bg-label-info border-info"><span>' +
                                data + '</span></div>';
                        } else if (data == 'admin') {
                            roleName += '<div class="border badge py-2 px-4 rounded-pill bg-label-warning"><span>' +
                                data + '</span></div>';
                        } else if (data == 'super-admin') {
                            roleName += '<div class="border badge py-2 px-4 rounded-pill bg-label-primary"><span>' +
                                data + '</span></div>';
                        }
                        return roleName
                    }
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    width: '10%',
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
                    url: "{{ route('dashboard.roles.index') }}"
                },
                columns: columns,
                order: [
                    [0, 'desc'] // Sort by the first column (index 0) in descending order
                ]
            });
        }

        $(document).ready(function(e) {
            loadTable();
            var permissionSelect = $('#permissions').select2({
                placeholder: {
                    id: '-1',
                    text: 'Select a permission'
                },
                dropdownParent: $('#editRoleOffcanvas'),
                multiple: true,
            });

            var addName = $('#addName').select2({
                placeholder: "Select a User",
                dropdownParent: $('#newRoleOffcanvas'),
                allowClear: true,
            });

            var addRole = $('#addRole').select2({
                placeholder: "Select a Role",
                dropdownParent: $('#newRoleOffcanvas'),
                allowClear: true,
            });

            var addPermissions = $('#addPermissions').select2({
                placeholder: {
                    id: '-1',
                    text: 'Select a permission'
                },
                dropdownParent: $('#newRoleOffcanvas'),
                multiple: true,
            });

            $(document).on('change', '#addRole', function(e) {
                var id = $(this).val();

                $.ajax({
                    url: "{{ route('dashboard.roles.store') }}",
                    type: "POST",
                    data: {
                        roleID: id,
                        from: 'input'
                    },
                    success: function(response) {
                        // Assuming you receive selected permissions in response
                        var selectedPermissions = response.permissions;
                        var permissionSelect = $('#addPermissions');

                        // Clear existing selections
                        permissionSelect.val(null).trigger('change');

                        // Accumulate selected permissions
                        var selectedOptions = selectedPermissions.map(function(permission) {
                            return permission.name;
                        });

                        // Set all accumulated permissions as selected
                        permissionSelect.val(selectedOptions).trigger('change');
                    },
                    error: function(response) {
                        console.log('Error:', response);
                    }
                });
            });

            $(document).on('click', '.edit-btn', function(e) {
                var id = $(this).attr('id');

                e.preventDefault();
                $('#editRoleOffcanvas').offcanvas('show');

                $.ajax({
                    url: "{{ route('dashboard.roles.update', [':role']) }}".replace(':role', id),
                    data: {
                        id: id,
                        from: 'show'
                    },
                    method: 'PUT',
                    success: function(response) {
                        $('#name').val(response.data.name);
                        $('#save-btn').attr('data-id', response.data.id);

                        // Assuming you receive selected permissions in response
                        var selectedPermissions = response.permissions;
                        var permissionSelect = $('#permissions');

                        // Clear existing selections
                        permissionSelect.val(null).trigger('change');

                        // Accumulate selected permissions
                        var selectedOptions = [];
                        selectedPermissions.forEach(function(permission) {
                            selectedOptions.push(permission.name);
                        });

                        // Set all accumulated permissions as selected
                        permissionSelect.val(selectedOptions).trigger('change');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })

            $(document).on('submit', '#editRoleForm', function(e) {
                e.preventDefault();
                var id = $('#save-btn').attr('data-id');
                var selectedPermissions = $('#permissions').val();

                $.ajax({
                    url: "{{ route('dashboard.roles.update', [':role']) }}".replace(':role', id),
                    data: {
                        data: selectedPermissions,
                        id: id,
                        from: 'edit'
                    },
                    method: 'PUT',
                    success: function(response) {
                        if (response.status === 200) {
                            $('#data-table').DataTable().destroy();
                            loadTable();

                            butterup.toast({
                                title: 'Success!',
                                message: 'Role updated successfully 🎉',
                                type: 'success',
                                icon: true,
                                dismissable: true,
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $(document).on('submit', '#updateUserRoleForm', function(e) {
                e.preventDefault();
                var selectedPermissions = $('#addPermissions').val();
                var selectedUser = $('#addName').val();
                var selectedRole = $('#addRole').val();

                $.ajax({
                    url: "{{ route('dashboard.roles.store') }}",
                    type: "POST",
                    data: {
                        permissions: selectedPermissions,
                        userID: selectedUser,
                        roleID: selectedRole,
                        from: 'save'
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            $('#data-table').DataTable().destroy();
                            loadTable();

                            $('#newRoleOffcanvas').offcanvas('hide');

                            butterup.toast({
                                title: 'Success!',
                                message: 'Role created successfully 🎉',
                                type: 'success',
                                icon: true,
                                dismissable: true,
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
