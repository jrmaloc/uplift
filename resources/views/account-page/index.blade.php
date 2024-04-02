@extends('layouts.account')

@section('head')
    <title>Home | Uplift</title>
    <style>
        .focused {
            border-radius: 0.375rem;
            border: 1px solid #696bff !important;
        }
    </style>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-5 ml-auto">
            <h3 class="h3 ml-4 mt-4 fw-bolder">Activity Feed</h3>
            <div class="mx-auto">
                <div class="flex">
                    <span class="input-group-text border-0"
                        style="
                    border-bottom-left-radius: 0px;
                    border-top: 1px solid #d9dee3 !important;
                    border-left: 1px solid #d9dee3 !important;
                    border-top-right-radius: 0px;
                    ">
                        <img src="{{ URL::asset('assets/img/avatars/1.png') }}" alt="" class="rounded-full"
                            style="width: 70px; aspect-ration: 1;"></span>
                    <div class="w-100">
                        <input type="text" class="form-control input-field border-0 pt-4" placeholder="Caption..."
                            style="
                    border-top: 1px solid #d9dee3 !important;
                    border-right: 1px solid #d9dee3 !important;
                    border-bottom: 0px !important;
                    border-top-left-radius: 0px;
                    border-bottom-right-radius: 0px;
                    font-weight: bold;
                    font-size: 20px;">
                        <div class="input-overlay"></div>
                        <textarea class="form-control pt-4 input-field rounded-0 border-0" rows="4" aria-label="With textarea"
                            placeholder="Lorem Ipsum..."
                            style="
                    border-right: 1px solid #d9dee3 !important;
                    min-height: 150px;"></textarea>
                    </div>
                </div>
                <div class="bg-indigo-100 px-2 py-3"
                    style="border-bottom-left-radius: 0.375rem; border-bottom-right-radius: 0.375rem;">
                    <div class="flex justify-end">
                        <button class="btn btn-primary post-btn">Post!</button>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                @foreach ($posts as $post)
                    <div class="card px-8 pt-6 pb-4 mb-4 mx-auto">
                        <div class="flex flex-col items-start mb-4">
                            <div class="flex justify-between align-items-center w-100">
                                <h2 class="text-xl font-bold text-gray-700">
                                    {{ $post->caption }}
                                </h2>
                                <div class="btn-group">
                                    <button type="button" class="btn-icon dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end mt-1" style="">
                                        <li><a class="dropdown-item" href="javascript:void(0);">Edit</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <h5>
                                @php
                                    $user = App\Models\User::findOrFail($post->user_id);
                                @endphp
                                {{ $user->name }}
                            </h5>
                        </div>
                        <div>
                            <p class="text-gray-700 text-base">
                                {{ $post->description }}
                            </p>
                        </div>
                        <div class="mt-4 px-2">
                            <style>
                                .heart {
                                    display: none;
                                }


                                .heart+label {
                                    position: relative;
                                    padding-left: 35px;
                                    display: inline-block;
                                    font-size: 14px;
                                }

                                .heart+label:before {
                                    content: "\1F5A4";
                                    top: -11px;
                                    left: -8px;
                                    border: 1px solid transparent;
                                    padding: 10px;
                                    border-radius: 3px;
                                    display: block;
                                    position: absolute;
                                    transition: .5s ease;
                                }



                                .heart:checked+label:before {
                                    border: 1px solid transparent;
                                    background-color: transparent;
                                }

                                .heart:checked+label:after {
                                    content: '\1F49C';
                                    font-size: 18px;
                                    position: absolute;
                                    top: -1px;
                                    left: 1px;
                                    color: rgb(130, 97, 252);
                                    transition: .5s ease;
                                }

                                .heart:checked+label {
                                    color: rgb(130, 97, 252);
                                }

                                .btn-outline-primary:hover {
                                    color: #5f61e6 !important;
                                    background-color: #fff !important;
                                    border-color: #5f61e6 !important;
                                    box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4) !important;
                                    transform: translateY(-1px) !important;
                                }

                                .btn-outline-info:hover {
                                    color: #03b0d4 !important;
                                    background-color: #fff !important;
                                    border-color: #03b0d4 !important;
                                    box-shadow: 0 0.125rem 0.25rem 0 rgba(3, 195, 236, 0.4) !important;
                                    transform: translateY(-1px) !important;
                                }

                                .btn-check:focus+.btn-outline-primary,
                                .btn-outline-primary:focus {
                                    color: #595cd9 !important;
                                    background-color: #fff !important;
                                    border-color: #595cd9 !important;
                                }

                                .btn-check:focus+.btn-outline-info,
                                .btn-outline-info:focus {
                                    color: #03b0d4 !important;
                                    background-color: #fff !important;
                                    border-color: #03b0d4 !important;
                                }

                                .heart,
                                .react {
                                    cursor: pointer;
                                }

                                a.dropdown-item:hover {
                                    color: var(--bs-dropdown-link-hover-color) !important;
                                }

                                ul.dropdown-menu.show {
                                    transform: translate(-15px, 25px) !important;
                                }

                                .dropdown-item:not(.disabled).active,
                                .dropdown-item:not(.disabled):active {
                                    background-color: var(--bs-dropdown-link-hover-bg);
                                    color: #8592a3 !important;
                                }

                                .dropdown-item.active,
                                .dropdown-item:active {
                                    color: var(--bs-dropdown-link-active-color);
                                    text-decoration: none;
                                    background-color: var(--bs-dropdown-link-active-bg);
                                }
                            </style>
                            @php
                                $id = $post->id;
                                $user_id = $auth->id;
                                $reactions = json_decode($post->reaction_count, true);

                                if ($reactions == null) {
                                    $reactions = [];
                                }

                                $included = in_array($user_id, $reactions);

                                $reactCount = count($reactions);
                            @endphp

                            <div class="btn-group flex justify-content-between mt-4" role="group"
                                aria-label="Basic example">
                                <button type="button" class="btn btn-outline-primary post-react-btn"
                                    id="{{ $post->id }}" style="max-width: 50%;">
                                    <input type="checkbox" class="heart" {{ $included ? 'checked' : '' }}
                                        id="heart{{ $post->id }}" />
                                    <label class="react text-sm" for="heart{{ $post->id }}"><span
                                            id="post_reaction_count{{ $post->id }}">{{ $reactCount }}</span></label>
                                </button>
                                <button type="button" class="btn btn-outline-info" id="{{ $post->id }}"
                                    data-bs-toggle="collapse" href="#collapse{{ $post->id }}" role="button"
                                    aria-expanded="false" aria-controls="collapse{{ $post->id }}"
                                    style="max-width: 50%;">
                                    Comment
                                    {{-- <span class="bx bx-error ml-1"></span> --}}
                                </button>
                            </div>

                            <div class="flex justify-end mt-4 gap-1">
                                <span class="badge rounded-pill bg-label-primary">Primary</span>
                                <span class="badge rounded-pill bg-label-info">Danger</span>
                                <span class="badge rounded-pill bg-label-warning">Info</span>
                            </div>

                            {{-- Comment Drawer --}}
                            <div class="collapse multi-collapse" data-id="{{ $post->id }}"
                                id="collapse{{ $post->id }}">
                                <ul id="append{{ $post->id }}" class="bg-gray-50 mt-1 rounded-md"
                                    style="max-height: 420px; overflow: auto;">

                                </ul>
                                <form action="" id="commentForm">
                                    @csrf
                                    <div id="commentField{{ $post->id }}" data-id="{{ $post->id }}"
                                        class="">
                                        <div class="input-group mt-8 mb-3">
                                            <textarea class="form-control" aria-label="With textarea" name="comment" placeholder="Something you want to say..."></textarea>
                                            <span class="input-group-text send-btn text-sm btn btn-primary">Send!</span>
                                        </div>
                                    </div>
                                </form>
                                <form action="" id="editCommentForm">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-3 mr-20">
            <div class="card">
                <h3 class="card-header h3">Hello World</h3>
            </div>
        </div>
    </div>

    <style>
        .cancel:hover {
            color: rgb(209, 61, 61) !important;
            pointer-events: auto !important;
            cursor: pointer;
        }

        .commentDropdown {
            inset: -2.5rem auto auto 17rem !important;
        }

        .x-btn {
            position: relative;
            left: 27rem;
            bottom: 2.375rem;
        }

        .report-btn:focus {
            color: #e6381a;
            background-color: #fff;
            border-color: #e6381a;
            box-shadow: none;
            transform: translateY(0);
        }
    </style>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.input-field').focus(function() {
                $(this).closest('.flex').addClass('focused');
            });

            $('.input-field').blur(function() {
                $(this).closest('.flex').removeClass('focused');
            });

            var post_id = {{ $post->id }};
            // Post Reactions
            $(document).on('click', '.post-react-btn', function(e) {
                var id = $(this).attr('id');
                var userId = {{ $auth->id }};

                $('#heart' + id).prop('checked', function(i, currentValue) {
                    $.ajax({
                        url: "{{ route('posts.store') }}",
                        method: "POST",
                        data: {
                            id: id,
                            value: !currentValue,
                            data: 'react',
                            userId: userId,
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                $('#post_reaction_count' + id).html(response
                                    .reactCount);
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });

                    return !currentValue;
                });
            });

            // Comment Show
            $(document).on('show.bs.collapse', '.collapse', function() {
                var id = $(this).data('id'); // Get the data-id attribute value
                var ul = $('#append' + id);
                ul.scrollTop(ul.prop("scrollHeight"));

                $.ajax({
                    url: "{{ route('home.index') }}",
                    method: "GET",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log();
                        if (response.comments.length > 0) {
                            response.comments.forEach(comment => {
                                let showViewUser = comment.user.id ==
                                    {{ $auth->id }};

                                let createdAt = moment(comment.created_at);
                                let timeAgo = createdAt.fromNow();

                                var test = comment.user.avatar;

                                let avatarUrl = test ? "{{ URL::asset(':avatar') }}"
                                    .replace(':avatar', test) :
                                    "{{ URL::asset('assets/img/avatars/5.png') }}";

                                console.log();


                                let commentHtml = `
                                    <li class="d-grid p-3 mt-2">
                                        <div class="flex align-items-center">
                                            <img src="${avatarUrl}" alt="collapse-image" class="me-4 mb-sm-0 mb-2" height="125"
                                                style="max-width: 10%; border-radius: 50%; aspect-ratio: 1/1;" />
                                            <div class="flex flex-col">
                                                <span class="font-semibold">${comment.user.name}</span>
                                                <span class="text-muted text-xs">${timeAgo}</span>
                                            </div>
                                        </div>

                                        <div class="relative" id="btn-toggle${comment.id}">
                                            <button id="${comment.id}" type="button">
                                                <i class="x-btn${comment.id} bx bx-x cancel d-none" postId="${comment.post_id}" style="
                                                        position: relative;
                                                        left: 26.75rem;
                                                        bottom: 2.5rem;">
                                                </i>
                                            </button>
                                            <button type="button" class="btn dropdown-toggle hide-arrow rounded-pill" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="burger${comment.id} bx bx-dots-horizontal-rounded hover:text-indigo-400"
                                                    style="
                                                        position: relative;
                                                        left: 25.25rem;
                                                        bottom: 2.5rem;">
                                                </i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-menu-end commentDropdown">
                                                ${showViewUser ? '<li><a data-id="'+ comment.post_id +'" id="' + comment.id +'" class="dropdown-item edit-btn" href="javascript:void(0);">Edit</a></li><li><a id="' + comment.id +'" class="dropdown-item delete-btn" href="javascript:void(0);">Delete</a></li>' : '<li><a id="' + comment.user.id +'" class="dropdown-item view-btn" href="javascript:void(0);">View User</a></li>'}
                                            <!--- <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li> -->
                                            </ul>
                                        </div>
                                        <span class="spanEdit" id="commentbody${comment.id}">${comment.comments}</span>
                                        <div class="input-group d-none" id="editInputGroup${comment.id}">
                                            <input type="text" class="form-control" id="editInput${comment.id}" name="editInput" autofocus>
                                            <button class="btn btn-primary update-btn" type="button" data-id="${comment.post_id}" id="${comment.id}">Save!</button>
                                        </div>

                                        <div class="btn-group flex justify-content-between mt-4" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-outline-primary comment-react-btn" id="${comment.id}" style="max-width: 50%;">
                                                <input type="checkbox" class="heart" id="comment${comment.id}" ${comment.included ? 'checked' : ''}/>
                                                <label class="react text-sm" id="comment_reaction_count${comment.id}" for="comment${comment.id}">${comment.reaction_count}</label>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger report-btn" style="max-width: 50%;">Report <span class="bx bx-error ml-1"></span></button>
                                        </div>
                                    </li>`;
                                // Append the comment HTML to the comment_group element
                                $('#append' + id).append(commentHtml);
                            });

                            $('#commentField' + id).html(`
                                <div class="input-group mt-2 mb-3" id="createGroup">
                                    <textarea class="form-control" id="textarea_${response.comments[0].post_id}" aria-label="With textarea" placeholder="Something you want to say..."></textarea>
                                    <span class="input-group-text send-btn text-sm btn btn-primary">Send!</span>
                                </div>
                            `);
                        } else {
                            $('#append' + id).html(
                                '<li class="d-flex justify-center p-3 mt-4 alert alert-success"><span class="bx bx-loader mr-2"></span>No Comments.</li>'
                            );
                        }

                        ul.scrollTop(ul.prop("scrollHeight"));
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            // Comment Creation
            $(document).on('click', '.send-btn', function(e) {
                e.preventDefault();
                var id = $(this).parent().parent().data('id');
                var comment = $(this).parent().parent().parent().find('textarea').val();
                var textarea = $(this).closest('.input-group').find('textarea');
                var ul = $('#append' + id);

                $.ajax({
                    url: "{{ route('comments.store') }}",
                    method: "POST",
                    data: {
                        post_id: id,
                        comment: comment,
                        data: 'comment'
                    },
                    success: function(response) {
                        let commentHtml = `
                            <li class="d-grid p-3 mt-2">
                                <div class="flex align-items-center">
                                    <img src="{{ URL::asset('${response.user.avatar}') }}" alt="collapse-image" class="me-4 mb-sm-0 mb-2" height="125" style="max-width: 10%; border-radius: 50%; aspect-ratio: 1/1;" />
                                    <span class="font-semibold">${response.user.name}</span>
                                </div>

                                <div class="relative" id="btn-toggle${response.comments.id}">
                                    <button id="${response.comments.id}" type="button">
                                        <i class="x-btn${response.comments.id} bx bx-x cancel d-none" postId="${comment.post_id}" style="
                                                position: relative;
                                                left: 28.75rem;
                                                bottom: 2.5rem;">
                                        </i>
                                    </button>
                                    <button type="button" class="btn dropdown-toggle hide-arrow rounded-pill" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="burger${response.comments.id} bx bx-dots-horizontal-rounded hover:text-indigo-400"
                                            style="
                                                position: relative;
                                                left: 27.25rem;
                                                bottom: 2.5rem;">
                                        </i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end commentDropdown">
                                        <li>
                                            <a data-id="${response.post_id}" id="${response.comments.id}" class="dropdown-item edit-btn"
                                                href="javascript:void(0)">
                                                    Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a id="${response.comments.id}" class="dropdown-item delete-btn"
                                            href="javascript:void(0);">
                                                Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <span class="spanEdit" id="commentbody${response.comments.id}">${response.comments.comments}</span>
                                <div class="input-group d-none" id="editInputGroup${response.comments.id}">
                                    <input type="text" class="form-control" id="editInput${response.comments.id}" name="editInput" autofocus>
                                    <button class="btn btn-primary update-btn" type="button" data-id="${response.post_id}" id="${response.comments.id}">Save!</button>
                                </div>

                                <div class="btn-group flex justify-content-between mt-4" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-primary comment-react-btn" id="${response.comments.id}" style="max-width: 50%;">
                                        <input type="checkbox" class="heart" id="comment${response.comments.id}"/>
                                        <label class="react text-sm" id="comment_reaction_count${response.comments.id}" for="comment${response.comments.id}">0</label>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" style="max-width: 50%;">Report <span class="bx bx-error ml-1"></span></button>
                                </div>
                            </li>`;

                        // Append the comment HTML to the comment_group element
                        $('#append' + response.post_id).append(commentHtml);

                        // Clear the textarea value
                        textarea.val('');

                        // scroll to the bottom of the comments
                        ul.scrollTop(ul.prop("scrollHeight"));

                        butterup.toast({
                            title: 'Success!',
                            message: 'Comment has been posted.',
                            type: 'success',
                            icon: true,
                            dismissable: true,
                        });

                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })

            // Comment Reactions
            $(document).on('click', '.comment-react-btn', function(e) {
                var id = $(this).attr('id');
                var userId = {{ $auth->id }};

                $('#comment' + id).prop('checked', function(i, currentValue) {

                    $.ajax({
                        url: "{{ route('comments.store') }}",
                        method: "POST",
                        data: {
                            id: id,
                            value: !currentValue,
                            data: 'react',
                            userId: userId,
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                $('#comment_reaction_count' + id).html(response
                                    .reactCount);
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });

                    return !currentValue;
                });
            });

            // Comment Delete
            $(document).on('click', '.delete-btn', function(e) {
                var target = $(this).parent().parent().parent().parent();
                var commentId = $(this).attr('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete Comment",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('comments.destroy', [':id']) }}".replace(':id',
                                commentId),
                            method: "DELETE",
                            data: {
                                data: 'delete'
                            },
                            success: function(response) {

                                if (response.status) {
                                    Swal.fire('Removed!', response.message, 'success')
                                        .then(
                                            result => {
                                                if (result.isConfirmed) {
                                                    target.addClass('d-none');
                                                    butterup.toast({
                                                        title: 'Success!',
                                                        message: 'Your comment has been deleted.',
                                                        type: 'success',
                                                        icon: true,
                                                        dismissable: true,
                                                    });
                                                }
                                            })
                                }
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        })
                    }
                });
            });

            // Comment Edit
            $(document).on('click', '.edit-btn', function(e) {
                // comment id
                var id = $(this).attr('id');
                var postId = $(this).data('id');

                console.log(id, postId);

                // span comment
                var comment = $('#commentbody' + id).text();

                $('.spanEdit').removeClass('d-none');
                $('.cancel').addClass('d-none');
                $('.bx-dots-horizontal-rounded').removeClass('d-none');
                $('.input-group').addClass('d-none');
                $('#createGroup').removeClass('d-none');


                $('.burger' + id).addClass('d-none');
                $('.x-btn' + id).removeClass('d-none');
                $('#commentbody' + id).addClass('d-none');
                $('#editInputGroup' + id).removeClass('d-none');
                $('#editInput' + id).val(comment);
                $('#editInput' + id).focus();
            });

            // Comment Update Cancel
            $(document).on('click', '.cancel', function(e) {
                var postId = $(this).attr('postId');
                console.log();

                $('.bx-dots-horizontal-rounded').removeClass('d-none');
                $('.input-group').addClass('d-none');
                $('.spanEdit').removeClass('d-none');
                $('.cancel').addClass('d-none');
                $('.burger').removeClass('d-none');
                $('#createGroup').removeClass('d-none');
            });

            // Comment Update
            $(document).on('click', '.update-btn', function(e) {
                var id = $(this).attr('id');
                var postId = $(this).attr('data-id');
                var comment = $('#editInput' + id).val();

                $.ajax({
                    url: "{{ route('comments.update', [':id']) }}".replace(':id', id),
                    method: "PUT",
                    data: {
                        comment: comment,
                        data: 'update'
                    },
                    success: function(response) {

                        $('.burger' + id).removeClass('d-none');
                        $('.x-btn' + id).addClass('d-none');
                        $('#commentbody' + id).removeClass('d-none');
                        $('#editInputGroup' + id).addClass('d-none');
                        $('#commentbody' + id).text(response.comment);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            // Comment Report
            $(document).on('click', '.report-btn', function(e) {
                butterup.toast({
                    title: 'Report Submitted!',
                    message: 'We will now review your report. Thank you for making this platform safe.',
                    type: 'info',
                    icon: true,
                    dismissable: true,
                })
            });
        });
    </script>
@endpush
