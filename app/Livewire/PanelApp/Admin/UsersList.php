<?php

namespace App\Livewire\PanelApp\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public $search;

    public function newModalOpen()
    {
        Redirect::route("admin.create_agency");
    }

    public function render()
    {
        return view('livewire.panel-app.admin.users-list', [
            'users' => User::where('status', '!=', 'deleted')->where('account_type', '!=', 'admin')->where(function ($query) {
                $query->where('name', 'LIKE', $this->search . '%')->orWhere('email',  'LIKE', $this->search . '%');
            })->select('profile_image', 'name', 'email', 'created_at', 'status', 'account_type', 'mobile')->orderBy('name', 'asc')->paginate(100)
        ]);
    }
}
