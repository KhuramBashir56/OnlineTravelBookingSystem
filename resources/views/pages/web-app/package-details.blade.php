<x-layouts.web-app-layout>
    <x-slot name="title">
        {{ $slug }}
    </x-slot>
    <livewire:web-app.pages.packages.package-details :package="$slug" />
</x-layouts.web-app-layout>
