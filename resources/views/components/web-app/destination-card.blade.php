@props(['data'])

<div class="col-lg-4 col-md-6">
    <div class="item-single mb-30">
        <div class="image">
            <img src="{{ asset('storage/' . $data->thumbnail) }}" style="aspect-ratio:1.77;" alt="Demo Image" />
        </div>
        <div class="content">
            <span class="location"><i class="bx bx-map"></i>{{ $data->city->name }}</span>
            <h3>
                <a href="{{ route('place_details', ['slug' => $data->slug]) }}">{{ $data->title }}</a>
            </h3>
            <div class="review">
                <i class="bx bx-time"></i>
                <span>{{ $data->created_at->diffForHumans() }}</span>
            </div>
            <p>{{ Str::limit($data->description, 30, '...') }}</p>
        </div>
    </div>
</div>
