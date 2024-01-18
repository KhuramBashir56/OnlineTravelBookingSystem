<?php

namespace App\Livewire\PanelApp\Agency;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookingsList extends Component
{
    public function render()
    {
        return view('livewire.panel-app.agency.bookings-list', [
            'user' => User::with(['bookings' => function ($query) {
                $query->latest();
            }])->find(Auth::user()->id)
        ]);
    }
}