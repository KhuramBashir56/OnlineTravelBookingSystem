@props(['for', 'title', 'class', 'error'])
<div class="form-group @if (!empty($class)) {{ $class }} @endif">
    <label for="{{ $for }}">{{ $title }}</label>
    <select {!! $attributes->merge(['style' => 'width: 100%; height: 35px', 'class' => 's-select', 'name' => $for, 'id' => $for]) !!}>
        <option selected value="">--Please Select {{ $title }}--</option>
        {{ $slot }}
    </select>
    @error($for)
        <div class="invalid-feedback">
            {{ $error }}
        </div>
    @enderror
</div>
