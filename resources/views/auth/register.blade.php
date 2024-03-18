<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/butterup.css') }}">

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ URL::asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ URL::asset('assets/js/config.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ URL::asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/js/butterup.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Content -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                butterup.toast({
                    title: 'Oops! Warning',
                    message: '{{ $error }}',
                    type: 'warning',
                    icon: true,
                    dismissable: false,
                });
            </script>
        @endforeach
    @endif

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="#!" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bold uppercase">Uplift</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Adventure starts here 🚀</h4>
                        <p class="mb-4">Make your app management easy and fun!</p>

                        <form id="formRegistration" class="mb-3" method="POST"
                            action="{{ route('auth.register') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="input-name">Full Name</label>
                                <div class="input-group input-group-merge">
                                    <span id="input-name2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" name="name" class="form-control rounded-md" id="input-name"
                                        value="{{ old('name') }}" placeholder="Juan Dela Cruz" autofocus
                                        autocomplete="name" />
                                </div>
                                @error('name')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="input-email">Email</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="email" id="input-email" name="email"
                                        class="form-control rounded-md" value="{{ old('email') }}"
                                        placeholder="example" autocomplete="email" />
                                    <span id="input-email2" class="input-group-text">@example.com</span>
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
                                    <input type="text" id="input-username" name="username"
                                        class="form-control rounded-md" value="{{ old('username') }}"
                                        placeholder="jdelacruz" autocomplete="username" />
                                </div>
                                @error('username')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions"
                                        name="terms">
                                    <label class="form-check-label" for="terms-conditions">
                                        I agree to
                                        <a href="javascript:void(0);">privacy policy & terms</a>
                                    </label>
                                </div>
                            </div>

                            <button id="sign-up" type="submit" class="btn btn-primary d-grid w-100" disabled>Sign
                                up</button>
                        </form>

                        <p class="text-center text-sm mt-4">
                            <span>Already have an account?</span>
                            <a href="{{ route('login') }}">
                                <span>Sign in instead</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ URL::asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/js/butterup.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ URL::asset('/assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <script>
        $(document).ready(function() {
            $("#terms-conditions").on('click', function(e) {
                if ($("#terms-conditions").prop('checked')) {
                    $("#sign-up").prop('disabled', false);
                } else {
                    $("#sign-up").prop('disabled', true);
                }
            });

            var errorSpan = $('span.text-danger').first();

            if (errorSpan.length > 0) {
                var inputField = errorSpan.closest('.mb-3').find('input');

                if (inputField.length > 0) {
                    inputField.focus();
                }
            }

            // after registration, rekta login here
            $('#formAuthentication').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('login') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 200) {
                            window.location.href = "{{ route('dashboard') }}";
                        } else {
                            butterup.toast({
                                title: response.error,
                                message: response.message,
                                type: 'error',
                                icon: true,
                                dismissable: false,
                            });
                        }
                    },
                    error: function(error) {
                        butterup.toast({
                            title: "Something went wrong",
                            message: "Please try again.",
                            type: 'error',
                            icon: true,
                            dismissable: false,
                        });
                    }
                })
            })
        })
    </script>
</body>

</html>
