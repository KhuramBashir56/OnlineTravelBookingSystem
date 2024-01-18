<?php

namespace App\Livewire\PanelApp\Admin;

use App\Models\Booking;
use App\Models\Transaction;
use Livewire\Component;

class BookingsList extends Component
{
    public $search, $transaction_id, $booking_id;

    public $bookingVerificationForm = false;

    public $bookingReleaseForm = false;

    public function verifyFormOpen($booking_id)
    {
        $this->bookingVerificationForm = true;
        $this->booking_id = $booking_id;
    }

    public function verifyFormClose()
    {
        $this->bookingVerificationForm = false;
        $this->reset('transaction_id');
        $this->booking_id = '';
    }

    public function verifyBooking($booking_id)
    {
        $this->authorize('admin');
        $booking = Booking::find($booking_id);
        if ($booking->status === 'unverified') {
            $this->validate([
                'transaction_id' => ['required', 'integer', 'min:1', 'unique:transactions,transaction_id']
            ], [
                'transaction_id.unique' => 'The transaction id has already been exist in the record.'
            ]);
            $booking->status = 'verified';
            $booking->save();
            Transaction::create([
                'reference' => $booking->id,
                'transaction_id' => $this->transaction_id,
                'debit' => 0,
                'credit' =>  explode('.', $booking->total_amount)[0],
                'type' => 'booking'
            ]);
            session()->flash('success', 'Payment verified successfully.');
        }
        $this->verifyFormClose();
    }

    public function releaseFormOpen($booking_id)
    {
        $this->bookingReleaseForm = true;
        $this->booking_id = $booking_id;
    }

    public function releaseFormClose()
    {
        $this->bookingReleaseForm = false;
        $this->reset('transaction_id');
        $this->booking_id = '';
    }

    public function releaseBooking($booking_id)
    {
        $this->authorize('admin');
        $booking = Booking::find($booking_id);
        if ($booking->released === 'no') {
            $this->validate([
                'transaction_id' => ['required', 'integer', 'min:1', 'unique:transactions,transaction_id']
            ], [
                'transaction_id.unique' => 'The transaction id has already been exist in the record.'
            ]);
            $booking->released = 'yes';
            $booking->save();
            Transaction::create([
                'reference' => $booking->id,
                'debit' => 0,
                'credit' => (explode('.', $booking->total_amount)[0] / 100) * 5,
                'type' => 'commission'
            ]);
            Transaction::create([
                'reference' => $booking->id,
                'transaction_id' => $this->transaction_id,
                'debit' => explode('.', $booking->total_amount)[0] - ((explode('.', $booking->total_amount)[0] / 100) * 5),
                'credit' =>  0,
                'type' => 'release'
            ]);
            session()->flash('success', 'Payment released successfully.');
        }
        $this->releaseFormClose();
    }

    public function render()
    {
        return view('livewire.panel-app.admin.bookings-list', [
            'bookings' => Booking::where('status', '!=', 'deleted')->where(function ($query) {
                $query->where('transaction_id', 'LIKE', $this->search . '%')->orWhere('account_title', 'LIKE', $this->search . '%');
            })->latest()->paginate(100)
        ]);
    }
}
