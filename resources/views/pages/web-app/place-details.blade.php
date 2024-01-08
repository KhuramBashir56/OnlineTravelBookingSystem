<x-layouts.web-app-layout>
    <x-slot name="title">
        {{ $slug }}
    </x-slot>
    <livewire:web-app.pages.places.place-details :place="$slug" />
</x-layouts.web-app-layout>
