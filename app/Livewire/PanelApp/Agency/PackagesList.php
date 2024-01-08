<?php

namespace App\Livewire\PanelApp\Agency;

use App\Models\Package;
use App\Models\TourPlace;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PackagesList extends Component
{
    use WithPagination;

    public $addNewAgencyModel = false;

    public $places = [];

    public $search, $place_id, $title, $price, $description, $start_date, $end_date;

    public function newModalOpen()
    {
        $this->addNewAgencyModel = true;
        $this->places = TourPlace::where('user_id', Auth::user()->id)->where('status', 'published')->with(['city' => function ($query) {
            $query->select('id', 'name');
        }])->select('id', 'title', 'city_id')->get();
    }

    public function newPlaceModalClose()
    {
        $this->addNewAgencyModel = false;
        $this->places = [];
        $this->reset(['place_id', 'title', 'price', 'description', 'start_date', 'end_date']);
    }

    public function save()
    {
        $this->validate([
            'place_id' => ['required', 'integer', 'min:1'],
            'title' => ['required', 'string', 'max:56'],
            'price' => ['required', 'integer', 'max:9999999'],
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date', 'after_or_equal:today'],
            'description' => ['required', 'string', 'max:1500']
        ]);
        $agency_id = User::with(['agency' => function ($agency) {
            $agency->select('id', 'owner_id');
        }])->select('id')->find(Auth::user()->id);
        Package::create([
            'user_id' => Auth::user()->id,
            'agency_id' => $agency_id->agency->id,
            'place_id' => $this->place_id,
            'title' => $this->title,
            'price' => $this->price,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'slug' => str_replace(' ', '-', trim($this->title)),
            'description' => $this->description
        ]);
        $this->newPlaceModalClose();
        session()->flash('success', 'New tour package data was saved successfully.');
    }

    public function render()
    {
        return view('livewire.panel-app.agency.packages-list', [
            'packages' => Package::where('status', '!=', 'deleted')->with(['place'])->where('title', 'LIKE', $this->search . '%')->paginate(100)
        ]);
    }
}
