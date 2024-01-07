@props(['message'])

<div class="my-alert alert-error">
    <div class="icon">
        <i class="mdi mdi-face-profile" aria-hidden="true"></i>
    </div>
    <div class="content">
        <h1>Ops! Error</h1>
        <p>{{ $message }}</p>
    </div>
</div>
