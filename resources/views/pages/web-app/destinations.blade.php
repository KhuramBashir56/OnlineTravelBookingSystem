<x-layouts.web-app-layout>
    <x-slot name="title">
        {{ __('Destinations') }}
    </x-slot>
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>Destinations</h1>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{ asset('assets/web-app/img/page-title-area/destinations.jpg') }}" alt="Demo Image" />
        </div>
    </div>
    <section id="top-destination" class="top-destination-section pt-100 pb-70 bg-light">
        <div class="container">
            <livewire:web-app.pages.home.destinations />
        </div>
    </section>
    <section id="destination" class="destination-section pt-100 pb-70 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Best Packages</h2>
                <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
            </div>
            <livewire:web-app.pages.home.packages />
        </div>
    </section>
    <x-web-app.about-us-card />

</x-layouts.web-app-layout>
