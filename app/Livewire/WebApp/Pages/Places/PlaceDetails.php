<?php

namespace App\Livewire\WebApp\Pages\Places;

use App\Models\TourPlace;
use Livewire\Component;

class PlaceDetails extends Component
{
    public $search, $place;

    public function render()
    {
        return view('livewire.web-app.pages.places.place-details', [
            'placeData' => TourPlace::where('slug', $this->place)->first(),
            'places' => TourPlace::with(['city:id,name'])->where('status', 'published')->where('title', 'LIKE', $this->search . '%')->get()
        ]);
    }
}
