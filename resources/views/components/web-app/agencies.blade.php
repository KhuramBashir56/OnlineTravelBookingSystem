<section id="team" class="team-section ptb-100">
    <div class="container">
        <div class="section-title">
            <h2>Registered Agencies</h2>
            <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
        </div>
        <div class="row">
            <div class="owl-carousel agencies">
                @foreach ($agencies as $data)
                    <div class="item">
                        <a href="{{ route('agency_details', ['id' => $data->id]) }}" title="{{ $data->title }}">
                            <img src="{{ asset('storage/' . $data->logo) }}" width="100%" style="aspect-ratio: 1;" alt="{{ $data->title }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        $('.agencies').owlCarousel({
            loop: true,
            margin: 50,
            nav: false,
            dots: false,
            responsiveClass: true,
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 5,
                }
            }
        })
    </script>
@endpush
