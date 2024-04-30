@extends('layouts.account')

@section('head')
    <title>Edit - Users</title>

    <style>
        .bg-secondary {
            background-color: #f7fafc !important;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .shadow,
        .card-profile-image img {
            box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
        }

        .m-0 {
            margin: 0 !important;
        }

        .mt-0 {
            margin-top: 0 !important;
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .mr-2 {
            margin-right: .5rem !important;
        }

        .ml-2 {
            margin-left: .5rem !important;
        }

        .mr-3 {
            margin-right: 1rem !important;
        }

        .mt-4,
        .my-4 {
            margin-top: 1.5rem !important;
        }

        .mr-4 {
            margin-right: 1.5rem !important;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        .mb-5 {
            margin-bottom: 3rem !important;
        }

        .mt--7 {
            margin-top: -6rem !important;
        }

        .pt-0 {
            padding-top: 0 !important;
        }

        .pr-0 {
            padding-right: 0 !important;
        }

        .pb-0 {
            padding-bottom: 0 !important;
        }

        .pt-5 {
            padding-top: 3rem !important;
        }

        .pt-8 {
            padding-top: 8rem !important;
        }

        .pb-8 {
            padding-bottom: 8rem !important;
        }

        .m-auto {
            margin: auto !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }

        .font-weight-light {
            font-weight: 300 !important;
        }

        .font-weight-bold {
            font-weight: 600 !important;
        }

        .text-white {
            color: #fff !important;
        }

        .text-white {
            color: #fff !important;
        }

        a.text-white:hover,
        a.text-white:focus {
            color: #e6e6e6 !important;
        }

        .text-muted {
            color: #8898aa !important;
        }

        @media print {

            *,
            *::before,
            *::after {
                box-shadow: none !important;
                text-shadow: none !important;
            }

            a:not(.btn) {
                text-decoration: underline;
            }

            img {
                page-break-inside: avoid;
            }

            p,
            h3 {
                orphans: 3;
                widows: 3;
            }

            h3 {
                page-break-after: avoid;
            }

            @ page {
                size: a3;
            }

            body {
                min-width: 992px !important;
            }

            .container {
                min-width: 992px !important;
            }

            .navbar {
                display: none;
            }
        }

        figcaption,
        main {
            display: block;
        }

        main {
            overflow: hidden;
        }

        .bg-white {
            background-color: #fff !important;
        }

        a.bg-white:hover,
        a.bg-white:focus,
        button.bg-white:hover,
        button.bg-white:focus {
            background-color: #e6e6e6 !important;
        }

        .bg-gradient-default {
            background: linear-gradient(87deg, rgba(50, 51, 115, 1) 0%, rgba(50, 51, 115, 1) 100%) !important;
        }

        @keyframes floating-lg {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(15px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @keyframes floating {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @keyframes floating-sm {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(5px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .opacity-8 {
            opacity: .8 !important;
        }

        .opacity-8 {
            opacity: .9 !important;
        }

        .center {
            left: 50%;
            transform: translateX(-50%);
        }

        [class*='shadow'] {
            transition: all .15s ease;
        }

        .font-weight-300 {
            font-weight: 300 !important;
        }

        .text-sm {
            font-size: .875rem !important;
        }

        .text-white {
            color: #fff !important;
        }

        a.text-white:hover,
        a.text-white:focus {
            color: #e6e6e6 !important;
        }

        .btn {
            font-size: .875rem;
            position: relative;
            transition: all .15s ease;
            letter-spacing: .025em;
            text-transform: none;
            will-change: transform;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
        }

        .btn:not(:last-child) {
            margin-right: .5rem;
        }

        .btn i:not(:first-child) {
            margin-left: .5rem;
        }

        .btn i:not(:last-child) {
            margin-right: .5rem;
        }

        .input-group .btn {
            margin-right: 0;
            transform: translateY(0);
        }

        .btn-sm {
            font-size: .75rem;
        }

        [class*='btn-outline-'] {
            border-width: 1px;
        }

        .card-profile-image {
            position: relative;
        }

        .card-profile-image img {
            position: absolute;
            left: 50%;
            max-width: 180px;
            transition: all .15s ease;
            transform: translate(-50%, -30%);
            border-radius: .375rem;
        }

        .card-profile-image img:hover {
            transform: translate(-50%, -33%);
        }

        .card-profile-stats {
            padding: 1rem 0;
        }

        .card-profile-stats>div {
            margin-right: 1rem;
            padding: .875rem;
            text-align: center;
        }

        .card-profile-stats>div:last-child {
            margin-right: 0;
        }

        .card-profile-stats>div .heading {
            font-size: 1.1rem;
            font-weight: bold;
            display: block;
        }

        .card-profile-stats>div .description {
            font-size: .875rem;
            color: #adb5bd;
        }

        .main-content {
            position: relative;
        }

        .main-content .navbar-top {
            position: absolute;
            z-index: 1;
            top: 0;
            left: 0;
            width: 100%;
            padding-right: 0 !important;
            padding-left: 0 !important;
            background-color: transparent;
        }

        @media (min-width: 768px) {
            .main-content .container-fluid {
                padding-right: 39px !important;
                padding-left: 39px !important;
            }
        }

        .header {
            position: relative;
        }

        .mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: all .15s ease;
        }

        .progress {
            overflow: hidden;
            height: 8px;
            margin-bottom: 1rem;
            border-radius: .25rem;
            background-color: #e9ecef;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
        }

        p {
            font-size: 1rem;
            font-weight: 300;
            line-height: 1.7;
        }

        .description {
            font-size: .875rem;
        }

        .heading {
            font-size: .95rem;
            font-weight: 600;
            letter-spacing: .025em;
            text-transform: uppercase;
        }

        .heading-small {
            font-size: .75rem;
            padding-top: .25rem;
            padding-bottom: .25rem;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        [type='text'] {
            border-radius: 5px;
        }

        .col-lg-6,
        .col-md-12,
        .col-lg-4 {
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')
    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="settingsOffcanvas" aria-labelledby="settingsOffcanvasLabel">
        <div class="offcanvas-header">
            <h3 id="settingsOffcanvasLabel" class="h4 offcanvas-title">User Settings</h3>
            <button type="button" class="btn-close text-reset flex justify-center align-items-center"
                data-bs-dismiss="offcanvas" aria-label="Close"><span class="bx bx-x text-2xl"></span></button>
        </div>
        <div class="offcanvas-body mt-8 mx-0 flex-grow-0">
            ---
        </div>
    </div>

    <x-modal id="passwordModal" title="Edit Password" formID="changePassForm">
        <div class="mb-3 form-password-toggle col-8 mx-auto">
            <label class="form-label" for="old_password">Current Password</label>
            <div class="input-group input-group-merge">
                <input type="password" id="old_password" class="form-control" name="old_password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @error('password')
                <span class="text-danger text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 form-password-toggle col-8 mx-auto">
            <label class="form-label" for="new_password">New Password</label>
            <div class="input-group input-group-merge">
                <input type="password" id="new_password" class="form-control" name="new_password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @error('password')
                <span class="text-danger text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 form-password-toggle col-8 mx-auto">
            <label class="form-label" for="confirm_password">Confirm Password</label>
            <div class="input-group input-group-merge">
                <input type="password" id="confirm_password" class="form-control" name="confirm_password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @error('password')
                <span class="text-danger text-xs">{{ $message }}</span>
            @enderror
        </div>

        <x-slot:footer>
            <button type="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </x-slot>
    </x-modal>

    <x-modal id="deleteAccountModal" formID="deleteAccountForm" title="Delete Account">
        <p class="text-sm flex" style="text-align: justify;">Are you sure you want to delete your account? Once your account
            is deleted, all of its resources and data will be
            permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
        </p>

        <div class="mt-8 form-password-toggle col-10 mx-auto">
            <label class="form-label" for="delete_password">Your Password</label>
            <div class="input-group input-group-merge">
                <input type="password" id="delete_password" class="form-control" name="delete_password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @error('password')
                <span class="text-danger text-xs">{{ $message }}</span>
            @enderror
        </div>

        <x-slot:footer>
            <button type="button" class="btn btn-secondary">Reset</button>
            <button type="button" class="btn btn-danger delete-acc-btn" disabled>Delete Account</button>
        </x-slot>
    </x-modal>


    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
        style="min-height: 600px; background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8 rounded-md"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">

        </div>
    </div>



    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-5 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <style>
                                    .card-profile-image img {
                                        max-width: 180px !important;
                                        min-width: 180px !important;
                                        max-height: 180px !important;
                                        min-height: 180px !important;
                                    }
                                </style>
                                <form action="POST" id="dp_upload">
                                    @csrf
                                    @if (!$user->avatar)
                                        {{ 'WEWAKKK' }}
                                    @endif
                                    <label href="#" for="upload" id="profile">
                                        <img id="avatar" src="{{ $user->avatar ?  URL::asset($user->avatar) : URL::asset('avatars/user.png') }}" class="rounded-circle">
                                        <input type="file" name="file" id="upload" class="account-file-input"
                                            hidden="" accept="image/png, image/jpeg">
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            {{-- <a href="#" class="btn btn-sm btn-info mr-4">Connect</a> --}}
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">Friends</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">Posts</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 id="name" class="h3">
                                {{ $user->name }}<span class="font-weight-light" id="age">,
                                    {{ $age }}</span>
                            </h3>
                            <hr class="my-4">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <h3 class="mb-0">My account</h3>
                            </div>
                            <div class="col-7 text-right">
                                <a href="#passwordModal" data-bs-toggle="modal" class="btn btn-sm btn-info">Edit
                                    Password<span class="bx ml-2 bxs-edit"></span></a>
                                <a href="#deleteAccountModal" data-bs-toggle="modal" class="btn btn-sm btn-danger">Delete
                                    Account<span class="bx ml-2 bxs-tag-x"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="userUpdateForm" method="POST">
                            @csrf
                            @method('PUT')
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Username<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="input-username" name="username"
                                                class="form-control form-control-alternative" placeholder="Username"
                                                value="{{ $user->username }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address<span
                                                    class="text-danger">*</span></label>
                                            <input type="email" id="input-email" name="email"
                                                class="form-control form-control-alternative"
                                                placeholder="abc@example.com" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Full name<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="input-full-name" name="name"
                                                class="form-control form-control-alternative" placeholder="Juan Dela Cruz"
                                                value="{{ $user->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-contact_number">Contact
                                                Number<span class="text-danger">*</span></label>
                                            <input type="tel" id="input-contact_number" name="contact_number"
                                                class="form-control form-control-alternative" placeholder="0912 345 6789"
                                                value="{{ $user->contact_number }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-dob">Birthday<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="input-dob" value="{{ $user->birthday }}"
                                                class="form-control form-control-alternative" name="birthday"
                                                placeholder="Select a date...">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-gender">Gender<span
                                                    class="text-danger">*</span></label>
                                            <select name="gender" id="input-gender" class="form-control">
                                                <option value="" disabled selected>Select one</option>
                                                <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>
                                                    Brother</option>
                                                <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>
                                                    Sister</option>
                                                <option value="others" {{ $user->gender === 'others' ? 'selected' : '' }}>
                                                    Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">About me</h6>
                            <div class="pl-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="bio">Bio<span
                                            class="text-danger">*</span></label>
                                    <textarea id="bio" name="bio" rows="4" class="form-control form-control-alternative"
                                        placeholder="A few words about you ...">{{ $user->bio != null ? $user->bio : '' }}</textarea>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-end">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#input-dob').flatpickr({
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
            });

            $('#upload').change(function(e) {
                var file = e.target.files[0];

                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $('#avatar').attr('src', event.target.result);
                    };
                    reader.readAsDataURL(file);

                    $('#dp_upload').submit();
                }
            });

            $('#dp_upload').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                var id = {{ $auth->id }};

                // Append the file input to the FormData object
                var fileInput = $('#upload')[0]; // Replace 'upload' with the ID of your file input
                formData.append('file', fileInput.files[0]);

                // console.log(fileInput.files[0]);

                // Send the AJAX request
                $.ajax({
                    url: "{{ route('profile.store') }}",
                    type: 'POST', // Change to POST if your backend route handles file uploads via POST method
                    data: formData,
                    processData: false, // Important for handling file uploads
                    contentType: false, // Important for handling file uploads
                    success: function(data) {
                        if (data.status == 200) {
                            butterup.toast({
                                title: 'Upload Success!',
                                message: data.message,
                                type: 'success',
                                icon: true,
                                dismissable: true,
                            });
                        }
                    },
                    error: function(error) {
                        if (error.responseJSON && error.responseJSON.errors) {
                            var errors = error.responseJSON.errors;
                            for (var field in errors) {
                                if (errors.hasOwnProperty(field)) {
                                    var errorMessage = errors[field];
                                    butterup.toast({
                                        title: field,
                                        message: errorMessage,
                                        type: 'warning',
                                        icon: true,
                                        dismissable: true,
                                    });
                                }
                            }
                        } else {
                            butterup.toast({
                                title: "Error",
                                message: 'An unexpected error occurred',
                                type: 'error',
                                icon: true,
                                dismissable: true,
                            });
                        }
                    }
                });
            });

            var id = {{ $user->id }};

            $('#passwordModal').on('hidden.bs.modal', function() {
                $('input[type="password"]').val('');
            });

            $('#changePassForm').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('profile.change_password', [':profile']) }}".replace(':profile', id),
                    data: formData,
                    method: 'PUT',
                    success: function(response) {
                        $('#passwordModal').modal('hide');

                        if (response.status === 200) {
                            butterup.toast({
                                title: 'Success',
                                message: response.message,
                                type: 'success',
                                icon: true,
                                dismissable: true
                            });
                        } else if (response.status === 201) {
                            butterup.toast({
                                title: 'Heads Up!',
                                message: response.message,
                                type: 'warning',
                                icon: true,
                                dismissable: true
                            });
                        } else if (response.status === 500) {
                            butterup.toast({
                                title: 'Error!',
                                message: response.message,
                                type: 'error',
                                icon: true,
                                dismissable: true
                            });
                        }
                    }
                })
            });

            $('#userUpdateForm').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('account.users.update', [':user']) }}".replace(':user', id),
                    data: formData,
                    method: 'PUT',
                    success: function(response) {
                        if (response.status === 200) {
                            butterup.toast({
                                title: 'Success',
                                message: response.message,
                                type: 'success',
                                icon: true,
                                dismissable: true
                            });

                            $('#name').html(response.data.name + ', ' + response.age);
                        }
                    },
                    error: function(error) {
                        butterup.toast({
                            title: 'Oops! Something went wrong',
                            message: 'Please complete the form',
                            type: 'error',
                            icon: true,
                            dismissable: true
                        });
                    }
                })
            });

            $('#delete_password').on('input', function(e) {
                var val = $(this).val();

                $.ajax({
                    url: "{{ route('profile.check_password', [':profile']) }}".replace(':profile', id),
                    method: 'POST',
                    data: {
                        input: val
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            $('.delete-acc-btn').prop('disabled', false);
                        } else {
                            $('.delete-acc-btn').prop('disabled', true);
                        }
                    }
                })
            })

            $('.delete-acc-btn').on('click', function(e) {
                $('#deleteAccountModal').modal('hide');

                $('#deleteAccountModal').on('hidden.bs.modal', function() {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            e.preventDefault();

                            $.ajax({
                                url: "{{ route('account.users.destroy', [':user']) }}"
                                    .replace(':user', id),
                                method: 'DELETE',
                                success: function(response) {
                                    if (response.status === 200) {
                                        window.location.reload();
                                    } else if (response.status === 500) {
                                        butterup.toast({
                                            title: 'Error!',
                                            message: response.message,
                                            type: 'error',
                                            icon: true,
                                            dismissable: true
                                        });
                                    }
                                }
                            });
                        }
                    });
                });
            })
        });
    </script>
@endpush
