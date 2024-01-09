<div>
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>{{ $packageData->title }}</h1>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{ asset('storage/' . $packageData->place->thumbnail) }}" alt="{{ $packageData->title }} image" />
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
                                    <img src="{{ asset('storage/' . $packageData->place->thumbnail) }}" alt="{{ $packageData->title }} image" />
                                </div>
                            </div>
                        </div>
                        <div class="content mb-20">
                            <h3>{{ $packageData->title }}</h3>
                            <p>{{ $packageData->short_description }}</p>
                            <p>{{ $packageData->description }}</p>
                        </div>
                        <div class="info-content">
                            <h3 class="sub-title">Some Information</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="content-list">
                                        <i class="bx bx-map-alt"></i>
                                        <h6><span>City :</span> {{ $packageData->place->city->name }}</h6>
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
                                        <h6><span>Agency :</span> {{ $packageData->agency->title }} </h6>
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
                                        <h6><span>Per Person :</span>PKR ={{ $packageData->price }}/-</h6>
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
                        {{-- <livewire:web-app.pages.places.comments :place="$packageData->id" :author="$packageData->user_id" /> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
                        <div class="widget widget-search mb-30">
                            <div class="search-form search-top">
                                <input type="search" wire:model.live="search" class="form-control" placeholder="Search..." />
                                <button type="button" class="btn-text-only">
                                    <i class="bx bx-search-alt"></i>
                                </button>
                            </div>
                        </div>
                        {{-- <div class="widget widget-article mb-30">
                            <h3 class="sub-title">Popular Places</h3>
                            @forelse ($places as $data)
                                <article class="article-item">
                                    <div class="image">
                                        <img src="{{ asset('storage/' . $data->thumbnail) }}" alt="Demo Image" />
                                    </div>
                                    <div class="content">
                                        <span class="location"><i class="bx bx-map"></i>{{ $data->city->name }}</span>
                                        <h3>
                                            <a href="destination-details.html">{{ Str::limit($data->title, 20, '...') }}</a>
                                        </h3>
                                        <ul class="list">
                                            <li><i class="bx bx-time"></i>{{ $data->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </article>
                            @empty
                                <h3>Data Not Found...</h3>
                            @endforelse
                        </div> --}}
                        <div class="widget widget-gallery mb-30">
                            <h3 class="sub-title">Instagram Post</h3>
                            <ul class="instagram-post">
                                <li>
                                    <img src="{{ asset('assets/web-app/img/instagram1.jpg') }}" alt="Demo Image" />
                                    <i class="bx bxl-instagram"></i>
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web-app/img/instagram2.jpg') }}" alt="Demo Image" />
                                    <i class="bx bxl-instagram"></i>
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web-app/img/instagram3.jpg') }}" alt="Demo Image" />
                                    <i class="bx bxl-instagram"></i>
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web-app/img/instagram4.jpg') }}" alt="Demo Image" />
                                    <i class="bx bxl-instagram"></i>
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web-app/img/instagram5.jpg') }}" alt="Demo Image" />
                                    <i class="bx bxl-instagram"></i>
                                </li>
                                <li>
                                    <img src="{{ asset('assets/web-app/img/instagram6.jpg') }}" alt="Demo Image" />
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
