@extends('layouts.guest')

@section('head')
    <title>Forgot Password | Uplift</title>
@endsection

@section('content')
    <h4 class="mb-2 flex justify-center">Forgot Password? 🔒</h4>
    <p class="my-4 text-sm px-3 py-2 bg-primary-subtle rounded-1">Enter your email and we'll send you instructions to reset your password</p>
    <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                autofocus required />
        </div>
        <button type="submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
    </form>
    <div class="text-center flex justify-center align-items-center">
        <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
            Back to login
        </a>
    </div>
@endsection

@push('scripts')
    @if (session('status'))
        <script>
            butterup.toast({
                title: 'Email Sent!',
                message: '{{ session('status') }}',
                type: 'success',
                icon: true,
                dismissable: true,
            });
        </script>
    @endif
@endpush
