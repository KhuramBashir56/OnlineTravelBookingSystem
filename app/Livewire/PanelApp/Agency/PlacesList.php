<?php

namespace App\Livewire\PanelApp\Agency;

use App\Models\City;
use App\Models\TourPlace;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PlacesList extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search, $city, $title, $thumbnail, $short_description, $description;

    public $addNewAgencyModel = false;

    public function newModalOpen()
    {
        $this->addNewAgencyModel = true;
    }

    public function newPlaceModalClose()
    {
        $this->addNewAgencyModel = false;
        $this->reset(['city', 'title', 'thumbnail', 'short_description', 'description']);
    }

    public function save()
    {
        $this->validate([
            'city' => ['required', 'min:1', 'integer'],
            'title' => ['required', 'string', 'max:255', 'unique:tour_places,title'],
            'thumbnail' => [
                'mimes:jpeg,png,jpg,webp', 'image', 'max:1024', 'required',
                // 'dimensions:min_width=440,min_height=248,max_width=1280,max_height=720'
            ],
            'short_description' => ['required'],
            'description' => ['required']
        ], [
            'thumbnail.dimensions' => 'The thumbnail must have dimensions between 440x248 and 1280x720.',
        ]);

        $agency_id = User::with(['agency' => function ($agency) {
            $agency->select('id', 'owner_id');
        }])->select('id')->find(Auth::user()->id);

        $place = new TourPlace;
        $place->city_id = $this->city;
        $place->title = trim($this->title);
        $place->thumbnail = $this->thumbnail->store('uploads/tour-places/thumbnail', 'public');
        $place->slug = str_replace(' ', '-', trim($this->title));
        $place->short_description = strip_tags($this->short_description);
        $place->description = strip_tags($this->description);
        $place->user_id = Auth::user()->id;
        $place->agency_id = $agency_id->agency->id;
        $place->save();
        $this->newPlaceModalClose();
        session()->flash('success', 'Destination record saved successfully.');
    }

    public function render()
    {
        return view('livewire.panel-app.agency.places-list', [
            'cities' => City::all(),
            'places' => TourPlace::with(['city' => function ($query) {
                $query->select('id', 'name');
            }])->select('id', 'city_id', 'title', 'thumbnail', 'status')->where('status', '!=', 'deleted')->where('user_id', Auth::user()->id)->where('title', 'LIKE', $this->search . '%')->paginate(100)
        ]);
    }
}
