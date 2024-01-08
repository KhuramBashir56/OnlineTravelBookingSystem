<?php

namespace App\Livewire\WebApp\Pages\Home;

use App\Models\Package;
use Livewire\Component;

class Packages extends Component
{

    public $data;

    public function render()
    {
        return view('livewire.web-app.pages.home.packages', [
            'packages' => Package::where('status', 'published')->with(['place' => function ($place) {
                $place->with(['city' => function ($city) {
                    $city->select('id', 'name');
                }])->select('id', 'city_id', 'title', 'thumbnail');
            }])->select('id', 'place_id', 'title', 'description', 'price', 'start_date', 'end_date')->paginate(6)
        ]);
    }
}
