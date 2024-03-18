@props([
    'id' => '',
    'title' => '',
    'formID' => '',
    'footer' => '',
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="{{ $id }}Title">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                        class="bx bx-x flex justify-center pb-3"></span></button>
            </div>
            <form action="" id="{{ $formID }}">
                @csrf
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            </form>
        </div>
    </div>
</div>
