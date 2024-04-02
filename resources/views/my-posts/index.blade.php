@extends('layouts.account')

@section('head')
    <title>My Posts | Uplift</title>
    <style>
        .focused {
            border-radius: 0.375rem;
            border: 1px solid #696bff !important;
        }
    </style>
@endsection

@section('content')
    <h3 class="h3 ml-4 mt-4 fw-bolder">My Posts</h3>
    <div class="w-50 mx-auto">
        <div class="flex">
            <span class="input-group-text border-0"
                style="
                    border-bottom-left-radius: 0px;
                    border-top: 1px solid #d9dee3 !important;
                    border-left: 1px solid #d9dee3 !important;
                    border-top-right-radius: 0px;
                    ">
                <img src="{{ URL::asset('assets/img/avatars/1.png') }}" alt="" class="rounded-full"
                    style="width: 70px; aspect-ration: 1;"></span>
            <div class="w-100">
                <input type="text" class="form-control input-field border-0 pt-4" placeholder="Caption..."
                    style="
                    border-top: 1px solid #d9dee3 !important;
                    border-right: 1px solid #d9dee3 !important;
                    border-bottom: 0px !important;
                    border-top-left-radius: 0px;
                    border-bottom-right-radius: 0px;
                    font-weight: bold;
                    font-size: 20px;">
                <div class="input-overlay"></div>
                <textarea class="form-control pt-4 input-field rounded-0 border-0" rows="4" aria-label="With textarea"
                    placeholder="Lorem Ipsum..."
                    style="
                    border-right: 1px solid #d9dee3 !important;
                    min-height: 150px;"></textarea>
            </div>
        </div>
        <div class="bg-indigo-100 px-2 py-3"
            style="border-bottom-left-radius: 0.375rem; border-bottom-right-radius: 0.375rem;">
            <div class="flex justify-end">
                <button class="btn btn-primary">Post!</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        $(document).ready(function() {
            $('.input-field').focus(function() {
                $(this).closest('.flex').addClass('focused');
            });

            $('.input-field').blur(function() {
                $(this).closest('.flex').removeClass('focused');
            });
        });
    </script>
@endpush
