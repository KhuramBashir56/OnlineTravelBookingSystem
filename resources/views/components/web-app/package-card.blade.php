@props(['data'])

<div class="col-lg-4 col-md-6 filtr-item" data-category="3, 1" data-sort="value">
    <div class="item-single mb-30">
        <div class="image">
            <img src="{{ asset('storage/' . $data->place->thumbnail) }}" style="aspect-ratio:1.77;" alt="Demo Image" />
        </div>
        <div class="content">
            <span class="location"><i class="bx bx-map"></i>{{ Str::ucfirst($data->place->title . ', ' . $data->place->city->name) }}</span>
            <h3>
                <a href="{{ route('package_details', ['slug' => $data->slug]) }}">{{ Str::limit($data->title, 30, '...') }}</a>
            </h3>
            <div class="review">
                <span><b>Start Date</b></span>
                <span>{{ $data->start->format('F d, Y') }}</span>
            </div>
            <p>{{ Str::limit($data->description, 60, '...') }}</p>
            <hr />
            <ul class="list">
                <li><i class="bx bx-time"></i>{{ $data->duration }} {{ $data->duration <= 1 ? ' Day' : ' Days' }}</li>
                <li><i class="bx bx-group"></i>{{ $data->bookings->where('status', 'verified')->sum('persons') }}+</li>
                <li>PKR ={{ explode('.', $data->price)[0] }}/-</li>
            </ul>
        </div>
        <div class="spacer"></div>
    </div>
</div>
