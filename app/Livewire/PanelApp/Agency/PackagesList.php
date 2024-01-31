<?php

namespace App\Livewire\PanelApp\Agency;

use App\Models\Package;
use App\Models\PackagesGuides;
use App\Models\TourPlace;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PackagesList extends Component
{
    use WithPagination;

    public $addNewAgencyModel = false;

    public $packageInfo = false;

    public $addNewGuide = false;

    public $places = [];

    public $search, $package, $guide_id, $guides, $place_id, $title, $price, $description, $start, $end;

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
        $this->reset(['place_id', 'title', 'price', 'description', 'start', 'end']);
    }

    public function save()
    {
        $this->validate([
            'place_id' => ['required', 'integer', 'min:1'],
            'title' => ['required', 'string', 'max:56'],
            'price' => ['required', 'integer', 'max:9999999'],
            'start' => ['required', 'date', 'after_or_equal:today'],
            'end' => ['required', 'date', 'after_or_equal:start', 'after_or_equal:today'],
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
            'start' => $this->start,
            'end' => $this->end,
            'duration' => Carbon::parse($this->start)->diffInDays(\Carbon\Carbon::parse($this->end)),
            'slug' => str_replace(' ', '-', trim($this->title)),
            'description' => $this->description
        ]);
        $this->newPlaceModalClose();
        session()->flash('success', 'New tour package data was saved successfully.');
    }

    public function information($package_id)
    {
        $this->packageInfo = true;
        $this->package = Package::find($package_id);
    }

    public function closeInformation()
    {

        $this->packageInfo = false;
    }

    public function addGuide($package_id)
    {
        $this->packageInfo = false;
        $this->addNewGuide = true;
        $this->guides = User::where('status', 'active')->where('register_by', Auth::user()->id)->select('id', 'name', 'register_by')->get();
        $this->package = $package_id;
    }

    public function closeAssign()
    {
        $this->reset('guide_id');
        $this->package = '';
        $this->addNewGuide = false;
    }

    public function assignGuide()
    {
        $agency_id = User::with(['agency' => function ($agency) {
            $agency->select('id', 'owner_id');
        }])->select('id')->find(Auth::user()->id);

        $exitGuide = PackagesGuides::where('package_id', $this->package)->where('guide_id', $this->guide_id)->first();
        $this->validate([
            'guide_id' => ['required', 'integer', 'min:1']
        ]);

        if (empty($exitGuide)) {
            PackagesGuides::create([
                'package_id' => $this->package,
                'agency_id' => $agency_id->id,
                'guide_id' => $this->guide_id,
            ]);
            session()->flash('success', 'New tour package data was saved successfully.');
        } else {
            session()->flash('error', 'Tour guide already assigned.');
        }
        $this->closeAssign();
    }

    public function render()
    {
        return view('livewire.panel-app.agency.packages-list', [
            'packages' => Package::where(function ($query) {
                $query->where('status', '!=', 'deleted')->where('user_id', Auth::user()->id);
            })->with(['place'])->where('title', 'LIKE', $this->search . '%')->latest()->paginate(100)
        ]);
    }
}