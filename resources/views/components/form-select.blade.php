<div class="@if (! empty($class)){{ $class }}@else col-md-6 mb-3 @endif">
    @if (! $hideLab)
        <label for="description" class="form-label">{{ $label }} 
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif
    @php
        $name = $select2Multi ? $name . '[]' : $name;
    @endphp
    <select class="form-select @if($select2 || $select2Multi) hasSelect2 @endif @error($name) is-invalid @enderror" name="{{ $name }}" 
    @if ($select2Multi) multiple="multiple" @endif @if (!empty($placeholder)) aria-placeholder="{{ $placeholder }}" @endif>
        @if (! $select2Multi)
            <option value="">Chọn {{ strtolower($label) }}</option>
        @endif
        @if (count($select) > 0)
            @foreach ($select as $key => $value)
                <option {{ ($isSelected ? $isSelected($key, $value) : isSelected($name, $key, $value, $keySelect)) ? "selected" : "" }}
                        value="{{ $keySelect ? $value->$keySelect : $key }}">
                    {{ $labelSelect ? $value->$labelSelect : $value }} 
                </option>
            @endforeach
        @endif
    </select>
    @error($name)
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>