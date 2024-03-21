@extends('layouts.guest')

@section('head')
    <title>Login | Uplift</title>
@endsection

@section('content')
    <!-- Content -->
    <h4 class="mb-2">Welcome to Uplift! 👋</h4>
    <p class="mb-4">Please sign-in to your account</p>

    <form id="formAuthentication" class="mb-3" action="{{ route('auth.login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email-username" class="form-label">Email or Username</label>
            <input type="text" class="form-control" id="email-username" name="email-username"
                placeholder="Enter your email or username" autofocus required />
            @error('email-username')
                <span class="text-xs text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="{{ route('password.request') }}" class="hover:text-indigo-500">
                    <small>Forgot Password?</small>
                </a>
            </div>
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" required />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @error('password')
                <span class="text-xs text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
        </div>
    </form>

    <p class="text-center">
        <span>Don't have an account yet?</span>
        <a href="{{ route('register') }}" class=" hover:text-indigo-500">
            <span>Create an account</span>
        </a>
    </p>
@endsection

@push('scripts')
    @if (session('error'))
        <script>
            butterup.toast({
                title: 'Warnng!',
                message: '{{ session('error') }}',
                type: 'error',
                icon: true,
                dismissable: true,
            });
        </script>
    @endif

    <script></script>
@endpush
