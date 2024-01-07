@props(['for', 'title', 'class', 'error'])
<div class="form-group @if (!empty($class)) {{ $class }} @endif">
    <label for="{{ $for }}">{{ $title }}</label>
    <input {!! $attributes->merge(['class' => 'form-control', 'name' => $for, 'id' => $for]) !!} />
    @error($for)
        <div class="invalid-feedback">
            {{ $error }}
        </div>
    @enderror
</div>
