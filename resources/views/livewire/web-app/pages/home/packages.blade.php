<div class="row">
    @foreach ($packages as $data)
        <x-web-app.package-card :data="$data" />
    @endforeach
</div>
