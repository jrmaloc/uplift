@extends('layouts.app')

@section('head')
    <title>Posts</title>
    <style>
        td:nth-child(2), td:nth-child(4) {
            width: 400px !important;
            max-width: 400px !important;
            word-wrap: break-word;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endsection

@section('content')
    <div class="mt-8 mb-5 flex justify-between mx-2">
        <h1 class="h2">Posts Table</h1>
    </div>

    <div class="row mb-8">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-lg text-nowrap">
                        <table id="data-table" class="table table-hover" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Creator</th>
                                    <th>Type</th>
                                    <th>Privacy</th>
                                    <th>Timestamp</th>
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
                    data: 'caption',
                    name: 'post',
                },
                {
                    data: 'creator',
                    name: 'creator',
                    // render: function(data) {
                    //     return '<div class="badge rounded-pill bg-label-primary px-4 py-2">' + data + '</div>';
                    // }
                },
                {
                    data: 'tags',
                    name: 'tags',
                },
                {
                    data: 'privacy',
                    name: 'privacy',
                    render: function(data) {
                        if (data == 'public') {
                            return '<div class="badge rounded-pill bg-label-primary px-4 py-2">' + data + '</div>';
                        } else if (data == 'private') {
                            return '<div class="badge rounded-pill bg-label-dark px-4 py-2 border-1">' + data + '</div>';
                        }
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data, type, row) {
                        // Format the 'created_at' date using moment.js or any other library
                        if (type === 'display' && data !== null) {
                            return moment(data).format('MM-DD-YYYY'); // Replace with your desired format
                        }
                        return data; // Return the original data for sorting and other types
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
                    url: "{{ route('dashboard.posts.index') }}"
                },
                columns: columns,
                order: [
                    [0, 'desc'] // Sort by the first column (index 0) in descending order
                ]
            });
        }

        $(document).ready(function(e) {
            loadTable();
        });
    </script>
@endpush
