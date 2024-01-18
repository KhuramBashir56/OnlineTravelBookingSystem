<?php

namespace App\Livewire\WebApp\Pages\Packages;

use App\Models\Package;
use Carbon\Carbon;
use Livewire\Component;

class PackageDetails extends Component
{
    public $package;

    public function render()
    {
        return view('livewire.web-app.pages.packages.package-details', [
            'packageData' => Package::where('slug', $this->package)->first()
        ]);
    }
}
