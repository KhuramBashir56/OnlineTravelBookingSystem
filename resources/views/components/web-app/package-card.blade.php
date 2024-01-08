@props(['data'])

<div class="col-lg-4 col-md-6 filtr-item" data-category="3, 1" data-sort="value">
    <div class="item-single mb-30">
        <div class="image">
            <img src="{{ asset('storage/' . $data->place->thumbnail) }}" alt="Demo Image" />
        </div>
        <div class="content">
            <span class="location"><i class="bx bx-map"></i>{{ Str::ucfirst($data->place->title . ', ' . $data->place->city->name) }}</span>
            <h3>
                <a href="destination-details.html">{{ Str::limit($data->title, 30, '...') }}</a>
            </h3>
            <div class="review">
                <i class="bx bx-smile"></i>
                <span>8.5</span>
                <span>Superb</span>
            </div>
            <p>{{ Str::limit($data->description, 60, '...') }}</p>
            <hr />
            <ul class="list">
                <li><i class="bx bx-time"></i>{{ \Carbon\Carbon::parse($data->start_date)->diffInDays(\Carbon\Carbon::parse($data->end_date)) }} Days</li>
                <li><i class="bx bx-group"></i>160+</li>
                <li>PKR ={{ explode('.', $data->price)[0] }}/-</li>
            </ul>
        </div>
        <div class="spacer"></div>
    </div>
</div>
