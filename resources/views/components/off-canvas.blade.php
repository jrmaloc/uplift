{{-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#{{ $id }}"
    aria-controls="{{ $id }}">
    Toggle End
</button> --}}
@props([
    'id' => '',
    'title' => '',
])


<div class="offcanvas offcanvas-end" tabindex="-1" id="{{ $id }}" aria-labelledby="{{ $id }}Label">
    <div class="offcanvas-header">
        <h3 id="{{ $id }}Label" class="offcanvas-title h3">{{ $title }}</h3>
        <button type="button" class="btn-close text-reset relative bottom-2" data-bs-dismiss="offcanvas">✖</button>
    </div>
    <div class="offcanvas-body mx-2 flex-grow-0">
        {{ $slot }}
        {{-- <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continue</button>
        <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">
            Cancel
        </button> --}}
    </div>
</div>
