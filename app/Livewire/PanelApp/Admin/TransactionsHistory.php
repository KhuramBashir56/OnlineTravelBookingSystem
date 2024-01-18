<?php

namespace App\Livewire\PanelApp\Admin;

use App\Models\Transaction;
use Livewire\Component;

class TransactionsHistory extends Component
{
    public $search;

    public function showAll()
    {
        $this->reset('search');
    }
    
    public function render()
    {
        return view('livewire.panel-app.admin.transactions-history', [
            'transactions' => Transaction::where('created_at', 'LIKE', $this->search . '%')->latest()->paginate(100)
        ]);
    }
}