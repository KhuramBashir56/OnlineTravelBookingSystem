@props(['message'])
<div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
    <strong class="mx-2">Success!</strong> {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
