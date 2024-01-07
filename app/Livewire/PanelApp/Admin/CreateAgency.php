<?php

namespace App\Livewire\PanelApp\Admin;

use App\Models\Agency;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAgency extends Component
{
    use WithFileUploads;

    public $name, $mobile, $profile_image, $email, $password, $password_confirmation, $title, $logo, $address, $owner_id, $representative_name, $agency_email, $contact;

    public function cancel()
    {
        Redirect::route('admin.users');
        $this->reset(['name', 'mobile', 'profile_image', 'email', 'password', 'password_confirmation', 'title', 'owner_id', 'representative_name', 'agency_email', 'contact', 'address']);
    }

    public function save()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'max:15', 'min:11', 'string'],
            'profile_image' => [
                'mimes:jpeg,png,jpg,webp', 'image', 'max:300', 'required',
                // 'dimensions:min_width=200,min_height=200,max_width=800,max_height=800'
            ],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'title' => ['required', 'string', 'max:56', 'unique:agencies,title'],
            'logo' => ['required', '', 'max:56', 'unique:agencies,title'],
            'representative_name' => ['required', 'string', 'max:48'],
            'agency_email' => ['required', 'string', 'max:48', 'unique:agencies,email'],
            'contact' => ['required', 'string', 'max:15', 'min:11', 'unique:agencies,contact'],
            'address' => ['required', 'string', 'max:255'],
            'logo' => [
                'mimes:jpeg,png,jpg,webp', 'image', 'max:300', 'required',
                // 'dimensions:min_width=200,min_height=200,max_width=800,max_height=800'
            ]
        ], [
            'profile_image.dimensions' => 'The logo must have dimensions between 200x200 and 800x800.',
            'logo.dimensions' => 'The logo must have dimensions between 200x200 and 800x800.'
        ]);

        $user = new User;
        $user->name = $this->name;
        $user->mobile = $this->mobile;
        $user->profile_image = $this->profile_image->store('uploads/users/profile_images', 'public');
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->register_by = Auth::user()->id;
        $user->account_type = 'agency';
        $user->save();
        $agency_owner = User::latest()->first();
        Agency::create([
            'title' => $this->title,
            'logo' => $this->logo->store('uploads/agency-logos', 'public'),
            'owner_id' => $agency_owner->id,
            'name' => $this->name,
            'email' => $this->email,
            'contact' => $this->contact,
            'address' => $this->address,
            'register_by' => Auth::user()->id
        ]);
        $this->cancel();
    }

    public function render()
    {
        return view('livewire.panel-app.admin.create-agency');
    }
}
