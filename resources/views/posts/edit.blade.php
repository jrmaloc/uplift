@extends('layouts.app')

@section('head')
    <title>Edit | Posts</title>

    <style>
        .no-border,
        .no-border:focus {
            border: 1px solid transparent !important;
        }

        .fw-5 {
            font-weight: 500;
        }
    </style>
@endsection

@section('content')
    <div class="card mt-28 mx-40">
        <div class="card-header">
            <div class="row">
                <div class="col-11 flex justify-center">
                    <span class="h3 uppercase">Edit Post</span>
                </div>
                <div class="col-1 flex justify-end align-items-center gap-2">
                    <label class="switch">
                        <input checked="" id="checkbox" type="checkbox" checked disabled>
                        <div class="slider">
                            <div class="circle">
                                <svg class="cross" xml:space="preserve" style="enable-background:new 0 0 512 512"
                                    viewBox="0 0 365.696 365.696" y="0" x="0" height="6" width="6"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path data-original="#000000" fill="currentColor"
                                            d="M243.188 182.86 356.32 69.726c12.5-12.5 12.5-32.766 0-45.247L341.238 9.398c-12.504-12.503-32.77-12.503-45.25 0L182.86 122.528 69.727 9.374c-12.5-12.5-32.766-12.5-45.247 0L9.375 24.457c-12.5 12.504-12.5 32.77 0 45.25l113.152 113.152L9.398 295.99c-12.503 12.503-12.503 32.769 0 45.25L24.48 356.32c12.5 12.5 32.766 12.5 45.247 0l113.132-113.132L295.99 356.32c12.503 12.5 32.769 12.5 45.25 0l15.081-15.082c12.5-12.504 12.5-32.77 0-45.25zm0 0">
                                        </path>
                                    </g>
                                </svg>
                                <svg class="checkmark" xml:space="preserve" style="enable-background:new 0 0 512 512"
                                    viewBox="0 0 24 24" y="0" x="0" height="10" width="10"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path class="" data-original="#000000" fill="currentColor"
                                            d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <form action="" id="editPostForm">
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-12">
                        <input id="input-title" class="form-control no-border fw-5" readonly type="text" name="title"
                            value="Lorem, ipsum dolor sit amet">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <textarea class="form-control no-border" id="input-body" readonly rows="8">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi accusantium impedit, molestiae ut porro iusto et rem incidunt fugit nihil!</textarea>
                    </div>
                </div>

                <div>
                    <hr>
                </div>

                <div class="my-3">
                    <label for="selectType" class="form-label">Type</label>
                    <select class="form-select" multiple="multiple" id="selectType" aria-label="Default select example">
                        <option value="faith">Faith</option>
                        <option value="love">Love</option>
                        <option value="family">Family</option>
                        <option value="finances">Finances</option>
                        <option value="education">Education</option>
                    </select>
                </div>
            </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#selectType').select2({
                tags: true,
                allowClear: true,
                placeholder: {
                    id: '-1', // the value of the option
                    text: 'Select an option'
                },
                disabled: true
            });

            if ($('#checkbox').prop('disabled')) {
                $('.slider').addClass('pointer-events-none');
            }
        });
    </script>
@endpush
