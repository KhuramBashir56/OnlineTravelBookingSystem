<?php

namespace App\Livewire\WebApp\Pages\Places;

use App\Models\TourPlace;
use Livewire\Component;

class PlaceDetails extends Component
{
    public $place;

    public function render()
    {
        return view('livewire.web-app.pages.places.place-details', [
            'placeData' => TourPlace::where('slug', $this->place)->first()
        ]);
    }
}
