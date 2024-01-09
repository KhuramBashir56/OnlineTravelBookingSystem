<x-layouts.web-app-layout>
    <section id="home" class="home-banner-area home-style-three">
        <div class="container-fluid p-0">
            <div class="banner-slider-three owl-carousel">
                @foreach ($places as $data)
                    <div class="slider-item item-one" style="background: url({{ asset('storage/' . $data->thumbnail) }}) no-repeat center;">
                        <div class="container">
                            <div class="banner-content">
                                <span class="sub-title">{{ $data->city->name }}</span>
                                <h1>{{ $data->title }}</h1>
                                <p>{{ $data->short_description }}</p>
                                <a href="{{ route('place_details', ['slug' => $data->slug]) }}" class="btn-primary">Destinations</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="search-form">
                <form id="searchForm">
                    <div class="row align-items-center">
                        <div class="col-lg-11">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="select-box">
                                        <i class="bx bx-map-alt"></i>
                                        <select class="form-control">
                                            <option data-display="Destination">Nothing</option>
                                            <option value="1">North America</option>
                                            <option value="2">Spain Madrid</option>
                                            <option value="3">Japan Tokyo</option>
                                            <option value="4">Europe City</option>
                                            <option value="3">Japan Tokyo</option>
                                            <option value="4">Europe City</option>
                                            <option value="3">Japan Tokyo</option>
                                            <option value="4">Europe City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="select-box">
                                        <i class="bx bx-calendar"></i>
                                        <input type="text" class="date-select form-control" placeholder="Depart Date" required="required" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="select-box">
                                        <i class="bx bx-package"></i>
                                        <select class="form-control">
                                            <option data-display="Travel Type">Travel Type</option>
                                            <option value="1">City Tour</option>
                                            <option value="2">Family Tours</option>
                                            <option value="3">Seasonal Tours</option>
                                            <option value="4">Outdoor Activities</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="select-box">
                                        <i class="bx bx-time"></i>
                                        <select class="form-control">
                                            <option data-display="Tour Duration">Nothing</option>
                                            <option value="1">5 Days</option>
                                            <option value="2">12 Days</option>
                                            <option value="3">21 Days</option>
                                            <option value="4">30 Days</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <button type="button" class="btn-search">
                                <i class="bx bx-search-alt"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section id="destination" class="destination-section pt-100 pb-70 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Our Packages</h2>
                <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
            </div>
            <livewire:web-app.pages.home.packages />
        </div>
    </section>

    <x-web-app.about-us-card />

    <div id="video" class="video-section video-style-two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="video-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="top-destination" class="top-destination-section pt-100 pb-70 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Top Destinations</h2>
                <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
            </div>

            <livewire:web-app.pages.home.destinations />
            
        </div>
    </section>
</x-layouts.web-app-layout>
