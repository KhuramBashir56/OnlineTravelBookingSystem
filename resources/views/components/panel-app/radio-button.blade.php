@props(['for', 'title', 'value'])
<div class="form-check">
    <input {!! $attributes->merge(['type' => 'radio', 'class' => 'form-check-input', 'id' => $value, 'value' => $value, 'name' => $for]) !!}>
    <label class="form-check-label mb-0" for="{{ $value }}">{{ $title }}</label>
</div>
