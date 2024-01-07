@props(['for', 'title', 'class', 'error'])
<div class="form-group @if (!empty($class)) {{ $class }} @endif">
    <label for="{{ $for }}">{{ $title }}</label>
    <textarea {!! $attributes->merge(['name' => $for, 'id' => $for, 'class' => 'form-control', 'rows' => '4']) !!}></textarea>
    @error($for)
        <div class="invalid-feedback">
            {{ $error }}
        </div>
    @enderror
</div>
