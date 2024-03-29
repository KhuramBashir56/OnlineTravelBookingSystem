<x-layouts.panel-layout>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="row">
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-factory"></i>
                    </h1>
                    <h6 class="text-white">Agencies</h6>
                    <h2 class="text-white">{{ $agencies }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-highway"></i>
                    </h1>
                    <h6 class="text-white">Tour Destinations</h6>
                    <h2 class="text-white">{{ $places }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-primary text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-note-text"></i>
                    </h1>
                    <h6 class="text-white">New Bookings</h6>
                    <h2 class="text-white">{{ $bookings }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-account-check"></i>
                    </h1>
                    <h6 class="text-white">Tour Guides</h6>
                    <h2 class="text-white">{{ $guides }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-message-bulleted"></i>
                    </h1>
                    <h6 class="text-white">New Messages</h6>
                    <h2 class="text-white">{{ $messages }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-account-multiple"></i>
                    </h1>
                    <h6 class="text-white">Registered Users</h6>
                    <h2 class="text-white">{{ $users }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-cash-multiple"></i>
                    </h1>
                    <h6 class="text-white">Total Received Amount</h6>
                    <h2 class="text-white">PKR {{ number_format($received_amount) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-wallet"></i>
                    </h1>
                    <h6 class="text-white">Total Commission</h6>
                    <h2 class="text-white">PKR {{ number_format($total_commission) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white">
                        <i class="mdi mdi-currency-usd"></i>
                    </h1>
                    <h6 class="text-white">Total Payment Released</h6>
                    <h2 class="text-white">PKR {{ number_format($total_release) }}</h2>
                </div>
            </div>
        </div>
    </div>
</x-layouts.panel-layout>
