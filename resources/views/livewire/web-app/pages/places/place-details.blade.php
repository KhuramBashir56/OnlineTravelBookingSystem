<div>
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>{{ $placeData->title }}</h1>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{ asset('storage/' . $placeData->thumbnail) }}" alt="{{ $placeData->title }} image" />
        </div>
    </div>

    <section class="destinations-details-section pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="destination-details-desc mb-30">
                        <div class="row align-items-center">
                            <div class="col-sm-12">
                                <div class="image mb-30">
                                    <img src="{{ asset('storage/' . $placeData->thumbnail) }}" alt="{{ $placeData->title }} image" />
                                </div>
                            </div>
                        </div>
                        <div class="content mb-20">
                            <h3>{{ $placeData->title }}</h3>
                            <p>{{ $placeData->short_description }}</p>
                            <p>{{ $placeData->description }}</p>
                        </div>
                        <div class="info-content">
                            <h3 class="sub-title">Some Information</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="content-list">
                                        <i class="bx bx-map-alt"></i>
                                        <h6><span>City :</span> {{ $placeData->city->name }}</h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="content-list">
                                        <i class="bx bx-book-reader"></i>
                                        <h6><span>Language Spoken :</span> English</h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="content-list">
                                        <i class="bx bx-notepad"></i>
                                        <h6><span>Agency :</span> {{ $placeData->agency->title }} </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="content-list">
                                        <i class="bx bx-area"></i>
                                        <h6><span>Area (km2) :</span> 1770.80 km2</h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="content-list">
                                        <i class="bx bx-user"></i>
                                        <h6><span>Per Person :</span> $1200</h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="content-list">
                                        <i class="bx bx-group"></i>
                                        <h6><span>Guide :</span> Local Guide Available</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <livewire:web-app.pages.places.comments :place="$placeData->id" :author="$placeData->user_id" />
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
                        <div class="widget widget-search mb-30">
                            <form class="search-form search-top">
                                <input type="search" class="form-control" placeholder="Search..." />
                                <button type="submit" class="btn-text-only">
                                    <i class="bx bx-search-alt"></i>
                                </button>
                            </form>
                        </div>
                        <div class="widget widget-video mb-30">
                            <div class="video-image">
                                <img src="assets/img/video-bg3.jpg" alt="video" />
                            </div>
                            <a href="https://www.youtube.com/watch?v=QSwvg9Rv2EI" class="youtube-popup video-btn">
                                <i class="bx bx-right-arrow"></i>
                            </a>
                        </div>
                        <div class="widget widget-article mb-30">
                            <h3 class="sub-title">Popular Places</h3>
                            <article class="article-item">
                                <div class="image">
                                    <img src="assets/img/destination6.jpg" alt="Demo Image" />
                                </div>
                                <div class="content">
                                    <span class="location"><i class="bx bx-map"></i>95 Fleet, London</span>
                                    <h3>
                                        <a href="destination-details.html">Venice The Dream Place.</a>
                                    </h3>
                                    <ul class="list">
                                        <li><i class="bx bx-time"></i>3 Days</li>
                                        <li>$1500</li>
                                    </ul>
                                </div>
                            </article>
                            <article class="article-item">
                                <div class="image">
                                    <img src="assets/img/destination7.jpg" alt="Demo Image" />
                                </div>
                                <div class="content">
                                    <span class="location"><i class="bx bx-map"></i>Venice, Italy</span>
                                    <h3>
                                        <a href="destination-details.html">Inca Trail Machu Picchu.</a>
                                    </h3>
                                    <ul class="list">
                                        <li><i class="bx bx-time"></i>5 Days</li>
                                        <li>$1200</li>
                                    </ul>
                                </div>
                            </article>
                            <article class="article-item">
                                <div class="image">
                                    <img src="assets/img/destination8.jpg" alt="Demo Image" />
                                </div>
                                <div class="content">
                                    <span class="location"><i class="bx bx-map"></i>Oia, Greece</span>
                                    <h3>
                                        <a href="destination-details.html">The Palace of Versailles.</a>
                                    </h3>
                                    <ul class="list">
                                        <li><i class="bx bx-time"></i>7 Days</li>
                                        <li>$2000</li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <div class="widget widget-gallery mb-30">
                            <h3 class="sub-title">Instagram Post</h3>
                            <ul class="instagram-post">
                                <li>
                                    <img src="assets/img/instagram1.jpg" alt="Demo Image" />
                                    <i class="bx bxl-instagram"></i>
                                </li>
                                <li>
                                    <img src="assets/img/instagram2.jpg" alt="Demo Image" />
                                    <i class="bx bxl-instagram"></i>
                                </li>
                                <li>
                                    <img src="assets/img/instagram3.jpg" alt="Demo Image" />
                                    <i class="bx bxl-instagram"></i>
                                </li>
                                <li>
                                    <img src="assets/img/instagram4.jpg" alt="Demo Image" />
                                    <i class="bx bxl-instagram"></i>
                                </li>
                                <li>
                                    <img src="assets/img/instagram5.jpg" alt="Demo Image" />
                                    <i class="bx bxl-instagram"></i>
                                </li>
                                <li>
                                    <img src="assets/img/instagram6.jpg" alt="Demo Image" />
                                    <i class="bx bxl-instagram"></i>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
</div>
