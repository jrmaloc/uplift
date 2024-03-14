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
            background: linear-gradient(87deg, #172b4d 0, #1a174d 100%) !important;
        }

        .bg-gradient-default {
            background: linear-gradient(87deg, #172b4d 0, #1a174d 100%) !important;
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

        .avatar {
            font-size: 1rem;
            display: inline-flex;
            width: 48px;
            height: 48px;
            color: #fff;
            border-radius: 50%;
            background-color: #adb5bd;
            align-items: center;
            justify-content: center;
        }

        .avatar img {
            width: 100%;
            border-radius: 50%;
        }

        .avatar-sm {
            font-size: .875rem;
            width: 36px;
            height: 36px;
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

        .dropdown {
            display: inline-block;
        }

        .dropdown-menu {
            min-width: 12rem;
        }

        .dropdown-menu .dropdown-item {
            font-size: .875rem;
            padding: .5rem 1rem;
        }

        .dropdown-menu .dropdown-item>i {
            font-size: 1rem;
            margin-right: 1rem;
            vertical-align: -17%;
        }

        .dropdown-header {
            font-size: .625rem;
            font-weight: 700;
            padding-right: 1rem;
            padding-left: 1rem;
            text-transform: uppercase;
            color: #f6f9fc;
        }

        .dropdown-menu a.media>div:first-child {
            line-height: 1;
        }

        .dropdown-menu a.media p {
            color: #8898aa;
        }

        .dropdown-menu a.media:hover .heading,
        .dropdown-menu a.media:hover p {
            color: #172b4d !important;
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

        .form-control-alternative {
            transition: box-shadow .15s ease;
            border: 0;
            box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
        }

        .form-control-alternative:focus {
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
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

        .focused .form-control {
            border-color: rgba(50, 151, 211, .25);
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

        .nav-link {
            color: #525f7f;
        }

        .nav-link:hover {
            color: #5e72e4;
        }

        .nav-link i.ni {
            position: relative;
            top: 2px;
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

        @media (min-width: 768px) {
            .navbar .dropdown-menu {
                margin: 0;
                pointer-events: none;
                opacity: 0;
            }

            .navbar .dropdown-menu-arrow:before {
                position: absolute;
                z-index: -5;
                bottom: 100%;
                left: 20px;
                display: block;
                width: 12px;
                height: 12px;
                content: '';
                transform: rotate(-45deg) translateY(12px);
                border-radius: 2px;
                background: #fff;
                box-shadow: none;
            }

            .navbar .dropdown-menu-right:before {
                right: 20px;
                left: auto;
            }

            @ keyframes show-navbar-dropdown {
                0% {
                    transition: visibility .25s, opacity .25s, transform .25s;
                    transform: translate(0, 10px) perspective(200px) rotateX(-2deg);
                    opacity: 0;
                }

                100% {
                    transform: translate(0, 0);
                    opacity: 1;
                }
            }

            @keyframes hide-navbar-dropdown {
                from {
                    opacity: 1;
                }

                to {
                    transform: translate(0, 10px);
                    opacity: 0;
                }
            }
        }

        @media (max-width: 767.98px) {
            .navbar-nav .nav-link {
                padding: .625rem 0;
                color: #172b4d !important;
            }

            .navbar-nav .dropdown-menu {
                min-width: auto;
                box-shadow: none;
            }
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

        .display-2 span {
            font-weight: 300;
            display: block;
        }

        @media (max-width: 768px) {
            .btn {
                margin-bottom: 10px;
            }
        }

        #navbar .navbar {
            margin-bottom: 20px;
        }

        [type='text'] {
            border-radius: 5px;
        }

        .col-lg-6, .col-md-12, .col-lg-4 {
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
        style="min-height: 600px; background-image: url(https://raw.githubusercontent.com/creativetimofficial/argon-dashboard/gh-pages/assets-old/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">Hello Jesse</h1>
                    <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with
                        your work and manage your projects or assigned tasks</p>
                    <a href="#!" class="btn btn-info">Edit profile</a>
                </div>
            </div>
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
                                    <img src="{{ URL::asset('assets/img/avatars/5.png') }}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                            <a href="#" class="btn btn-sm btn-default float-right">Message</a>
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
                            <h3>
                                {{ $user->name }}<span class="font-weight-light">, {{ $age }}</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ $user->address }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>University of Computer Science
                            </div>
                            <hr class="my-4">
                            <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and
                                records all of his own music.</p>
                            <a href="#">Show more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">My account</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-username">Username</label>
                                            <input type="text" id="input-username"
                                                class="form-control form-control-alternative" placeholder="Username"
                                                value="lucky.jesse">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address</label>
                                            <input type="email" id="input-email"
                                                class="form-control form-control-alternative"
                                                placeholder="jesse@example.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-first-name">First name</label>
                                            <input type="text" id="input-first-name"
                                                class="form-control form-control-alternative" placeholder="First name"
                                                value="Lucky">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-last-name">Last name</label>
                                            <input type="text" id="input-last-name"
                                                class="form-control form-control-alternative" placeholder="Last name"
                                                value="Jesse">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            <input id="input-address" class="form-control form-control-alternative"
                                                placeholder="Home Address"
                                                value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-city">City</label>
                                            <input type="text" id="input-city"
                                                class="form-control form-control-alternative" placeholder="City"
                                                value="New York">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-country">Country</label>
                                            <input type="text" id="input-country"
                                                class="form-control form-control-alternative" placeholder="Country"
                                                value="United States">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Postal code</label>
                                            <input type="number" id="input-postal-code"
                                                class="form-control form-control-alternative" placeholder="Postal code">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">About me</h6>
                            <div class="pl-lg-4">
                                <div class="form-group focused">
                                    <label>About Me</label>
                                    <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
