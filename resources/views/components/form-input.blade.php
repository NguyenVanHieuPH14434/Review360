<div class="@if (! empty($class)){{ $class }}@else col-md-6 mb-3 @endif">
    @if (! empty($label))
        <label for="name" class="form-label">{{ $label }} 
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif
    @if ($previewImg)
        <input type="{{ $type }}" class="{{ $datepicker ? "datepicker " : "" }}form-control @error($name) is-invalid @enderror" value="{{ $oldValue }}" name="{{ $name }}" id="{{ $name }}"
        onchange="preview()">
        <img src="" id="previewImage" class="mt-2" width="120" alt="" class="mb-2">
    @else
        <input autocomplete="{{ $autocomplete }}" type="{{ $type }}" 
        class="{{ $datepicker ? "datepicker " : "" }}form-control @error($name) is-invalid @enderror" 
        value="{{ $oldValue }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" >
    @endif
    @error($name)
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>