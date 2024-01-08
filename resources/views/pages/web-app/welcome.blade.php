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
                <h2>Destinations</h2>
                <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
            </div>
            <livewire:web-app.pages.home.packages />
            
        </div>
    </section>

    <section id="about" class="about-section about-style-three ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 m-auto">
                    <div class="about-content">
                        <div class="row">
                            <div class="col-12">
                                <h2>About Us</h2>
                                <h6>Top Tour Operators and Travel Agency. We offering in total 793 tours and holidays through-out the world. Combined we have received 1532 customer reviews.</h6>
                                <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.Travel has helped us to understand the meaning of life and it has helped us.</p>
                            </div>
                        </div>
                        <div class="col-lg-10 m-auto">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="content-list">
                                        <i class="bx bx-check-shield"></i>
                                        <h6>Safety Travel System</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="content-list">
                                        <i class="bx bx-donate-heart"></i>
                                        <h6>Budget-Friendly Tour</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="content-list">
                                        <i class="bx bx-support"></i>
                                        <h6>24/7 Customer Support</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="content-list">
                                        <i class="bx bx-time"></i>
                                        <h6>Expert Trip Planning</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="content-list">
                                        <i class="bx bx-station"></i>
                                        <h6>Fast Communication</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="content-list">
                                        <i class="bx bx-like"></i>
                                        <h6>Right Solution & Guide</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="about-btn">
                            <a href="{{ route('contact_us') }}" class="btn-primary">Contact Us</a>
                            <a href="about-us.html" class="btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape shape-1"><img src="{{ asset('assets/web-app/img/shape1.png') }}" alt="Background Shape" /></div>
        <div class="shape shape-2"><img src="{{ asset('assets/web-app/img/shape2.png') }}" alt="Background Shape" /></div>
        <div class="shape shape-3"><img src="{{ asset('assets/web-app/img/shape3.png') }}" alt="Background Shape" /></div>
        <div class="shape shape-4"><img src="{{ asset('assets/web-app/img/shape4.png') }}" alt="Background Shape" /></div>
    </section>
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
</x-layouts.web-app-layout>
