@if (session('notice'))
    @php
        $level = session('notice')[0];
        $message = session('notice')[1];
    @endphp
    <div class="alert alert-{{ $level }} alert-dismissible bg-{{ $level }} text-white border-0 fade show" role="alert">
        <button id="btn-cl-notice" type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
@endif
<div id="notification"></div>