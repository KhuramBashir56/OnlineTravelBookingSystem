<x-layouts.web-app-layout>
    <div id="home" class="home-banner-area home-style-two">
        <div class="container-fluid p-0">
            <div class="banner-slider-two owl-carousel">
                <div class="slider-item">
                    <div class="row">
                        <div class="col-lg-5 align-self-end">
                            <div class="banner-image">
                                <img src="{{ asset('assets/web-app/img/banner/banner1.png') }}" alt="Demo Image">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-content">
                                <span class="sub-title">Amazing Places</span>
                                <h1>
                                    Explore <span>Life</span> Travel Where You Want
                                </h1>
                                <p>
                                    Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.
                                </p>
                                <a href="{{ route('destinations') }}" class="btn-primary">Destination</a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-shape">
                        <img src="{{ asset('assets/web-app/img/banner/banner-bg.png') }}" alt="Demo Image">
                    </div>
                </div>
                <div class="slider-item">
                    <div class="row">
                        <div class="col-lg-5 align-self-end">
                            <div class="banner-image">
                                <img src="{{ asset('assets/web-app/img/banner/banner2.png') }}" alt="Demo Image">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-content">
                                <span class="sub-title">Amazing Places</span>
                                <h1>
                                    Explore <span>Life</span> Travel Where You Want
                                </h1>
                                <p>
                                    Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.
                                </p>
                                <a href="{{ route('destinations') }}" class="btn-primary">Destination</a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-shape">
                        <img src="{{ asset('assets/web-app/img/banner/banner-bg.png') }}" alt="Demo Image">
                    </div>
                </div>
            </div>
        </div>
        <livewire:web-app.pages.home.search-form />
    </div>

    <section id="destination" class="destination-section pt-100 pb-70 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Our Packages</h2>
                <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
            </div>
            <livewire:web-app.pages.home.packages />
        </div>
    </section>

    <section class="features-section pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>Top Features</h2>
                <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="item-single mb-30">
                        <i class="bx bx-calendar"></i>
                        <h3><a href="#">Reservation</a></h3>
                        <p>As compared with earlier times where a reservation personnel has to update its inventory every time.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item-single mb-30">
                        <i class="bx bxs-plane-take-off"></i>
                        <h3><a href="#">Tour Pack</a></h3>
                        <p>You can dream, create, design, and build the most wonder ful place in the world. But it requires people.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 m-auto">
                    <div class="item-single mb-30">
                        <i class="bx bx-money"></i>
                        <h3><a href="#">Payment</a></h3>
                        <p>As compared with earlier times where a reservation personnel has to update its inventory every time.</p>
                    </div>
                </div>
            </div>
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
    <x-web-app.agencies />
</x-layouts.web-app-layout>
