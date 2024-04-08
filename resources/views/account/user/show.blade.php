@extends('layouts.account')

@section('head')
    <title>View User | Uplift</title>

    <style>
        a.underlineHover {
            padding-bottom: 10px;
            background-image: linear-gradient(#696bff, #696bff), linear-gradient(rgba(255, 255, 255, 0), rgb(255, 255, 255, 0));
            background-size: 0 2px, auto;
            background-repeat: no-repeat;
            background-position: center bottom;
            transition: all .2s ease-out;
            cursor: pointer;
        }

        a.underlineHover:hover {
            background-size: 100% 2px, auto;
        }
    </style>
@endsection

@section('content')
    {{-- MODALS --}}

    {{-- delete comment --}}
    <div class="modal fade" id="commentDeleteModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="nameSmall" class="form-label flex justify-center">You want to delete your
                                comment?</label>
                            <div class="flex justify-center gap-2">
                                <button class="btn uppercase btn-info" data-bs-dismiss="modal">cancel</button>
                                <button class="btn uppercase btn-danger delete-btn">delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- report modal hindi pa tapooooos --}}
    <x-modal id="reportModal" formID="reportModalForm">
        <x-slot name="title">Do you mind telling us why?</x-slot>
        <div class="col-10 mx-auto">
            <label for="reason" class="form-label">Reason <span class="text-danger">*</span></label>
            <textarea id="reason" name="reason" class="form-control" required autofocus rows="4"></textarea>
        </div>
        <x-slot name="footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger report-btn">Report <i class="bx bx-error ml-1"></i></button>
        </x-slot>
    </x-modal>
    {{-- /MODALS --}}
    <div class="row gap-3 mt-4 mx-auto">
        <div class="col-3 card" style="max-height: 400px;">
            <div class="card-header">
                <div class="flex flex-col justify-between align-items-center">
                    <img src="{{ $user->avatar == null ? URL::asset('avatars/user.png') : URL::asset($user->avatar) }}"
                        alt="profile_pic" class=" aspect-square w-36">
                    <div class="flex gap-12 mt-2">
                        <span
                            class="badge flex align-items-center gap-1 bg-label-primary cursor-pointer hover:scale-125 ease-in-out duration-300"
                            id="follow_user_{{ $user->id }}" userId="{{ $user->id }}">
                            <i class='bx {{ $followed == 1 ? 'bxs-heart' : 'bx-heart' }}' id="follow"></i>follow</span>
                        <span
                            class="badge flex align-items-center gap-1 bg-label-danger cursor-pointer hover:scale-125 ease-in-out duration-300"
                            id="report_user_{{ $user->id }}" userId="{{ $user->id }}">Report<i
                                class='bx bx-error'></i></span>
                    </div>
                </div>
            </div>
            <div class="card-body flex flex-col align-items-center">
                <span class="h4">{{ $user->name }}</span>
                <span class="small">Member since: {{ $dateVerified }}</span>
                <i class="p mt-1">"{{ $user->bio == null ? 'Lorem Ipsum Dolor' : $user->bio }}"</i>
            </div>
        </div>
        <div class="col-7" style="margin-top: 1rem;">
            <h3 class="h2">Prayers</h3>
            @foreach ($posts as $post)
                <div class="card px-8 pt-6 pb-4 mb-4">
                    <!-- post header -->
                    <div class="flex justify-between align-items-center w-100 mb-4">
                        @php
                            $avatar = '';
                            if ($post->user->avatar == null) {
                                $avatar = URL::asset('avatars/user.png');
                            } else {
                                $avatar = URL::asset($post->user->avatar);
                            }
                        @endphp
                        <div class="flex align-items-center gap-2">
                            <img src="{{ $post->privacy == 'public' ? $avatar : URL::asset('avatars/172626_user_male_icon.png') }}"
                                class="rounded-full" style="width: 50px; aspect-ratio: 1;">
                            <div class="gap-0 flex flex-col">
                                <h5 id="test2" class="font-semibold">
                                    @php
                                        $user = App\Models\User::findOrFail($post->user_id);
                                    @endphp
                                    {{ $post->privacy == 'public' ? $user->name : 'Anonymous' }}
                                </h5>
                                <div class="flex align-items-center">
                                    @php
                                        $date = Carbon\Carbon::parse($post->created_at);
                                        $created_at = $date->diffForHumans();
                                    @endphp
                                    <small id="post" class="muted created_at">{{ $created_at }}</small>
                                    {{-- dot --}}
                                    <?xml version="1.0" ?><svg class="bi bi-dot text-slate-400" fill="currentColor"
                                        height="16" viewBox="0 0 16 16" width="16"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                    </svg>
                                    @if ($post->privacy == 'public')
                                        {{-- world --}}
                                        <span>
                                            <?xml version="1.0" ?><svg viewBox="0 0 496 512" width="13"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill="#878787"
                                                    d="M248 8C111.03 8 0 119.03 0 256s111.03 248 248 248 248-111.03 248-248S384.97 8 248 8zm82.29 357.6c-3.9 3.88-7.99 7.95-11.31 11.28-2.99 3-5.1 6.7-6.17 10.71-1.51 5.66-2.73 11.38-4.77 16.87l-17.39 46.85c-13.76 3-28 4.69-42.65 4.69v-27.38c1.69-12.62-7.64-36.26-22.63-51.25-6-6-9.37-14.14-9.37-22.63v-32.01c0-11.64-6.27-22.34-16.46-27.97-14.37-7.95-34.81-19.06-48.81-26.11-11.48-5.78-22.1-13.14-31.65-21.75l-.8-.72a114.792 114.792 0 0 1-18.06-20.74c-9.38-13.77-24.66-36.42-34.59-51.14 20.47-45.5 57.36-82.04 103.2-101.89l24.01 12.01C203.48 89.74 216 82.01 216 70.11v-11.3c7.99-1.29 16.12-2.11 24.39-2.42l28.3 28.3c6.25 6.25 6.25 16.38 0 22.63L264 112l-10.34 10.34c-3.12 3.12-3.12 8.19 0 11.31l4.69 4.69c3.12 3.12 3.12 8.19 0 11.31l-8 8a8.008 8.008 0 0 1-5.66 2.34h-8.99c-2.08 0-4.08.81-5.58 2.27l-9.92 9.65a8.008 8.008 0 0 0-1.58 9.31l15.59 31.19c2.66 5.32-1.21 11.58-7.15 11.58h-5.64c-1.93 0-3.79-.7-5.24-1.96l-9.28-8.06a16.017 16.017 0 0 0-15.55-3.1l-31.17 10.39a11.95 11.95 0 0 0-8.17 11.34c0 4.53 2.56 8.66 6.61 10.69l11.08 5.54c9.41 4.71 19.79 7.16 30.31 7.16s22.59 27.29 32 32h66.75c8.49 0 16.62 3.37 22.63 9.37l13.69 13.69a30.503 30.503 0 0 1 8.93 21.57 46.536 46.536 0 0 1-13.72 32.98zM417 274.25c-5.79-1.45-10.84-5-14.15-9.97l-17.98-26.97a23.97 23.97 0 0 1 0-26.62l19.59-29.38c2.32-3.47 5.5-6.29 9.24-8.15l12.98-6.49C440.2 193.59 448 223.87 448 256c0 8.67-.74 17.16-1.82 25.54L417 274.25z" />
                                            </svg>
                                        </span>
                                    @else
                                        <span>
                                            <?xml version="1.0" ?><svg fill="none" height="24"
                                                viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.5 11.75C20.1233 11.75 22.25 13.8766 22.25 16.5C22.25 19.1234 20.1233
                                                                                21.25 17.5 21.25C15.402 21.25 13.6216 19.8898 12.9927 18.0032H11.0072C10.3783
                                                                                19.8898 8.59799 21.25 6.49998 21.25C3.87663 21.25 1.74998 19.1234 1.74998
                                                                                16.5C1.74998 13.8766 3.87663 11.75 6.49998 11.75C8.95456 11.75 10.9743 13.6118
                                                                                11.224 16.0003H12.776C13.0257 13.6118 15.0454 11.75 17.5 11.75ZM6.49998
                                                                                13.75C4.9812 13.75 3.74998 14.9812 3.74998 16.5C3.74998 18.0188 4.9812 19.25
                                                                                6.49998 19.25C8.01876 19.25 9.24998 18.0188 9.24998 16.5C9.24998 14.9812 8.01876
                                                                                13.75 6.49998 13.75ZM17.5 13.75C15.9812 13.75 14.75 14.9812 14.75 16.5C14.75
                                                                                18.0188 15.9812 19.25 17.5 19.25C19.0188 19.25 20.25 18.0188 20.25 16.5C20.25
                                                                                14.9812 19.0188 13.75 17.5 13.75ZM15.5119 3C16.7263 3 17.797 3.79659 18.1459
                                                                                4.95979L19.1521 8.31093C19.9446 8.44285 20.7203 8.59805 21.479 8.77658C22.0166
                                                                                8.90308 22.3499 9.44144 22.2234 9.97904C22.0969 10.5166 21.5585 10.8499 21.0209
                                                                                10.7234C18.2654 10.0751 15.2586 9.75 12 9.75C8.74132 9.75 5.73456 10.0751 2.97902
                                                                                10.7234C2.44142 10.8499 1.90306 10.5166 1.77656 9.97904C1.65007 9.44144 1.98334
                                                                                8.90308 2.52094 8.77658C3.27938 8.59813 4.05471 8.44298 4.84691 8.3111L5.85402
                                                                                4.95979C6.20298 3.79659 7.27362 3 8.48804 3H15.5119Z"
                                                    fill="#878787" />
                                            </svg>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="btn-group">
                            <button type="button" title="options"
                                class="dropdown-toggle hide-arrow hover:text-indigo-500 hover:scale-125 postDDtrigger"
                                data-id="{{ $post->id }}" id="postDDtrigger{{ $post->id }}"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-menu1 dropdown-menu-end mt-1" id="postDD"
                                data-id="{{ $post->id }}">
                                <li><a class="dropdown-item text-danger hover:text-danger active:text-danger"
                                        href="javascript:void(0);">Report <i class='bx bx-error'></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- post body -->
                    <div class="mb-4">
                        <h2 class="text-xl h2 font-bold text-gray-700">
                            {{ $post->caption }}
                        </h2>
                        <p class="text-gray-700 text-sm text-pretty">
                            {{ $post->description }}
                        </p>
                    </div>
                    <!-- tags -->
                    @php
                        $tags = json_decode($post->tags);
                    @endphp

                    <div class="flex justify-end cursor-default">
                        <div class="flex justify-end gap-1">
                            @foreach ($tags as $tag)
                                <span class="badge rounded bg-label-secondary">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                    <!-- comment and reaction -->
                    <div class="mt-4 px-2" id="{{ $post->id }}">
                        <style>
                            .heart,
                            .react {
                                cursor: pointer;
                            }

                            a.dropdown-item:hover {
                                color: var(--bs-dropdown-link-hover-color);
                            }

                            .dropdown-item:not(.disabled).active,
                            .dropdown-item:not(.disabled):active {
                                background-color: var(--bs-dropdown-link-hover-bg);
                                color: #8592a3;
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
                            $reactions = json_decode($post->reaction_count, true);

                            if ($reactions == null) {
                                $reactions = [];
                            }

                            $included = in_array($auth->id, $reactions);

                            $reactCount = count($reactions);

                            $commentCount = $post->comments->count();
                        @endphp
                        <div class="flex gap-4 mb-2">
                            <!-- reaction -->
                            <input type="checkbox" id="heart{{ $post->id }}" hidden
                                {{ $included ? 'checked' : '' }}>

                            <a class="flex gap-2 cursor-default">
                                <img src="{{ $included ? URL::asset('avatars/pray.png') : URL::asset('avatars/pray-outline.png') }}"
                                    alt="" id="{{ $post->id }}" style="height: 25px; aspect-ratio:1;"
                                    class="heartIcon{{ $post->id }} heart cursor-pointer ease-in-out duration-300 hover:scale-125">
                                <span class="post-react-count{{ $post->id }}">{{ $reactCount }}</span>
                            </a>
                            <!-- comment -->
                            <a class="text-secondary underlineHover comment{{ $post->id }} px-3"
                                data-bs-toggle="collapse" href="#collapse{{ $post->id }}" id="{{ $post->id }}"
                                aria-controls="collapse{{ $post->id }}"><i
                                    class='bx bx-comment mr-2 text-primary'></i>Comment <span class="ml-1"
                                    id="commentCount{{ $post->id }}"
                                    postId="{{ $post->id }}">{{ $commentCount }}</span></a>
                        </div>

                        {{-- Comment Drawer --}}
                        <div class="collapse multi-collapse my-2" data-id="{{ $post->id }}"
                            id="collapse{{ $post->id }}">
                            <ul id="append{{ $post->id }}" class="bg-gray-50 mt-1 rounded-md"
                                style="max-height: 420px; overflow: auto;">

                                @forelse ($post->comments as $comment)
                                    @php
                                        $array = json_decode($comment->reactions, true);
                                        $reactCount = is_array($array) ? count($array) : 0;

                                        $array = is_array($array) ? $array : [];
                                    @endphp
                                    <li class="d-grid p-3 mt-2 commentList{{ $comment->id }}">
                                        <div class="row">
                                            <!-- comment header -->
                                            <div class ="col-2">
                                                <img src="{{ $comment->user->avatar != null ? URL::asset($comment->user->avatar) : URL::asset('avatars/user.png') }}"
                                                    alt="profile_pic" class="ml-3 mb-sm-0 mb-2" height="125"
                                                    style="max-width: 90%; border-radius: 50%; aspect-ratio: 1/1;" />
                                            </div>
                                            <div class="flex flex-col gap-2 col-8">
                                                <div class="flex align-items-center gap-1">
                                                    <span class="font-semibold">{{ $comment->user->name }}</span>
                                                    {{-- dot --}}
                                                    <i class='bx bxs-circle' style="font-size: 4px;"></i>
                                                    @php
                                                        $date = Carbon\Carbon::parse($comment->created_at);
                                                        $created_at = $date->diffForHumans();
                                                    @endphp
                                                    <small id="post"
                                                        class="muted created_at">{{ $created_at }}</small>
                                                </div>
                                                <span class="spanEdit" commentId="{{ $comment->id }}"
                                                    id="commentbody{{ $comment->id }}">{{ $comment->comments }}</span>

                                                {{-- editComment form --}}
                                                <form class="my-2" action="" id="editCommentForm">
                                                    <div class="d-none editComment" id="editComment{{ $comment->id }}">
                                                        <textarea name="editComment" id="editCommentInput{{ $comment->id }}" comment_id="{{ $comment->id }}"
                                                            post_id="{{ $post->id }}" rows="2" class="form-control" autofocus></textarea>

                                                        <div class="flex gap-2 mt-2 h-max justify-end">
                                                            <button class="btn btn-primary save-btn"
                                                                commentId="{{ $comment->id }}"
                                                                postId="{{ $post->id }}">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="flex align-items-center gap-4">
                                                    <input type="checkbox" id="comment{{ $comment->id }}" hidden>

                                                    <a class="flex gap-2 cursor-default">
                                                        <img src="{{ in_array($auth->id, $array) ? URL::asset('avatars/pray.png') : URL::asset('avatars/pray-outline.png') }}"
                                                            id="{{ $comment->id }}"
                                                            style="height: 25px; aspect-ratio:1;"
                                                            class="heart{{ $comment->id }} comment-react-btn cursor-pointer
                                                                    ease-in-out duration-300 hover:scale-125">
                                                        <span
                                                            class="comment_reaction_count{{ $comment->id }}">{{ $reactCount }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                            {{-- options --}}
                                            <div class="col-2 h-max relative bottom-1">
                                                <div class="btn-group mb-4">
                                                    <a href="javascript:void(0);"
                                                        class="dropdown-toggle commentDD hide-arrow cursor-pointer hover:text-indigo-500 hover:scale-125"
                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                        id="burger{{ $comment->id }}">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </a>

                                                    <a href="javascript:void(0);"
                                                        class="dropdown-toggle d-none cancelEdit hide-arrow cursor-pointer hover:text-indigo-500 hover:scale-125"
                                                        id="cancel{{ $comment->id }}" commentId="{{ $comment->id }}"
                                                        postId="{{ $post->id }}">
                                                        <i class="bx bx-x"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu1 commentDropdown dropdown-menu-end mt-1"
                                                        style="">
                                                        @if ($comment->user_id != $auth->id)
                                                            <li>
                                                                <a class="dropdown-item text-primary view-btn"
                                                                    href="{{ route('user_page.show', ['user_page' => $comment->user_id]) }}"><i
                                                                        class="bx bx-user mr-1"></i>
                                                                    View User
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item text-danger report-btn"
                                                                    href="javascript:void(0);"><i
                                                                        class="bx bx-user mr-1"></i>
                                                                    Report
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a class="dropdown-item text-info edit-btn hover:text-info active:text-info"
                                                                    id="{{ $comment->id }}"
                                                                    data-id="{{ $post->id }}"
                                                                    href="javascript:void(0);"><i
                                                                        class="bx bx-edit mr-1"></i>
                                                                    Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item text-danger delete-dd"
                                                                    href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#commentDeleteModal"
                                                                    id="{{ $comment->id }}"
                                                                    data-id="{{ $post->id }}"><i
                                                                        class="bx bx-trash mr-1"></i>
                                                                    Delete
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="d-flex justify-center p-3 mt-4 alert alert-success"><span
                                            class="bx bx-loader mr-2"></span>No Comments.</li>
                                @endforelse
                            </ul>
                        </div>

                        <form>
                            @csrf
                            <div class="input-group mb-3" id="createGroup">
                                <textarea class="form-control" id="textarea_{{ $post->id }}" aria-label="With textarea"
                                    placeholder="Something you want to say..."></textarea>
                                <span class="input-group-text send-btn text-sm btn btn-primary"
                                    id="{{ $post->id }}">Send!</span>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // comment show
            $(document).on('shown.bs.collapse', '.collapse', function() {
                var id = $(this).data('id'); // Get the data-id attribute value
                var ul = $('#append' + id);

                ul.scrollTop(ul.prop("scrollHeight"));

                $('.comment' + id).css('background-size', '100% 2px, auto');
            });

            // comment hide
            $(document).on('hide.bs.collapse', '.collapse', function() {
                var id = $(this).parent().attr('id');

                $('.comment' + id).css('background-size', '0% 2px, auto');
                $('.comment' + id).css('background-size', '');

                console.log();
            });

            // comment react
            $(document).on('click', '.comment-react-btn', function(e) {
                var id = $(this).attr('id');
                var userId = {{ $auth->id }};

                var heart = $('.heart' + id);
                console.log();

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
                            console.log();
                            if (response.status == 200 && response.value == 'true') {

                                $('.comment_reaction_count' + id).html(response
                                    .reactCount);
                                heart.attr('src',
                                    "{{ URL::asset('avatars/pray.png') }}");

                            } else if (response.status == 200 && response.value ==
                                'false') {

                                $('.comment_reaction_count' + id).html(response
                                    .reactCount);
                                heart.attr('src',
                                    "{{ URL::asset('avatars/pray-outline.png') }}");
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });

                    return !currentValue;
                });
            });

            // comment Edit
            $(document).on('click', '.edit-btn', function(e) {
                // comment id
                var commentId = $(this).attr('id');
                var postId = $(this).data('id');

                // span comment
                var comment = $('#commentbody' + commentId).text();

                $('.spanEdit').removeClass('d-none');
                $('.commentDD').removeClass('d-none');
                $('.editComment').addClass('d-none');
                $('.cancelEdit').addClass('d-none');


                $('#editComment' + commentId).removeClass('d-none');
                $('#commentbody' + commentId).addClass('d-none');
                $('#burger' + commentId).addClass('d-none');
                $('#cancel' + commentId).removeClass('d-none');
            });

            // comment edit cancel
            $(document).on('click', '.cancelEdit', function(e) {
                var commentId = $(this).attr('commentId');
                var postId = $(this).attr('postId');

                $('.spanEdit').removeClass('d-none');
                $('.commentDD').removeClass('d-none');


                $('#editComment' + commentId).addClass('d-none');
                $('#commentbody' + commentId).removeClass('d-none');
                $('#burger' + commentId).removeClass('d-none');
                $('#cancel' + commentId).addClass('d-none');

                console.log();
            });

            // coment save
            $(document).on('click', '.save-btn', function(e) {
                e.preventDefault();
                var commentId = $(this).attr('commentId');
                var postId = $(this).attr('postId');
                var newComment = $('#editCommentInput' + commentId).val();

                $.ajax({
                    url: "{{ route('comments.update', [':id']) }}".replace(':id', commentId),
                    method: "PUT",
                    data: {
                        comment: newComment,
                        data: 'update',
                        postId: postId,
                    },
                    success: function(response) {
                        $('.spanEdit').removeClass('d-none');
                        $('.commentDD').removeClass('d-none');


                        $('#editComment' + commentId).addClass('d-none');
                        $('#commentbody' + commentId).removeClass('d-none');
                        $('#commentbody' + commentId).text(response.comment);
                        $('#burger' + commentId).removeClass('d-none');
                        $('#cancel' + commentId).addClass('d-none');

                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            // comment delete
            $(document).on('click', '.delete-dd', function() {
                var id = $(this).attr('id');
                var postId = $(this).data('id');
                console.log(id);

                $('.delete-btn').click(function() {
                    $('#commentDeleteModal').modal('hide');

                    $.ajax({
                        url: "{{ route('comments.destroy', [':id']) }}".replace(':id', id),
                        method: "DELETE",
                        data: {
                            data: 'delete',
                            postId: postId
                        },
                        success: function(response) {
                            $('.commentList' + response.id).fadeOut('slow');
                            setTimeout(function() {
                                $('.commentList' + response.id).addClass(
                                    'd-none');
                            }, 500);

                            $('#commentCount' + response.postId).text(response
                                .commentCount);

                            butterup.toast({
                                title: 'Delete',
                                message: response.message,
                                type: 'success',
                                icon: true,
                                dismissable: true
                            });
                        },
                        error: function(error) {
                            butterup.toast({
                                title: 'Error!',
                                message: response.message,
                                type: 'error',
                                icon: true,
                                dismissable: true
                            });
                        }
                    });
                });
            });

            // comment create
            $(document).on('click', '.send-btn', function(e) {
                var id = $(this).attr('id');

                $('#collapse' + id).addClass('show');
                $('.comment' + id).css('background-size', '100% 2px, auto');

                $.ajax({
                    url: "{{ route('comments.store') }}",
                    method: "POST",
                    data: {
                        post_id: id,
                        comment: $('#textarea_' + id).val(),
                        data: 'comment',
                    },
                    success: function(response) {
                        let newComment = `<li class="d-grid p-3 mt-2 commentList${response.comments.id}">
                            <div class="row">
                                <!-- comment header -->
                                <div class ="col-2">
                                    <img src="http://127.0.0.1:8000/${response.avatar}"
                                        alt="profile_pic" class="ml-3 mb-sm-0 mb-2" height="125"
                                        style="max-width: 90%; border-radius: 50%; aspect-ratio: 1/1;" />
                                </div>
                                <div class="flex flex-col gap-2 col-8">
                                    <div class="flex align-items-center gap-1">
                                        <span class="font-semibold">${response.user.name}</span>
                                        {{-- dot --}}
                                        <i class='bx bxs-circle' style="font-size: 4px;"></i>
                                        <small id="post"
                                            class="muted created_at">${response.created_at}</small>
                                    </div>
                                    <span class="spanEdit" commentId="${response.comments.id}"
                                        id="commentbody${response.comments.id}">${response.comments.comments}</span>

                                    {{-- editComment form --}}
                                    <form class="my-2" action="" id="editCommentForm">
                                        <div class="d-none editComment" id="editComment${response.comments.id}">
                                            <textarea name="editComment" id="editCommentInput${response.comments.id}" comment_id="${response.comments.id}"
                                                post_id="${response.post_id}" rows="2" class="form-control" autofocus></textarea>

                                            <div class="flex gap-2 mt-2 h-max justify-end">
                                                <button class="btn btn-primary save-btn"
                                                    commentId="${response.comments.id}"
                                                    postId="${response.post_id}">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="flex align-items-center gap-4">
                                        <input type="checkbox" id="comment${response.comments.id}" hidden>

                                        <a class="flex gap-2 cursor-default">
                                            <img src="{{ in_array($auth->id, $array) ? URL::asset('avatars/pray.png') : URL::asset('avatars/pray-outline.png') }}"
                                                id="${response.comments.id}"
                                                style="height: 25px; aspect-ratio:1;"
                                                class="heart${response.comments.id} comment-react-btn cursor-pointer
                                                        ease-in-out duration-300 hover:scale-125">
                                            <span
                                                class="comment_reaction_count${response.comments.id}">0</span>
                                        </a>
                                    </div>
                                </div>
                                {{-- options --}}
                                <div class="col-2 h-max relative bottom-1">
                                    <div class="btn-group mb-4">
                                        <a href="javascript:void(0);"
                                            class="dropdown-toggle commentDD hide-arrow cursor-pointer hover:text-indigo-500 hover:scale-125"
                                            data-bs-toggle="dropdown" aria-expanded="false"
                                            id="burger${response.comments.id}">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>

                                        <a href="javascript:void(0);"
                                            class="dropdown-toggle d-none cancelEdit hide-arrow cursor-pointer hover:text-indigo-500 hover:scale-125"
                                            id="cancel${response.comments.id}" commentId="${response.comments.id}"
                                            postId="${response.post_id}">
                                            <i class="bx bx-x"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu1 commentDropdown dropdown-menu-end mt-1"
                                            style="">
                                            @if ($comment->user_id != $auth->id)
                                                <li>
                                                    <a class="dropdown-item text-primary view-btn"
                                                        href="{{ route('user_page.show', ['user_page' => $comment->user_id]) }}"><i
                                                            class="bx bx-user mr-1"></i>
                                                        View User
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger report-btn"
                                                        href="javascript:void(0);"><i
                                                            class="bx bx-user mr-1"></i>
                                                        Report
                                                    </a>
                                                </li>
                                            @else
                                                <li>
                                                    <a class="dropdown-item text-info edit-btn hover:text-info active:text-info"
                                                        id="${response.comments.id}"
                                                        data-id="${response.post_id}"
                                                        href="javascript:void(0);"><i
                                                            class="bx bx-edit mr-1"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger delete-dd"
                                                        href="javascript:void(0);" data-bs-toggle="modal"
                                                        data-bs-target="#commentDeleteModal"
                                                        id="${response.comments.id}" data-id="${response.post_id}"><i
                                                            class="bx bx-trash mr-1"></i>
                                                        Delete
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>`;

                        var ul = $('#append' + response.post_id);

                        ul.append(newComment);
                        ul.scrollTop(ul.prop("scrollHeight"));

                        $('.commentList' + response.comments.id).fadeOut('slow');

                        $('#commentCount' + response.post_id).text(response.commentCount);

                        $('#textarea_' + response.post_id).val('');

                        console.log();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

                console.log();
            });

            //post react
            $('.heart').click(function() {
                var id = $(this).attr('id');
                var userId = {{ $auth->id }};

                var heart = $('.heartIcon' + id);
                console.log();

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
                            if (response.status == 200 && response.value == 'true') {

                                heart.attr('src',
                                    "{{ URL::asset('avatars/pray.png') }}");
                                $('.post-react-count' + id).html(response.reactCount);

                            } else if (response.status == 200 && response.value ==
                                'false') {

                                heart.attr('src',
                                    "{{ URL::asset('avatars/pray-outline.png') }}");

                                $('.post-react-count' + id).html(response.reactCount);
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });

                    return !currentValue;
                });
            });

            // follow user
            $('#follow_user_' + {{ $user->id }}).click(function() {
                var id = $(this).attr('userId');

                if ($('#follow').hasClass('bx-heart')) {
                    $('#follow').removeClass('bx-heart');
                    $('#follow').addClass('bxs-heart');
                    var follow = {{ $auth->id }};

                } else {
                    $('#follow').addClass('bx-heart');
                    $('#follow').removeClass('bxs-heart');
                    var follow = {{ $auth->id }};
                };

                $.ajax({
                    url: "{{ route('user_page.update', [':id']) }}".replace(':id', id),
                    method: "PUT",
                    data: {
                        follow: follow,
                        data: 'follow',
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            butterup.toast({
                                title: 'Followed',
                                message: response.message,
                                type: 'success',
                                dismissable: true,
                                icon: true
                            })
                        } else if (response.status == 201) {
                            butterup.toast({
                                title: 'Unfollowed',
                                message: response.message,
                                type: 'success',
                                dismissable: true,
                                icon: true
                            })
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            // report user
            $('#report_user_' + {{ $user->id }}).click(function() {
                var id = $(this).attr('userId');
                $('.btn-close').addClass('d-none');
                $('#reportModal').modal('show');
            });
        });
    </script>
@endpush
