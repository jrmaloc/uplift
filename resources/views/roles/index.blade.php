@extends('layouts.app')

@section('head')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('content')
    <x-off-canvas id="editRoleOffcanvas" title="Role Details">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" name="name" class="form-control" type="text" value="">
        </div>

        <div class="mb-3">
            <label for="permissions" class="form-label">Example select</label>
            <select class="form-select" id="permissions">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </x-off-canvas>


    <div class="mt-8 mb-5 flex justify-between mx-2">
        <h1 class="h2">Roles Table</h1>
    </div>
    <div class="flex justify-end mb-3">
        {{-- <a class="btn btn-primary flex justify-center align-items-center py-2 px-3 border-0" data-bs-toggle="offcanvas"
            href="#offcanvasRight" role="button" aria-controls="offcanvasRight">
            Create New User<span class="mdi mdi-plus ml-2"></span>
        </a> --}}
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
                    url: "{{ route('roles.index') }}"
                },
                columns: columns,
                order: [
                    [0, 'desc'] // Sort by the first column (index 0) in descending order
                ]
            });
        }

        $(document).ready(function(e) {
            loadTable();
            $('#permissions').select2({
                placeholder: {
                    id: '-1', // the value of the option
                    text: 'Select a permission'
                },
                allowClear: true,
            });

            $(document).on('click', '.edit-btn', function(e) {
                var id = $(this).attr('id');
                console.log(id);
                e.preventDefault();
                $('#editRoleOffcanvas').offcanvas('show');

                $.ajax({
                    url: "{{ route('roles.update', [':role']) }}".replace(':role', id),
                    data: id,
                    method: 'PUT',
                    success: function(response) {
                        $('#name').val(response.data.name);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            })
        });
    </script>
@endpush
