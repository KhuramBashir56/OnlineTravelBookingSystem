<x-layouts.panel-layout>
    @if (session('success'))
        <x-panel-app.alerts.success :message="session('success')" />
    @endif
    <x-slot name="title">
        {{ __('All Users') }}
    </x-slot>
    <livewire:panel-app.admin.users-list />
</x-layouts.panel-layout>
