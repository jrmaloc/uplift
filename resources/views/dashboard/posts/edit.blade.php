@extends('layouts.app')

@section('head')
    <title>Edit | Posts</title>

    <style>
        .checkbox-wrapper-34 {
            --blue: #0D7EFF;
            --g08: #e8fade;
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

        .checkActive {
            animation: .4s public 1;
        }

        @keyframes public {
            0% {
                scale: 1.25;
                transform: rotate(35deg);
            }

            25% {
                scale: 1.50;
                transform: rotate(-35deg);
            }

            50% {
                scale: 1.75;
                transform: rotate(45deg);
            }

            75% {
                scale: 1.25;
                transform: rotate(-45deg);
            }

            100% {
                scale: 1;
                transform: rotate(0deg);
            }
        }
    </style>
@endsection

@section('content')
    <div class="flex justify-end mr-20 mt-8">
        <a href="{{ route('dashboard.posts.index') }}" class="btn btn-dark"><i class='bx bx-left-arrow-alt mr-1'></i>Back to
            List</a>
    </div>
    <div class="card mt-2 mx-20">
        <div class="card-header">
            <div class="row">
                <div class="col-11 flex justify-center">
                    <span class="h3 uppercase">Edit Post</span>
                </div>
            </div>
        </div>
        <form action="" id="editPostForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-12 mb-2">
                        <label for="edit-caption" class="form-label">Caption</label>
                        <input id="edit-caption" class="form-control " type="text" name="caption"
                            value="{{ $post->caption }}" autofocus>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <label for="edit-description" class="form-label">description</label>
                        <textarea class="form-control" id="edit-description" name="description" rows="4">{{ $post->description }}</textarea>
                    </div>
                </div>

                <style>
                    #text .text-white {
                        opacity: 0 !important;
                    }

                    #text:hover {
                        --tw-bg-opacity: 0.45;
                        background-color: rgb(239 68 68 / var(--tw-bg-opacity));
                    }

                    #text:hover .text-white {
                        opacity: 1 !important;
                    }
                </style>

                <div class="relative max-w-xs overflow-hidden bg-cover bg-[50%] bg-no-repeat">
                    <img src="https://tecdn.b-cdn.net/img/Photos/Others/mewa.jpg" class="max-w-xs" />
                    <div
                        class="absolute cursor-pointer bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed ease-in-out duration-300">
                        <div id="text" class="flex h-full items-center justify-center ease-in-out duration-300">
                            <p id="test-text" class="text-white ease-in-out duration-300"><i class='bx bxs-trash'
                                    style="font-size: 5rem;"></i></p>
                        </div>
                    </div>
                </div>

                {{-- photos --}}
                <div class="">
                    <div class="flex flex-col justify-st bg-indigo-100 rounded-md mb-2 py-2 p-4">
                        <label for="uploadPhoto" class="btn btn-secondary w-max ml-auto">
                            <input type="file" name="uploadPhoto[]" id="uploadPhoto" accept="image/*" multiple hidden>
                            <i class='bx bx-image-add'></i>
                        </label>

                        <a href="javascript:void(0);" class="btn btn-danger w-max ml-auto d-none"><i
                                class='bx bx-x'></i></a>

                        <div id="preview" class="mt-4 w-100 flex flex-wrap gap-2">
                            <div class="relative max-w-xs overflow-hidden bg-cover bg-[50%] bg-no-repeat col-4">
                                <img src="https://tecdn.b-cdn.net/img/Photos/Others/mewa.jpg" class="max-w-xs" />
                                <div
                                    class="absolute cursor-pointer bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed ease-in-out duration-300">
                                    <div id="text"
                                        class="flex h-full items-center justify-center ease-in-out duration-300">
                                        <p id="test-text" class="text-white ease-in-out duration-300"><i
                                                class='bx bxs-trash' style="font-size: 5rem;"></i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="relative max-w-xs overflow-hidden bg-cover bg-[50%] bg-no-repeat col-4">
                                <img src="https://tecdn.b-cdn.net/img/Photos/Others/mewa.jpg" class="max-w-xs" />
                                <div
                                    class="absolute cursor-pointer bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed ease-in-out duration-300">
                                    <div id="text"
                                        class="flex h-full items-center justify-center ease-in-out duration-300">
                                        <p id="test-text" class="text-white ease-in-out duration-300"><i
                                                class='bx bxs-trash' style="font-size: 5rem;"></i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="relative max-w-xs overflow-hidden bg-cover bg-[50%] bg-no-repeat col-4">
                                <img src="https://tecdn.b-cdn.net/img/Photos/Others/mewa.jpg" class="max-w-xs" />
                                <div
                                    class="absolute cursor-pointer bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed ease-in-out duration-300">
                                    <div id="text"
                                        class="flex h-full items-center justify-center ease-in-out duration-300">
                                        <p id="test-text" class="text-white ease-in-out duration-300"><i
                                                class='bx bxs-trash' style="font-size: 5rem;"></i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="relative max-w-xs overflow-hidden bg-cover bg-[50%] bg-no-repeat col-4">
                                <img src="https://tecdn.b-cdn.net/img/Photos/Others/mewa.jpg" class="max-w-xs" />
                                <div
                                    class="absolute cursor-pointer bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed ease-in-out duration-300">
                                    <div id="text"
                                        class="flex h-full items-center justify-center ease-in-out duration-300">
                                        <p id="test-text" class="text-white ease-in-out duration-300"><i
                                                class='bx bxs-trash' style="font-size: 5rem;"></i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="relative max-w-xs overflow-hidden bg-cover bg-[50%] bg-no-repeat col-4">
                                <img src="https://tecdn.b-cdn.net/img/Photos/Others/mewa.jpg" class="max-w-xs" />
                                <div
                                    class="absolute cursor-pointer bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed ease-in-out duration-300">
                                    <div id="text"
                                        class="flex h-full items-center justify-center ease-in-out duration-300">
                                        <p id="test-text" class="text-white ease-in-out duration-300"><i
                                                class='bx bxs-trash' style="font-size: 5rem;"></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $photos = json_decode($post->photos, true);
                    @endphp

                    {{ $photos = $photos == null ? '' : $photos }}
                    {{-- <div class="d-grid d-sm-flex p-3 row border-0">
                        <div class="flex flex-col justify-center gap-2 col-4">
                            <label for="photo_upload1" class="cursor-pointer">
                                @if (isset($photos[0]) && $photos[0] !== null)
                                    <img src="{{ URL::asset($photos[0]) }}" alt="uploaded photo" accept="image/*"
                                        class="mb-sm-0 mb-2 aspect-square rounded-md" id="img_1" style="width: 300px;">
                                @else
                                    <img src="{{ URL::asset('avatars/image.png') }}" alt="default photo"
                                        class="mb-sm-0 mb-2 aspect-square rounded-md" id="img_1" style="width: 300px;">
                                @endif
                                <input type="file" name="photo_upload1" id="photo_upload1" hidden
                                    class="account-file-input">
                                <span class="badge bg-label-secondary flex mt-2 justify-center cursor-pointer"
                                    id="upload-btn1">{{ $post->photos != null ? 'Change' : 'Upload' }}</span>
                            </label>
                        </div>
                        <div class="flex flex-col justify-center gap-2 col-4">
                            <label for="photo_upload2" class="cursor-pointer">
                                @if (isset($photos[1]) && $photos[1] !== null)
                                    <img src="{{ URL::asset($photos[1]) }}" alt="uploaded photo" accept="image/*"
                                        class="mb-sm-0 mb-2 aspect-square rounded-md" id="img_2" style="width: 300px;">
                                @else
                                    <img src="{{ URL::asset('avatars/image.png') }}" alt="default photo"
                                        class="mb-sm-0 mb-2 aspect-square rounded-md" id="img_2" style="width: 300px;">
                                @endif
                                <input type="file" name="photo_upload2" id="photo_upload2" hidden>
                                <span class="badge bg-label-secondary flex mt-2 justify-center cursor-pointer"
                                    id="upload-btn2">{{ $post->photos != null ? 'Change' : 'Upload' }}</span>
                            </label>
                        </div>
                        <div class="flex flex-col justify-center gap-2 col-4">
                            <label for="photo_upload3" class="cursor-pointer">
                                @if (isset($photos[2]) && $photos[2] !== null)
                                    <img src="{{ URL::asset($photos[2]) }}" alt="uploaded photo" accept="image/*"
                                        class="mb-sm-0 mb-2 aspect-square rounded-md" id="img_3" style="width: 300px;">
                                @else
                                    <img src="{{ URL::asset('avatars/image.png') }}" alt="default photo"
                                        class="mb-sm-0 mb-2 aspect-square rounded-md" id="img_3" style="width: 300px;">
                                @endif
                                <input type="file" name="photo_upload3" id="photo_upload3" hidden>
                                <span class="badge bg-label-secondary flex mt-2 justify-center cursor-pointer"
                                    id="upload-btn3">{{ $post->photos != null ? 'Change' : 'Upload' }}</span>
                            </label>
                        </div>
                    </div> --}}
                </div>

                <div>
                    <hr>
                </div>

                {{-- tags --}}
                <div class="my-3">
                    <label for="tags" class="form-label mb-2 w-100"> tags:
                        <select class="form-control mb-2 mr-2" id="edit-tags" name="tags[]" multiple="multiple">
                            <option value="Faith" {{ in_array('Faith', $tags) ? 'selected' : '' }}>Faith</option>
                            <option value="Family" {{ in_array('Family', $tags) ? 'selected' : '' }}>Family
                            </option>
                            <option value="Finance" {{ in_array('Finance', $tags) ? 'selected' : '' }}>Finance
                            </option>
                            <option value="Health" {{ in_array('Health', $tags) ? 'selected' : '' }}>Health
                            </option>
                            <option value="Studies" {{ in_array('Studies', $tags) ? 'selected' : '' }}>Studies
                            </option>
                            <option value="Work" {{ in_array('Work', $tags) ? 'selected' : '' }}>Work</option>

                            @foreach ($options as $option)
                                <option value="{{ $option }}" selected>{{ $option }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                {{-- switch button --}}
                <div class="flex align-items-center gap-2 mt-3">
                    <label for="anonymous" class="form-label mt-2">Post Anonymously?</label>
                    <div class="checkbox-wrapper-34">
                        <input class="tgl tgl-ios" name="privacy" id="anonymous" type="checkbox"
                            {{ $post->privacy == 'public' ? '' : 'checked' }}>
                        <label class="tgl-btn" for="anonymous"></label>
                    </div>
                    <div class="flex">
                        <span title="public">
                            <?xml version="1.0" ?><svg viewBox="0 0 496 512" width="15" id="public"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="#878787"
                                    d="M248 8C111.03 8 0 119.03 0 256s111.03 248 248 248 248-111.03 248-248S384.97 8 248 8zm82.29 357.6c-3.9 3.88-7.99 7.95-11.31 11.28-2.99 3-5.1 6.7-6.17 10.71-1.51 5.66-2.73 11.38-4.77 16.87l-17.39 46.85c-13.76 3-28 4.69-42.65 4.69v-27.38c1.69-12.62-7.64-36.26-22.63-51.25-6-6-9.37-14.14-9.37-22.63v-32.01c0-11.64-6.27-22.34-16.46-27.97-14.37-7.95-34.81-19.06-48.81-26.11-11.48-5.78-22.1-13.14-31.65-21.75l-.8-.72a114.792 114.792 0 0 1-18.06-20.74c-9.38-13.77-24.66-36.42-34.59-51.14 20.47-45.5 57.36-82.04 103.2-101.89l24.01 12.01C203.48 89.74 216 82.01 216 70.11v-11.3c7.99-1.29 16.12-2.11 24.39-2.42l28.3 28.3c6.25 6.25 6.25 16.38 0 22.63L264 112l-10.34 10.34c-3.12 3.12-3.12 8.19 0 11.31l4.69 4.69c3.12 3.12 3.12 8.19 0 11.31l-8 8a8.008 8.008 0 0 1-5.66 2.34h-8.99c-2.08 0-4.08.81-5.58 2.27l-9.92 9.65a8.008 8.008 0 0 0-1.58 9.31l15.59 31.19c2.66 5.32-1.21 11.58-7.15 11.58h-5.64c-1.93 0-3.79-.7-5.24-1.96l-9.28-8.06a16.017 16.017 0 0 0-15.55-3.1l-31.17 10.39a11.95 11.95 0 0 0-8.17 11.34c0 4.53 2.56 8.66 6.61 10.69l11.08 5.54c9.41 4.71 19.79 7.16 30.31 7.16s22.59 27.29 32 32h66.75c8.49 0 16.62 3.37 22.63 9.37l13.69 13.69a30.503 30.503 0 0 1 8.93 21.57 46.536 46.536 0 0 1-13.72 32.98zM417 274.25c-5.79-1.45-10.84-5-14.15-9.97l-17.98-26.97a23.97 23.97 0 0 1 0-26.62l19.59-29.38c2.32-3.47 5.5-6.29 9.24-8.15l12.98-6.49C440.2 193.59 448 223.87 448 256c0 8.67-.74 17.16-1.82 25.54L417 274.25z" />
                            </svg>
                        </span>

                        <span title="anonymous">
                            <?xml version="1.0" ?><svg fill="none" width="18" viewBox="0 0 24 24"
                                id="incognito" class="d-none" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.5 11.75C20.1233 11.75 22.25 13.8766 22.25 16.5C22.25 19.1234 20.1233 21.25 17.5 21.25C15.402 21.25 13.6216 19.8898 12.9927 18.0032H11.0072C10.3783 19.8898 8.59799 21.25 6.49998 21.25C3.87663 21.25 1.74998 19.1234 1.74998 16.5C1.74998 13.8766 3.87663 11.75 6.49998 11.75C8.95456 11.75 10.9743 13.6118 11.224 16.0003H12.776C13.0257 13.6118 15.0454 11.75 17.5 11.75ZM6.49998 13.75C4.9812 13.75 3.74998 14.9812 3.74998 16.5C3.74998 18.0188 4.9812 19.25 6.49998 19.25C8.01876 19.25 9.24998 18.0188 9.24998 16.5C9.24998 14.9812 8.01876 13.75 6.49998 13.75ZM17.5 13.75C15.9812 13.75 14.75 14.9812 14.75 16.5C14.75 18.0188 15.9812 19.25 17.5 19.25C19.0188 19.25 20.25 18.0188 20.25 16.5C20.25 14.9812 19.0188 13.75 17.5 13.75ZM15.5119 3C16.7263 3 17.797 3.79659 18.1459 4.95979L19.1521 8.31093C19.9446 8.44285 20.7203 8.59805 21.479 8.77658C22.0166 8.90308 22.3499 9.44144 22.2234 9.97904C22.0969 10.5166 21.5585 10.8499 21.0209 10.7234C18.2654 10.0751 15.2586 9.75 12 9.75C8.74132 9.75 5.73456 10.0751 2.97902 10.7234C2.44142 10.8499 1.90306 10.5166 1.77656 9.97904C1.65007 9.44144 1.98334 8.90308 2.52094 8.77658C3.27938 8.59813 4.05471 8.44298 4.84691 8.3111L5.85402 4.95979C6.20298 3.79659 7.27362 3 8.48804 3H15.5119Z"
                                    fill="#878787" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="flex justify-end gap-2">
                    <button type="submit" class="btn btn-primary">Update <i class='bx bx-right-arrow-alt'></i></button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#edit-tags').select2({
                tags: true,
                allowClear: true,
                placeholder: {
                    id: '-1', // the value of the option
                    text: 'Select an option'
                },
            });

            if ($('#anonymous').prop('checked')) {
                console.log('wewak');
                $('#public').addClass('d-none');
                $('#incognito').removeClass('d-none');
            }




            $('.tgl-btn').click(function() {
                if ($('#anonymous').is(':checked')) {
                    $('#incognito').addClass('d-none');
                    $('#public').removeClass('d-none');
                    $('#public').addClass('checkActive');
                } else {
                    $('#public').addClass('d-none');
                    $('#incognito').removeClass('d-none');
                    $('#incognito').addClass('checkActive');
                }
            });

            var uploadedFiles = [];
            // upload photos
            $('#uploadPhoto').change(function() {
                var files = $(this)[0].files;

                // Clear previous previews
                // $('#preview').empty();

                // Loop through the files and create img elements
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var img = $('<img src="' + URL.createObjectURL(file) +
                        '" class="col-4 aspect-square rounded-lg my-2 ease-in-out duration-300 cursor-pointer" style="width:320px;">' +
                        '<div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-purple-700 bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-20"></div></div>'
                    );
                    img.appendTo('#preview');

                    uploadedFiles.push(file);
                }
            });

            // $('#photo_upload2').change(function() {
            //     console.log('Upload');
            //     const file = this.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function(e) {
            //             $('#img_2').attr('src', e.target.result).show();
            //         }
            //         reader.readAsDataURL(file);

            //         $('#upload-btn2').text('Change');
            //     } else {
            //         console.log('no file');
            //     }
            // });

            // $('#photo_upload3').change(function() {
            //     console.log('Upload');
            //     const file = this.files[0];
            //     if (file) {
            //         const reader = new FileReader();
            //         reader.onload = function(e) {
            //             $('#img_3').attr('src', e.target.result).show();
            //         }
            //         reader.readAsDataURL(file);

            //         $('#upload-btn3').text('Change');
            //     } else {
            //         console.log('no file');
            //     }
            // });
            // ---- upload photos

            // edit
            $(document).on('submit', '#editPostForm', function(e) {
                e.preventDefault();

                var id = {{ $post->id }};
                var formData = new FormData();

                var caption = $('#edit-caption').val();
                var content = $('#edit-description').val();
                var tags = $('#edit-tags').val();

                var upload1 = $('#photo_upload1').prop('files')[0];
                var upload2 = $('#photo_upload2').prop('files')[0];
                var upload3 = $('#photo_upload3').prop('files')[0];

                console.log();

                if ($('#anonymous').is(':checked')) {
                    var privacy = 'private';
                } else {
                    var privacy = 'public';
                }

                formData.append('caption', caption);
                formData.append('content', content);
                formData.append('tags', tags);
                formData.append('privacy', privacy);
                formData.append('_method', 'PUT');
                formData.append('upload1', upload1);
                formData.append('upload2', upload2);
                formData.append('upload3', upload3);

                // Append each file to FormData
                for (var i = 0; i < tags.length; i++) {
                    formData.append('tags[]', tags[i]);
                }

                $.ajax({
                    url: "{{ route('dashboard.posts.update', [':id']) }}".replace(':id', id),
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 200) {
                            butterup.toast({
                                title: 'Success!',
                                message: response.message,
                                type: 'success',
                                icon: true,
                                dismissable: true
                            });
                        } else {
                            butterup.toast({
                                title: 'Heads Up!',
                                message: 'Something went wrong! Please try again',
                                type: 'warning',
                                icon: true,
                                dismissable: true
                            });
                        }
                    },
                    error: function(error) {
                        butterup.toast({
                            title: 'Error!',
                            message: error.message,
                            type: 'error',
                            icon: true,
                            dismissable: true
                        });
                    }
                });
            })
        });
    </script>
@endpush
