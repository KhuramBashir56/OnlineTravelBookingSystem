<?php

namespace App\Livewire\PanelApp\Admin;

use App\Models\TourPlace;
use Livewire\Component;
use Livewire\WithPagination;

class PlacesList extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $this->authorize('admin');
        return view('livewire.panel-app.admin.places-list', [
            'places' => TourPlace::with(['city' => function ($query) {
                $query->select('id', 'name');
            }, 'agency' => function ($agency) {
                $agency->select('id', 'title');
            }])->select('id', 'city_id', 'agency_id', 'title', 'thumbnail', 'status')->where('status', '!=', 'deleted')->where('title', 'LIKE', $this->search . '%')->paginate(100)
        ]);
    }
}
