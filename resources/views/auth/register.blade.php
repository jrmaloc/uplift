@extends('layouts.guest')

@section('head')
    <title>Register | Uplift</title>
@endsection

@section('content')
    <h4 class="mb-2">Adventure starts here 🚀</h4>
    <p class="mb-4">Please complete the form below.</p>

    <form id="formAuthentication" class="mb-3" action="{{ route('auth.register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username"
                autofocus required/>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required/>
        </div>
        <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" required/>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                <label class="" for="terms-conditions">
                    <span class=" pointer-events-none">I agree to</span>
                    <a href="javascript:void(0);" class="hover:text-indigo-500">privacy policy &amp; terms</a>
                </label>
            </div>
        </div>
        <button class="btn btn-primary d-grid w-100" id="sign-up" disabled>Sign up</button>
    </form>

    <p class="text-center">
        <span>Already have an account?</span>
        <a href="{{ route('auth.login') }}" class="hover:text-indigo-500">
            <span>Sign in instead</span>
        </a>
    </p>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#terms-conditions').click(function() {
                if ($(this).prop("checked") == true) {
                    $('#sign-up').prop('disabled', false);
                } else {
                    $('#sign-up').prop('disabled', true);
                }
            });
        });
    </script>
@endpush
