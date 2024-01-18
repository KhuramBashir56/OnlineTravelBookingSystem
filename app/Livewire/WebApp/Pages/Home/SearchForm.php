<?php

namespace App\Livewire\WebApp\Pages\Home;

use App\Models\City;
use App\Models\Package;
use Livewire\Component;

class SearchForm extends Component
{
    public $cities = [];

    public $cardData = [];

    public $searchToggle = false;

    public $city_id, $start, $duration;

    public function cityList()
    {
        $this->cities = City::select('id', 'name')->orderBy('name', 'asc')->get();
    }

    public function search()
    {
        $this->cardData = Package::where('status', 'published')->when(!empty($this->start), function ($query) {
                $query->whereDate('start', '>=', $this->start);
            })->when(!empty($this->city_id), function ($query) {
                $query->whereHas('place', function ($city) {
                    $city->where('city_id', '=', $this->city_id);
                });
            })->when(!empty($this->duration), function ($query) {
                $query->where('duration', 'LIKE', $this->duration);
            })->where('end', '>', now()->endOfDay())->get();

        $this->searchToggle = true;
    }

    public function render()
    {
        return view('livewire.web-app.pages.home.search-form', [
            'cityData' => $this->cities,
        ]);
    }
}
