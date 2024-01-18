<x-layouts.panel-layout>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="row">
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="text-center box bg-cyan">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-clipboard"></i>
                    </h1>
                    <h6 class="text-white">New Bookings</h6>
                    <h2 class="text-white">{{ count($bookings->bookings->where('status', 'unverified')) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="text-center box bg-success">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-account-multiple"></i>
                    </h1>
                    <h6 class="text-white">Total Tour Guides</h6>
                    <h2 class="text-white">{{ $guides }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="text-center box bg-warning">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-group"></i>
                    </h1>
                    <h6 class="text-white">Active Packages</h6>
                    <h2 class="text-white">{{ $packages }}</h2>
                </div>
            </div>
        </div>
    </div>
</x-layouts.panel-layout>
