<?php

namespace App\Livewire\WebApp;

use App\Models\Message;
use Livewire\Component;

class ContactForm extends Component
{

    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';

    public function send()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:50'],
            'subject' => ['required', 'string', 'max:100'],
            'message' => ['required', 'string', 'max:1000'],
        ]);
        Message::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);
        $this->reset(['name', 'email', 'subject', 'message']);
        session()->flash('success', 'Your message has been successfully received and we will contact you as soon as possible.');
    }

    public function render()
    {
        return view('livewire.web-app.contact-form');
    }
}
