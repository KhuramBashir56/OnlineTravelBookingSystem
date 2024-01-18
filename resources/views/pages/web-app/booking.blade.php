<x-layouts.web-app-layout>
    <x-slot name="title">
        {{ $package->slug }}
    </x-slot>
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>Booking</h1>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{ asset('assets/web-app/img/page-title-area/booking.jpg') }}" alt="Demo Image" />
        </div>
    </div>
    <section class="booking-section ptb-100 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="booking-form">
                        <livewire:web-app.pages.booking.booking-form package="{{ $package->id }}" />
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside>
                        <div class="row align-items-center">
                            <div class="col-md-12 col-sm-12">
                                <div class="item-single mb-30">
                                    <div class="image">
                                        <img src="{{ asset('storage/' . $package->place->thumbnail) }}" width="100%" style="aspect-ratio:1.77" alt="Demo Image" />
                                    </div>
                                    <div class="content">
                                        <span class="location"><i class="bx bx-map"></i>{{ $package->place->title . ' (' . $package->place->city->name . ')' }}</span>
                                        <h3>
                                            <a href="{{ route('package_details', ['slug' => $package->slug]) }}">{{ $package->title }}</a>
                                        </h3>
                                        <p>{{ Str::limit($package->description, 160, '...') }}</p>
                                        <hr />
                                        <ul class="list">
                                            <li><i class="bx bx-time"></i>{{ $package->duration }} {{ $package->duration <= 1 ? ' Day' : ' Days' }}</li>
                                            <li><i class="bx bx-group"></i>{{ $package->bookings->where('status', 'verified')->sum('persons') }}+</li>
                                            <li>PKR ={{ explode('.', $package->price)[0] }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-content">
                            <h3 class="sub-title">Some Information</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content-list">
                                        <i class="bx bx-notepad"></i>
                                        <h6><span>Start Date :</span> {{ $package->start->format('F d, Y') }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="content-list">
                                        <i class="bx bx-notepad"></i>
                                        <h6><span>End Date :</span> {{ $package->end->format('F d, Y') }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="content-list">
                                        <i class="bx bx-user"></i>
                                        <h6><span>Per Person :</span> PKR ={{ explode('.', $package->price)[0] }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

</x-layouts.web-app-layout>
