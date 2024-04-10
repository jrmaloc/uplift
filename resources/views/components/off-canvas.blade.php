@props([
    'id' => '',
    'title' => '',
    'footer' => '',
])


<div class="offcanvas offcanvas-end" tabindex="-1" id="{{ $id }}" aria-labelledby="{{ $id }}Label">
    <div class="offcanvas-header">
        <h3 id="{{ $id }}Label" class="offcanvas-title h3">{{ $title }}</h3>
        <button type="button" class="btn-close text-reset relative bottom-2" data-bs-dismiss="offcanvas">✖</button>
    </div>
    <div {{ $attributes->merge(['class' => 'offcanvas-body mx-2 flex-grow-0']) }}>
        {{ $slot }}
    </div>
</div>
