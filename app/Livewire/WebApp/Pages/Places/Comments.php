<?php

namespace App\Livewire\WebApp\Pages\Places;

use App\Models\PlaceComment;
use Livewire\Component;

class Comments extends Component
{
    public $place, $author, $name, $email, $comment;

    public function saveComment()
    {
        $this->validate([
            'name' => ['string', 'required', 'max:56'],
            'email' => ['email', 'required', 'max:56'],
            'comment' => ['required', 'string', 'max:255']
        ]);
        PlaceComment::create([
            'name' => $this->name,
            'email' => $this->email,
            'comment' => $this->comment,
            'place_id' => $this->place,
        ]);
        $this->reset('name', 'email', 'comment');
        session()->flash('success', 'Thank you for your comment. We will read and publish the comment.');
    }

    public function render()
    {
        return view('livewire.web-app.pages.places.comments', [
            'comments' => PlaceComment::where('place_id', $this->place)->get()
        ]);
    }
}
