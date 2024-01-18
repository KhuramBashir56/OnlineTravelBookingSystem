<x-layouts.web-app-layout>
    <x-slot name="title">
        {{ $agency->title }}
    </x-slot>
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>{{ $agency->title }}</h1>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{ asset('storage/' . $agency->logo) }}" alt="Demo Image">
        </div>
    </div>

    <section id="destination" class="destination-section pt-100 pb-70 bg-light">
        <div class="container">
            @if ($agency->packages->count() > 0)
                <div class="section-title">
                    <h2>Our Packages</h2>
                </div>
            @else
                <div class="section-title">
                    <h2>Unfortunately we haven't configured any packages yet.</h2>
                </div>
            @endif

            <div class="row">
                @foreach ($agency->packages as $data)
                    <x-web-app.package-card :data="$data" />
                @endforeach
            </div>
        </div>
    </section>
    <x-web-app.agencies />
</x-layouts.web-app-layout>
