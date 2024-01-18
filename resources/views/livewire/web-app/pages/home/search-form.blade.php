<div class="container">
    <div class="search-form">
        <form action="" wire:submit="search">
            <div class="row align-items-center">
                <div class="col-lg-11">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="select-box">
                                <i class="bx bx-map-alt text-dark"></i>
                                <select class="form-control" wire:model='city_id' required wire:click="cityList">
                                    <option>Pleas Select City</option>
                                    @foreach ($cityData as $data)
                                        <option value="{{ $data->id }}" {{ $city_id === $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="select-box">
                                <input type="date" wire:model="start" class="form-control" placeholder="Depart Date" required="required" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="select-box">
                                <i class="bx bx-time text-dark"></i>
                                <select class="form-control" wire:model="duration" required>
                                    <option data-display="Tour Duration" value="">Tout Duration</option>
                                    <option value="1">1 Day</option>
                                    <option value="3">3 Days</option>
                                    <option value="5">5 Days</option>
                                    <option value="7">7 Days</option>
                                    <option value="10">10 Days</option>
                                    <option value="15">15 Days</option>
                                    <option value="20">20 Days</option>
                                    <option value="25">25 Days</option>
                                    <option value="30">30 Days</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1">
                    <button type="submit" class="btn-search">
                        <i class="bx bx-search-alt"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if ($searchToggle)
        <section class="destination-section pt-100 pb-70" style="margin-top: -70px">
            <div class="container">
                <div class="row">
                    @forelse ($cardData as $data)
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
                                        <li><i class="bx bx-time"></i>{{ \Carbon\Carbon::parse($data->start)->diffInDays(\Carbon\Carbon::parse($data->end)) }} Days</li>
                                        <li><i class="bx bx-group"></i>160+</li>
                                        <li>PKR ={{ explode('.', $data->price)[0] }}/-</li>
                                    </ul>
                                </div>
                                <div class="spacer"></div>
                            </div>
                        </div>
                    @empty
                        <h3 class="text-center">Record Not Found...</h3>
                    @endforelse
                </div>
            </div>
        </section>
    @endif
</div>
