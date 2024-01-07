@props(['message'])
<div class="my-alert alert-success">
    <div class="icon">
        <i class="mdi mdi-face" aria-hidden="true"></i>
    </div>
    <div class="content">
        <h1>Successful</h1>
        <p>{{ $message }}</p>
    </div>
</div>

