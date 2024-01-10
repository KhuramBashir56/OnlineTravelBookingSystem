<?php

namespace App\Livewire\WebApp\Pages\Packages;

use App\Models\PackageComment;
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
        PackageComment::create([
            'name' => $this->name,
            'email' => $this->email,
            'comment' => $this->comment,
            'package_id' => $this->place,
        ]);
        $this->reset('name', 'email', 'comment');
        session()->flash('success', 'Thank you for your comment. We will read and publish the comment.');
    }

    public function render()
    {
        return view('livewire.web-app.pages.packages.comments', [
            'comments' => PackageComment::where('status', 'published')->where('package_id', $this->place)->get()
        ]);
    }
}
