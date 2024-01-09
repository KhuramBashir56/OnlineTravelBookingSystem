<x-layouts.error-layout>
    <x-slot name='title'>
        {{ __('Error - 404') }}
    </x-slot>
    <section class="error-area ptb-100">
        <div class="container">
            <div class="error-content">
                <h3 style="font-size: 8rem; font-weight: bold;">404</h3>
                <h3>Ooops! Page Not Found</h3>
                <p>
                    The page you are looking for might have been removed had its name changed or is temporarily unavailable.
                </p>
                <a href="{{ route('welcome') }}" class="btn-primary">Back to Home</a>
            </div>
        </div>
    </section>
</x-layouts.error-layout>
