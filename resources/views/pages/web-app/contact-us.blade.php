<x-layouts.web-app-layout>
    <x-slot name="title">
        {{ __('Contact Us') }}
    </x-slot>
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>Contact Us</h1>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{ asset('assets/web-app/img/page-title-area/contact.jpg') }}" alt="Demo Image">
        </div>
    </div>
    <div class="contact-section">
        <div class="container">
            <div class="main-form ptb-100">
                <livewire:web-app.contact-form />
            </div>
        </div>
        <div class="contact-footer bg-light">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col">
                        <div class="contact-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14160422.294964513!2d58.35461897334058!3d29.946813986969737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38db52d2f8fd751f%3A0x46b7a1f7e614925c!2sPakistan!5e0!3m2!1sen!2s!4v1704600859268!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.web-app-layout>
