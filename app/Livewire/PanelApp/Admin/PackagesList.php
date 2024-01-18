<?php

namespace App\Livewire\PanelApp\Admin;

use App\Models\Package;
use Livewire\Component;

class PackagesList extends Component
{

    public function __construct()
    {
        $this->authorize('admin');
    }
    public $search, $package;

    public $packageInfo = false;

    public function information($package_id)
    {
        $this->packageInfo = true;
        $this->package = Package::find($package_id);
    }

    public function closeInformation()
    {
        $this->packageInfo = false;
        $this->package = '';
    }

    public function published($package_id)
    {
        $package = Package::find($package_id);
        $package->status = 'published';
        $package->save();
        session()->flash('success', 'Record Published.');
        $this->closeInformation();
    }

    public function unpublished($package_id)
    {
        $package = Package::find($package_id);
        $package->status = 'unpublished';
        $package->save();
        session()->flash('success', 'Record Un Published.');
        $this->closeInformation();
    }

    public function delete($package_id)
    {
        $package = Package::find($package_id);
        $package->status = 'deleted';
        $package->save();
        session()->flash('success', 'Record Un Published.');
        $this->closeInformation();
    }

    public function render()
    {
        return view('livewire.panel-app.admin.packages-list', [
            'packages' => Package::where('status', '!=', 'deleted')->where('end', '>', now()->endOfDay())->with(['place'])->where('title', 'LIKE', $this->search . '%')->paginate(100)
        ]);
    }
}