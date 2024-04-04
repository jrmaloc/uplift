@extends('layouts.account')

@section('head')
    <title>Home | Uplift</title>
    <style>
        .focused {
            border-radius: 0.375rem;
            border: 1px solid #696bff !important;
        }

        .list-group {
            --bs-list-group-border-color: transparent;
        }

        .list-group-item,
        .list-group-item:first-child,
        .list-group-item:last-child {
            border-radius: 0;
        }

        .dropdown-menu1 {
            --bs-dropdown-min-width: 10rem !important;
            inset: -.5rem -.5rem auto auto !important;
        }

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
    <div class="row">
        <h3 class="h3 ml-4 mt-4 fw-bolder">Activity Feed</h3>
        <!-- feed -->
        <div class="col-7 ml-auto">
            <!-- create post -->
            <div class="mx-auto">
                <form action="{{ route('posts_page.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="flex bg-white">
                        <span class="input-group-text border-0"
                            style="
                            border-bottom-left-radius: 0px;
                            border-top: 1px solid #d9dee3 !important;
                            border-left: 1px solid #d9dee3 !important;
                            border-top-right-radius: 0px;
                            ">
                            @php
                                $avatar = $auth->avatar ? $auth->avatar : URL::asset('avatars/user.png');
                            @endphp
                            <img src="{{ URL::asset($auth->avatar) }}" alt="" class="rounded-full"
                                style="width: 70px; aspect-ratio: 1/1;"></span>
                        <div class="w-100">
                            <input type="text" class="form-control input-field border-0 pt-4" placeholder="Caption..."
                                id="caption" name="caption"
                                style="
                                border-top: 1px solid #d9dee3 !important;
                                border-right: 1px solid #d9dee3 !important;
                                border-bottom: 0px !important;
                                border-top-left-radius: 0px;
                                border-bottom-right-radius: 0px;
                                font-weight: bold;
                                font-size: 20px;">
                            <textarea class="form-control pt-4 input-field rounded-0 border-0" rows="4" aria-label="With textarea"
                                placeholder="Lorem Ipsum..." id="content" name="content"
                                style="
                                border-right: 1px solid #d9dee3 !important;
                                min-height: 150px;"></textarea>
                        </div>
                    </div>
                    <div class="bg-indigo-100 px-2 py-3 flex justify-around"
                        style="border-bottom-left-radius: 0.375rem; border-bottom-right-radius: 0.375rem;">
                        <div class="" style="width: 550px;">
                            <label for="tags" style="width: 550px;" class="mb-2" class="form-label"> tags:
                                <select class="form-control mb-2 mr-2" id="tags" name="tags[]" multiple="multiple">
                                    <option value="Faith">Faith</option>
                                    <option value="Family">Family</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Health">Health</option>
                                    <option value="Studies">Studies</option>
                                    <option value="Work">Work</option>
                                </select>
                            </label>
                            <style>
                                .checkbox-wrapper-34 {
                                    --blue: #0D7EFF;
                                    --g08: #E1E5EB;
                                    --g04: #848ea1;
                                }

                                .checkbox-wrapper-34 .tgl {
                                    display: none;
                                }

                                .checkbox-wrapper-34 .tgl,
                                .checkbox-wrapper-34 .tgl:after,
                                .checkbox-wrapper-34 .tgl:before,
                                .checkbox-wrapper-34 .tgl *,
                                .checkbox-wrapper-34 .tgl *:after,
                                .checkbox-wrapper-34 .tgl *:before,
                                .checkbox-wrapper-34 .tgl+.tgl-btn {
                                    box-sizing: border-box;
                                }

                                .checkbox-wrapper-34 .tgl::selection,
                                .checkbox-wrapper-34 .tgl:after::selection,
                                .checkbox-wrapper-34 .tgl:before::selection,
                                .checkbox-wrapper-34 .tgl *::selection,
                                .checkbox-wrapper-34 .tgl *:after::selection,
                                .checkbox-wrapper-34 .tgl *:before::selection,
                                .checkbox-wrapper-34 .tgl+.tgl-btn::selection {
                                    background: none;
                                }

                                .checkbox-wrapper-34 .tgl+.tgl-btn {
                                    outline: 0;
                                    display: block;
                                    width: 57px;
                                    height: 27px;
                                    position: relative;
                                    cursor: pointer;
                                    user-select: none;
                                    font-size: 12px;
                                    font-weight: 400;
                                    color: #fff;
                                }

                                .checkbox-wrapper-34 .tgl+.tgl-btn:after,
                                .checkbox-wrapper-34 .tgl+.tgl-btn:before {
                                    position: relative;
                                    display: block;
                                    content: "";
                                    width: 44%;
                                    height: 100%;
                                }

                                .checkbox-wrapper-34 .tgl+.tgl-btn:after {
                                    left: 0;
                                }

                                .checkbox-wrapper-34 .tgl+.tgl-btn:before {
                                    display: inline;
                                    position: absolute;
                                    top: 7px;
                                }

                                .checkbox-wrapper-34 .tgl:checked+.tgl-btn:after {
                                    left: 56.5%;
                                }

                                .checkbox-wrapper-34 .tgl-ios+.tgl-btn {
                                    background: var(--g08);
                                    border-radius: 20rem;
                                    padding: 2px;
                                    transition: all 0.4s ease;
                                    box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.1);
                                }

                                .checkbox-wrapper-34 .tgl-ios+.tgl-btn:after {
                                    border-radius: 2em;
                                    background: #fff;
                                    transition: left 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), padding 0.3s ease, margin 0.3s ease;
                                    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);
                                }

                                .checkbox-wrapper-34 .tgl-ios+.tgl-btn:before {
                                    content: "No";
                                    left: 30px;
                                    top: 5px;
                                    color: var(--g04);
                                    transition: left 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                                }

                                .checkbox-wrapper-34 .tgl-ios+.tgl-btn:active {
                                    box-shadow: inset 0 0 0 30px rgba(0, 0, 0, 0.1);
                                }

                                .checkbox-wrapper-34 .tgl-ios+.tgl-btn:active:after {
                                    padding-right: 0.4em;
                                }

                                .checkbox-wrapper-34 .tgl-ios:checked+.tgl-btn {
                                    background: #5c5c5c;
                                }

                                .checkbox-wrapper-34 .tgl-ios:checked+.tgl-btn:active {
                                    box-shadow: inset 0 0 0 30px rgba(0, 0, 0, 0.1);
                                }

                                .checkbox-wrapper-34 .tgl-ios:checked+.tgl-btn:active:after {
                                    margin-left: -0.4em;
                                }

                                .checkbox-wrapper-34 .tgl-ios:checked+.tgl-btn:before {
                                    content: "Yes";
                                    left: 8px;
                                    top: 5px;
                                    color: #fff;
                                }
                            </style>
                            <div class="flex align-items-center gap-2 mt-3">
                                <label for="anonymous" class="form-label mt-1">Post Anonymmously?</label>
                                <div class="checkbox-wrapper-34">
                                    <input class="tgl tgl-ios" name="privacy" id="anonymous" type="checkbox">
                                    <label class="tgl-btn" for="anonymous"></label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-7">
                            <button type="submit" class="btn btn-primary post-btn h-max">Post!</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- posts -->
            <div class="mt-4">
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
                                                    <path d="M17.5 11.75C20.1233 11.75 22.25 13.8766 22.25 16.5C22.25 19.1234 20.1233
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
                                <button type="button"
                                    class="dropdown-toggle hide-arrow hover:text-indigo-500 hover:scale-125 postDDtrigger" data-id="{{ $post->id }}"
                                    id="postDDtrigger{{ $post->id }}" data-bs-toggle="dropdown" aria-expanded="false"  data-bs-auto-close="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu1 dropdown-menu-end mt-1" id="postDD"
                                    data-id="{{ $post->id }}">
                                    @if ($post->privacy == 'public' && $post->user_id == auth()->id())
                                        <li><a class="dropdown-item text-info hover:text-info active:text-info"
                                                href="javascript:void(0);">Edit <i class='bx bx-edit'></i></a></li>
                                        <li><a class="dropdown-item text-danger hover:text-danger active:text-danger"
                                                href="javascript:void(0);">Delete <i class='bx bx-trash'></i></a></li>
                                    @elseif ($post->privacy == 'public' && $post->user_id != auth()->id())
                                        <li><a class="dropdown-item text-secondary hover:text-secondary active:text-secondary"
                                                href="javascript:void(0);">View User <i class='bx bx-user-pin'></i></a>
                                        </li>
                                        <li><a class="dropdown-item text-danger hover:text-danger active:text-danger"
                                                href="javascript:void(0);">Report <i class='bx bx-error'></i></a></li>
                                    @else
                                        <li><a class="dropdown-item text-danger hover:text-danger active:text-danger"
                                                href="javascript:void(0);">Report <i class='bx bx-error'></i></a></li>
                                    @endif
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
                                    color: var(--bs-dropdown-link-hover-color);
                                }

                                ul.dropdown-menu.show {
                                    transform: translate(-15px, 25px) !important;
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
                                $user_id = $auth->id;
                                $reactions = json_decode($post->reaction_count, true);

                                if ($reactions == null) {
                                    $reactions = [];
                                }

                                $included = in_array($user_id, $reactions);

                                $reactCount = count($reactions);

                                $commentCount = $post->comments->count();
                            @endphp
                            <div class="flex gap-4">
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
                                    data-bs-toggle="collapse" href="#collapse{{ $post->id }}"
                                    id="{{ $post->id }}" aria-controls="collapse{{ $post->id }}"><i
                                        class='bx bx-comment mr-2 text-primary'></i>Comment <span class="ml-1"
                                        id="commentCount{{ $post->id }}"
                                        postId="{{ $post->id }}">{{ $commentCount }}</span></a>
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

        <!-- latest updates -->
        <div class="col-3 mr-auto">
            <div class="card">
                <h3 class="card-header pb-0 h3">Latest Updates</h3>
                <div class="mt-2">
                    <div class="list-group border-b-0 border-transparent">
                        <a href="javascript:void(0);"
                            class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex justify-content-between w-100">
                                <h6 class="h6">List group item heading</h6>
                            </div>
                            <p class="mb-1">
                                Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius
                                blandit.
                            </p>
                            <small>3 days ago</small>
                        </a>
                        <a href="javascript:void(0);"
                            class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex justify-content-between w-100">
                                <h6 class="h6">List group item heading</h6>
                            </div>
                            <p class="mb-1">
                                Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius
                                blandit.
                            </p>
                            <small class="text-muted">3 days ago</small>
                        </a>
                        <a href="javascript:void(0);"
                            class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex justify-content-between w-100">
                                <h6 class="h6">List group item heading</h6>
                            </div>
                            <p class="mb-1">
                                Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius
                                blandit.
                            </p>
                            <small class="text-muted">3 days ago</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .cancel:hover {
            color: rgb(209, 61, 61) !important;
            pointer-events: auto !important;
            cursor: pointer;
        }

        .x-btn {
            position: relative;
            left: 27rem;
            bottom: 2.375rem;
        }

        .commentDropdown {
            inset: -.5rem -1rem auto auto !important;
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

            $(document).on('click', '.postDDtrigger', function() {
                var id = $(this).data('id');
                var dropdown = $(this).parent().find('.dropdown-menu');
                if (dropdown.hasClass('show')) {
                    $('#postDDtrigger' + id).addClass('scale-125');
                    $('#postDDtrigger' + id).addClass('text-indigo-500');
                } else {
                    $('#postDDtrigger' + id).removeClass('scale-125');
                    $('#postDDtrigger' + id).removeClass('text-indigo-500');
                }
            });

            $('#tags').select2({
                tags: true,
            });

            $('.input-field').focus(function() {
                $(this).closest('.flex').addClass('focused');
            });

            $('.heart').mouseenter(function() {
                var id = $(this).attr('id');
                $('.heartIcon' + id).addClass('scale-125');
            });

            $('.heart').mouseleave(function() {
                var id = $(this).attr('id');
                $('.heartIcon' + id).removeClass('scale-125');
            });

            $('.input-field').blur(function() {
                $(this).closest('.flex').removeClass('focused');
            });

            // Post Create
            // $(document).on('click', '.post-btn', function(e) {
            //     e.preventDefault();

            //     console.log('submit');
            //     var userId = {{ $auth->id }};
            //     var caption = $('#caption').val();
            //     var content = $('#content').val();
            //     var tags = $('#tags').val();
            //     var url = '{{ route('posts.store') }}';
            //     var data = 'create';
            //     var anonymous = $('#anonymous').prop('checked');

            //     $.ajax({
            //         url: url,
            //         method: "POST",
            //         data: {
            //             userId: userId,
            //             caption: caption,
            //             content: content,
            //             tags: tags,
            //             anonymous: anonymous,
            //             data: data,
            //         },
            //         success: function(response) {
            //             Swal.fire("SweetAlert2 is working!").then((result) => {
            //                 window.location.reload();
            //             });
            //         },
            //         error: function(error) {
            //             console.log(error);
            //         }
            //     })
            // })

            // Post Reactions
            $(document).on('click', '.heart', function(e) {
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

            // Comment Close
            $(document).on('hide.bs.collapse', '.collapse', function() {
                var id = $(this).parent().attr('id');

                $('.comment' + id).css('background-size', '0% 2px, auto');
                $('.comment' + id).css('background-size', '');

                console.log(id);
            });

            // Comment Show
            $(document).on('show.bs.collapse', '.collapse', function() {
                var id = $(this).data('id'); // Get the data-id attribute value
                var ul = $('#append' + id);

                ul.scrollTop(ul.prop("scrollHeight"));

                $('.comment' + id).css('background-size', '100% 2px, auto');

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
                                var showViewUser = comment.user.id !=
                                    {{ $auth->id }};

                                console.log();

                                let createdAt = moment(comment.created_at);
                                let timeAgo = createdAt.fromNow();

                                var avatar = comment.user.avatar;

                                let avatarUrl = avatar ? "{{ URL::asset(':avatar') }}"
                                    .replace(':avatar', avatar) :
                                    "{{ URL::asset('assets/img/avatars/5.png') }}";

                                var included = comment.included;

                                var checked = included ? 'checked' : '';
                                var imgSrc = included ?
                                    `{{ URL::asset('avatars/pray.png') }}` :
                                    `{{ URL::asset('avatars/pray-outline.png') }}`;

                                var dropdownOptions = showViewUser ?
                                    `<li>
                                        <a class="dropdown-item text-primary view-btn hover:text-info active:text-info"
                                            href="javascript:void(0);"><i class='bx bx-user mr-1'></i>
                                            View User
                                        </a>
                                    </li>` :
                                    `<li>
                                        <a class="dropdown-item text-info edit-btn hover:text-info active:text-info"
                                            href="javascript:void(0);"><i class='bx bx-edit mr-1'></i>
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-danger delete-btn hover:text-info active:text-info"
                                            href="javascript:void(0);"><i class='bx bx-trash mr-1'></i>
                                            Delete
                                        </a>
                                    </li>`;

                                console.log();

                                let commentHtml = `
                                    <li class="d-grid p-3 mt-2">
                                        <div class="row">
                                            <!-- comment header -->
                                            <div class ="col-2">
                                                <img src="${avatarUrl}" alt="collapse-image" class="me-4 mb-sm-0 mb-2" height="125"
                                                style="max-width: 100%; border-radius: 50%; aspect-ratio: 1/1;" />
                                            </div>
                                            <div class="flex flex-col gap-2 col-8">
                                                <div class="flex align-items-center gap-2">
                                                    <span class="font-semibold">${comment.user.name}</span>
                                                    <span class="text-muted text-xs">${timeAgo}</span>
                                                </div>
                                                <span class="spanEdit" id="commentbody${comment.id}">${comment.comments}</span>
                                                <div class="flex align-items-center gap-4">
                                                    <input type="checkbox" id="comment${comment.id}" hidden ${checked}>

                                                    <a class="flex gap-2 cursor-default">
                                                        <img src="${imgSrc}" id="${comment.id}"
                                                            style="height: 25px; aspect-ratio:1;"
                                                            class="heart${comment.id} comment-react-btn cursor-pointer
                                                                    ease-in-out duration-300 hover:scale-125">
                                                        <span class="comment_reaction_count${comment.id}">${comment.reaction_count}</span>
                                                    </a>
                                                </div>
                                        </div>
                                        <div class="col-2">

                                            <div class="btn-group">
                                                <a href="javascript:void(O);" class="dropdown-toggle hide-arrow cursor-pointer hover:text-indigo-500 hover:scale-125" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu1 commentDropdown dropdown-menu-end mt-1" style="">
                                                    ${dropdownOptions}
                                                </ul>
                                            </div>
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
