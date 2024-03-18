@extends('layouts.app')

@section('head')
    <title>Edit - Users</title>

    <style>
        :root {
            --blue: #5e72e4;
            --indigo: #5603ad;
            --purple: #8965e0;
            --pink: #f3a4b5;
            --red: #f5365c;
            --orange: #fb6340;
            --yellow: #ffd600;
            --green: #2dce89;
            --teal: #11cdef;
            --cyan: #2bffc6;
            --white: #fff;
            --gray: #8898aa;
            --gray-dark: #32325d;
            --light: #ced4da;
            --lighter: #e9ecef;
            --primary: #5e72e4;
            --secondary: #f7fafc;
            --success: #2dce89;
            --info: #11cdef;
            --warning: #fb6340;
            --danger: #f5365c;
            --light: #adb5bd;
            --dark: #212529;
            --default: #172b4d;
            --white: #fff;
            --neutral: #fff;
            --darker: black;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
        }

        .container-fluid {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            padding-right: 15px;
            padding-left: 15px;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            border: 1px solid rgba(0, 0, 0, .05);
            border-radius: .375rem;
            background-color: #fff;
            background-clip: border-box;
        }

        .card>hr {
            margin-right: 0;
            margin-left: 0;
        }

        .card-body {
            padding: 1.5rem;
            flex: 1 1 auto;
        }

        .card-header {
            margin-bottom: 0;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, .05);
            background-color: #fff;
        }

        .card-header:first-child {
            border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;
        }

        @keyframes progress-bar-stripes {
            from {
                background-position: 1rem 0;
            }

            to {
                background-position: 0 0;
            }
        }

        .progress {
            font-size: .75rem;
            display: flex;
            overflow: hidden;
            height: 1rem;
            border-radius: .375rem;
            background-color: #e9ecef;
            box-shadow: inset 0 .1rem .1rem rgba(0, 0, 0, .1);
        }

        .media {
            display: flex;
            align-items: flex-start;
        }

        .media-body {
            flex: 1 1;
        }

        .bg-secondary {
            background-color: #f7fafc !important;
        }

        a.bg-secondary:hover,
        a.bg-secondary:focus,
        button.bg-secondary:hover,
        button.bg-secondary:focus {
            background-color: #d2e3ee !important;
        }

        .bg-default {
            background-color: #172b4d !important;
        }

        a.bg-default:hover,
        a.bg-default:focus,
        button.bg-default:hover,
        button.bg-default:focus {
            background-color: #0b1526 !important;
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

        .bg-white {
            background-color: #fff !important;
        }

        .border-0 {
            border: 0 !important;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .d-none {
            display: none !important;
        }

        .d-flex {
            display: flex !important;
        }

        @media (min-width: 768px) {

            .d-md-flex {
                display: flex !important;
            }
        }

        @media (min-width: 992px) {

            .d-lg-inline-block {
                display: inline-block !important;
            }

            .d-lg-block {
                display: block !important;
            }
        }

        .justify-content-center {
            justify-content: center !important;
        }

        .justify-content-between {
            justify-content: space-between !important;
        }

        .align-items-center {
            align-items: center !important;
        }

        @media (min-width: 1200px) {

            .justify-content-xl-between {
                justify-content: space-between !important;
            }
        }

        .float-right {
            float: right !important;
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

        @media (min-width: 768px) {

            .mt-md-5 {
                margin-top: 3rem !important;
            }

            .pt-md-4 {
                padding-top: 1.5rem !important;
            }

            .pb-md-4 {
                padding-bottom: 1.5rem !important;
            }
        }

        @media (min-width: 992px) {

            .pl-lg-4 {
                padding-left: 1.5rem !important;
            }

            .pt-lg-8 {
                padding-top: 8rem !important;
            }

            .ml-lg-auto {
                margin-left: auto !important;
            }
        }

        @media (min-width: 1200px) {

            .mb-xl-0 {
                margin-bottom: 0 !important;
            }
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

        .footer {
            padding: 2.5rem 0;
            background: #f7fafc;
        }

        .footer .nav .nav-item .nav-link {
            color: #8898aa !important;
        }

        .footer .nav .nav-item .nav-link:hover {
            color: #525f7f !important;
        }

        .footer .copyright {
            font-size: .875rem;
        }

        .form-control-label {
            font-size: .875rem;
            font-weight: 600;
            color: #525f7f;
        }

        .form-control {
            font-size: .875rem;
        }

        .form-control:focus:-ms-input-placeholder {
            color: #adb5bd;
        }

        .form-control:focus::-ms-input-placeholder {
            color: #adb5bd;
        }

        .form-control:focus::placeholder {
            color: #adb5bd;
        }

        textarea[resize='none'] {
            resize: none !important;
        }

        textarea[resize='both'] {
            resize: both !important;
        }

        textarea[resize='vertical'] {
            resize: vertical !important;
        }

        textarea[resize='horizontal'] {
            resize: horizontal !important;
        }

        .input-group {
            transition: all .15s ease;
            border-radius: .375rem;
            box-shadow: none;
        }

        .input-group .form-control {
            box-shadow: none;
        }

        .input-group .form-control:not(:first-child) {
            padding-left: 0;
            border-left: 0;
        }

        .input-group .form-control:not(:last-child) {
            padding-right: 0;
            border-right: 0;
        }

        .input-group .form-control:focus {
            box-shadow: none;
        }

        .input-group-text {
            transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
        }

        .input-group-alternative {
            transition: box-shadow .15s ease;
            border: 0;
            box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
        }

        .input-group-alternative .form-control,
        .input-group-alternative .input-group-text {
            border: 0;
            box-shadow: none;
        }

        .focused .input-group-alternative {
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08) !important;
        }

        .focused .input-group {
            box-shadow: none;
        }

        .focused .input-group-text {
            color: #8898aa;
            border-color: rgba(50, 151, 211, .25);
            background-color: #fff;
        }

        .focused .form-control {
            border-color: rgba(50, 151, 211, .25);
        }

        .header {
            position: relative;
        }

        .input-group {
            transition: all .15s ease;
            border-radius: .375rem;
            box-shadow: none;
        }

        .input-group .form-control {
            box-shadow: none;
        }

        .input-group .form-control:not(:first-child) {
            padding-left: 0;
            border-left: 0;
        }

        .input-group .form-control:not(:last-child) {
            padding-right: 0;
            border-right: 0;
        }

        .input-group .form-control:focus {
            box-shadow: none;
        }

        .input-group-text {
            transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
        }

        .input-group-alternative {
            transition: box-shadow .15s ease;
            border: 0;
            box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
        }

        .input-group-alternative .form-control,
        .input-group-alternative .input-group-text {
            border: 0;
            box-shadow: none;
        }

        .focused .input-group-alternative {
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08) !important;
        }

        .focused .input-group {
            box-shadow: none;
        }

        .focused .input-group-text {
            color: #8898aa;
            border-color: rgba(50, 151, 211, .25);
            background-color: #fff;
        }

        .mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: all .15s ease;
        }

        @media screen and (prefers-reduced-motion: reduce) {
            .mask {
                transition: none;
            }
        }

        .navbar-search .input-group {
            border: 2px solid;
            border-radius: 2rem;
            background-color: transparent;
        }

        .navbar-search .input-group .input-group-text {
            padding-left: 1rem;
            background-color: transparent;
        }

        .navbar-search .form-control {
            width: 270px;
            background-color: transparent;
        }

        .navbar-search-dark .input-group {
            border-color: rgba(255, 255, 255, .6);
        }

        .navbar-search-dark .input-group-text {
            color: rgba(255, 255, 255, .6);
        }

        .navbar-search-dark .form-control {
            color: rgba(255, 255, 255, .9);
        }

        .navbar-search-dark .form-control:-ms-input-placeholder {
            color: rgba(255, 255, 255, .6);
        }

        .navbar-search-dark .form-control::-ms-input-placeholder {
            color: rgba(255, 255, 255, .6);
        }

        .navbar-search-dark .form-control::placeholder {
            color: rgba(255, 255, 255, .6);
        }

        .navbar-search-dark .focused .input-group {
            border-color: rgba(255, 255, 255, .9);
        }

        @keyframes show-navbar-collapse {
            0% {
                transform: scale(.95);
                transform-origin: 100% 0;
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes hide-navbar-collapse {
            from {
                transform: scale(1);
                transform-origin: 100% 0;
                opacity: 1;
            }

            to {
                transform: scale(.95);
                opacity: 0;
            }
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
                                <a href="#">
                                    <img src="{{ URL::asset('assets/img/avatars/5.png') }}"
                                        class="rounded-circle absolute top-4">
                                </a>
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
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
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
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2 capitalize"></i><span
                                    class="capitalize">{{ $role->name }}</span>
                            </div>
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

            var id = {{ $user->id }};

            $('#passwordModal').on('hidden.bs.modal', function() {
                $('input[type="password"]').val('');
            });

            $('#changePassForm').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('users.password', [':user']) }}".replace(':user', id),
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
                    url: "{{ route('users.update', [':user']) }}".replace(':user', id),
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
                    url: "{{ route('users.checkpassword', [':user']) }}".replace(':user', id),
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
                                url: "{{ route('users.destroy', [':user']) }}"
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
