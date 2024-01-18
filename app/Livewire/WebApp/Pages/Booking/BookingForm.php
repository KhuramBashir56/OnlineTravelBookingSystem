<?php

namespace App\Livewire\WebApp\Pages\Booking;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class BookingForm extends Component
{
    public $package;

    public $persons = 1;

    public $total_amount, $bank_name, $account_title, $transaction_id, $claim_amount;

    public function mount()
    {
        $this->authorize('user');
        $package_amount = Package::find($this->package);
        $this->total_amount =  explode('.', $package_amount->price)[0];
    }

    public function decrement()
    {
        $this->authorize('user');
        $this->persons = ($this->persons <= 1) ?  1 : $this->persons - 1;
        $this->calculateTotalAmount();
    }

    public function increment()
    {
        $this->authorize('user');
        $this->persons = ($this->persons >= 20) ?  20 : $this->persons + 1;
        $this->calculateTotalAmount();
    }

    private function calculateTotalAmount()
    {
        $this->authorize('user');
        $package = Package::find($this->package);
        $this->total_amount = $this->persons * $package->price;
    }

    public function booking()
    {
        $this->authorize('user');
        $this->validate([
            'persons' => ['required', 'integer', 'min:1'],
            'total_amount' => ['required', 'integer', 'min:1'],
            'bank_name' => ['required', 'string', 'max:255'],
            'account_title' => ['required', 'string', 'max:255'],
            'transaction_id' => ['required', 'integer', 'min:1'],
            'claim_amount' => ['required', 'integer', 'min:1']
        ]);
        Booking::create([
            'package_id' => $this->package,
            'user_id' => Auth::user()->id,
            'persons' => $this->persons,
            'total_amount' => $this->total_amount,
            'bank_name' => $this->bank_name,
            'account_title' => $this->account_title,
            'transaction_id' => $this->transaction_id,
            'claim_amount' => $this->claim_amount
        ]);
        Redirect::route('welcome');
    }

    public function render()
    {
        $this->authorize('user');
        return view('livewire.web-app.pages.booking.booking-form');
    }
}
