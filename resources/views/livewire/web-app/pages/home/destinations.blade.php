<div class="row">
    @foreach ($destinations as $data)
        <x-web-app.destination-card :data="$data" />
    @endforeach
</div>
