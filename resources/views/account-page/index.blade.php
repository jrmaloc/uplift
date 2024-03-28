@extends('layouts.account')

@section('head')
    <title>Home | Uplift</title>
    <style>

    </style>
@endsection

@section('content')
    <div class="mt-16">
        @foreach ($posts as $post)
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-4 mb-4 w-50 mx-auto">
                <div class="flex flex-col items-start mb-4">
                    <h2 class="text-xl font-bold text-gray-700">
                        {{ $post->caption }}
                    </h2>
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
                    </style>
                    {{-- <div class="border-t-2"></div>
                    <div class="flex justify-between mt-2 px-6">
                        <div>
                            <input type="checkbox" class="heart" data-id="{{ $post->id }}"
                                id="heart{{ $post->id }}" />
                            <label class="react text-sm" for="heart{{ $post->id }}">
                                Lorem
                            </label>
                        </div>
                        <a class="text-sm comment" id="{{ $post->id }}" data-bs-toggle="collapse"
                            href="#collapse{{ $post->id }}" role="button" aria-expanded="false"
                            aria-controls="collapse{{ $post->id }}">Comments
                        </a>
                    </div>
                    <div class="border-t-2 mt-1"></div> --}}
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

                    <div class="btn-group flex justify-content-between mt-4" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-primary post-react-btn" id="{{ $post->id }}"
                            style="max-width: 50%;">
                            <input type="checkbox" class="heart" {{ $included ? 'checked' : '' }}
                                id="heart{{ $post->id }}" />
                            <label class="react text-sm" for="heart{{ $post->id }}"><span
                                    id="post_reaction_count{{ $post->id }}">{{ $reactCount }}</span></label>
                        </button>
                        <button type="button" class="btn btn-outline-info" id="{{ $post->id }}"
                            data-bs-toggle="collapse" href="#collapse{{ $post->id }}" role="button"
                            aria-expanded="false" aria-controls="collapse{{ $post->id }}" style="max-width: 50%;">
                            Comment
                            {{-- <span class="bx bx-error ml-1"></span> --}}
                        </button>
                    </div>
                    <div class="collapse multi-collapse" data-id="{{ $post->id }}" id="collapse{{ $post->id }}">
                        <ul id="append{{ $post->id }}" style="max-height: 250px; overflow: auto;">

                        </ul>
                        <form action="" id="commentForm">
                            @csrf
                            <div id="commentField{{ $post->id }}" data-id="{{ $post->id }}" class="">
                                <div class="input-group mt-8 mb-3">
                                    <textarea class="form-control" aria-label="With textarea" name="comment" placeholder="Something you want to say..."></textarea>
                                    <span class="input-group-text send-btn text-sm btn btn-primary">Send!</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
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

                $.ajax({
                    url: "{{ route('home.index') }}",
                    method: "GET",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response.comments.length > 0) {
                            response.comments.forEach(comment => {
                                let commentHtml = `
                                    <li class="d-grid p-3 mt-2">
                                        <div class="flex align-items-center">
                                            <img src="{{ URL::asset('${comment.user.avatar}') }}" alt="collapse-image" class="me-4 mb-sm-0 mb-2" height="125" style="max-width: 10%; border-radius: 50%;" />
                                            <span class="font-semibold">${comment.user.name}</span>
                                        </div>
                                        <span class="mt-3">${comment.comments}</span>

                                        <div class="btn-group flex justify-content-between mt-4" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-outline-primary comment-react-btn" id="${comment.id}" style="max-width: 50%;">
                                                <input type="checkbox" class="heart" id="comment${comment.id}" />
                                                <label class="react text-sm" for="comment${comment.id}">Lorem</label>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger" style="max-width: 50%;">Report <span class="bx bx-error ml-1"></span></button>
                                        </div>
                                    </li>`;
                                // Append the comment HTML to the comment_group element
                                $('#append' + id).append(commentHtml);
                            });

                            $('#commentField' + id).html(`
                                <div class="input-group mt-8 mb-3">
                                    <textarea class="form-control" aria-label="With textarea" placeholder="Something you want to say..."></textarea>
                                    <span class="input-group-text send-btn text-sm btn btn-primary">Send!</span>
                                </div>
                            `);
                        } else {
                            $('#append' + id).html(
                                '<li class="d-flex justify-center p-3 mt-4 alert alert-success"><span class="bx bx-loader mr-2"></span>No Comments.</li>'
                            );
                        }
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
                                    <img src="{{ URL::asset('${response.user.avatar}') }}" alt="collapse-image" class="me-4 mb-sm-0 mb-2" height="125" style="max-width: 10%; border-radius: 50%;" />
                                    <span class="font-semibold">${response.user.name}</span>
                                </div>
                                <span class="mt-3">${response.comments.comments}</span>

                                <div class="btn-group flex justify-content-between mt-4" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-primary comment-react-btn" id="${response.comments.id}" style="max-width: 50%;">
                                        <input type="checkbox" class="heart" id="comment${response.comments.id}" />
                                        <label class="react text-sm" for="comment${response.comments.id}">Lorem</label>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" style="max-width: 50%;">Report <span class="bx bx-error ml-1"></span></button>
                                </div>
                            </li>`;
                        // Append the comment HTML to the comment_group element
                        $('#append' + response.post_id).append(commentHtml);

                        // Clear the textarea value
                        textarea.val('');

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
        });
    </script>
@endpush
