<?php

namespace App\Livewire\WebApp\Pages\Home;

use App\Models\TourPlace;
use Livewire\Component;

class Destinations extends Component
{
    public function render()
    {
        return view('livewire.web-app.pages.home.destinations', [
            'destinations' => TourPlace::where('status', 'published')->inRandomOrder()->paginate(6)
        ]);
    }
}
