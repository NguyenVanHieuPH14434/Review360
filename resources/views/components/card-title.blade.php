@props(['title', 'create', 'label', 'routeName', 'icon'])
@php
    $routeName = $routeName ?? explode('.', Route::currentRouteName())[0] . '.list';
    $icon = $icon ?? "ti ti-list";
@endphp
<div class="d-flex flex-wrap justify-content-between gap-2 px-4 py-3 border-bottom">
    <h5 class="card-title fw-semibold mb-0 lh-sm title-form">{{ $title }}</h5>
    <div class="box-action">
        @if (!empty($create))
            {{ $create }}
        @endif
        <a href="{{ route($routeName) }}" class="btn mb-1 waves-effect waves-light btn-primary">
            <i class="{{ $icon }}"></i> {{ ! empty($label) ? $label : __('Danh sách') }}
        </a>
    </div>

</div>