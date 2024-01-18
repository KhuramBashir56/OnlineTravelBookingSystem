<?php

namespace App\Livewire\PanelApp\Admin;

use App\Models\Agency;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithPagination;

class AgenciesList extends Component
{
    use WithPagination;

    public $search, $agency, $agency_id, $reason;

    public $informationModal = false;

    public $blockReasonForm = false;

    public $users = [];

    public function addNew()
    {
        Redirect::route("admin.create_agency");
    }

    public function information($agency_id)
    {
        $this->informationModal = true;
        $this->agency = Agency::with(['agencyOwner' => function ($query) {
            $query->select('id', 'name', 'email', 'mobile');
        }])->select('id', 'title', 'logo', 'owner_id', 'name', 'email', 'contact', 'address', 'status', 'created_at')->find($agency_id);
    }

    public function informationModalClose()
    {
        $this->informationModal = false;
        $this->agency = '';
    }

    public function block($agency_id)
    {
        $this->informationModal = false;
        $this->blockReasonForm = true;
        $this->agency_id = $agency_id;
    }

    public function blockModalClose()
    {
        $this->informationModal = false;
        $this->blockReasonForm = false;
        $this->agency_id = '';
    }

    public function blockAccount($agency_id)
    {
        $agency = Agency::find($agency_id);
        $agency->status = 'blocked';
        $agency->save();
        $account = $agency->agencyOwner;
        $account->status = 'blocked';
        $account->block_reason = $this->reason;
        $account->blocked_by = Auth::user()->id;
        $account->blocked_at = now();
        $account->save();
        $this->blockModalClose();
        session()->flash('success', 'Account blocked successfully.');
    }

    public function render()
    {
        return view('livewire.panel-app.admin.agencies-list', [
            'agencies' => Agency::where('status', '!=', 'deleted')->where('title', 'LIKE', $this->search . '%')->select('id', 'title', 'logo', 'status', 'created_at')->latest()->paginate(100)
        ]);
    }
}
