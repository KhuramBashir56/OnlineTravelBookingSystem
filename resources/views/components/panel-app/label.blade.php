@props(['for', 'title', 'class', 'error'])
<div class="form-group @if (!empty($class)) {{ $class }} @endif">
    <label for="{{ $for }}">{{ $title }}</label>
    <div class="d-flex gap-4">
        {{ $slot }}
    </div>
    @error($for)
        <div class="invalid-feedback">
            {{ $error }}
        </div>
    @enderror
</div>
