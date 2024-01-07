<?php

namespace App\Livewire\PanelApp\Admin;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MessagesList extends Component
{
    use WithPagination;

    public $search, $message;

    public $openMessage = false;

    public function information($message_id)
    {
        $this->openMessage = true;
        $read = Message::find($message_id);
        if ($read->read != 'yes') {
            $read->read = 'yes';
            $read->read_by = Auth::user()->id;
            $read->save();
        }
        $this->message = $read;
    }

    public function closeMessage()
    {
        $this->openMessage = false;
        $this->message = '';
    }

    public function delete($message_id)
    {
        $delete = Message::find($message_id);
        $delete->status = 'deleted';
        $delete->save();
        session()->flash('success', 'Messaged deleted successfully.');
        $this->closeMessage();
    }

    public function render()
    {
        return view('livewire.panel-app.admin.messages-list', [
            'messages' => Message::where('status', 'active')->where(function ($query) {
                $query->where('email', 'LIKE', $this->search . '%')->orWhere('subject', 'LIKE', $this->search . '%');
            })->latest()->paginate(100)
        ]);
    }
}
