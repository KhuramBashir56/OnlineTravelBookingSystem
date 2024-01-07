<?php

namespace App\Livewire\PanelApp\Agency;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class GuidesList extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search, $name, $gender, $mobile, $profile_image, $email, $password, $password_confirmation;

    public $addNewAgencyModel = null;

    public function newModalOpen()
    {
        $this->addNewAgencyModel = true;
    }

    public function newModalClose()
    {
        $this->addNewAgencyModel = false;
        $this->reset(['name', 'mobile', 'profile_image', 'email', 'password', 'password_confirmation']);
    }


    public function save()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'mobile' => ['required', 'max:15', 'min:11', 'string', 'unique:users,mobile'],
            'profile_image' => [
                'mimes:jpeg,png,jpg,webp', 'image', 'max:300', 'required',
                // 'dimensions:min_width=200,min_height=200,max_width=800,max_height=800'
            ],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'profile_image.dimensions' => 'The logo must have dimensions between 200x200 and 800x800.',
        ]);

        $user = new User;
        $user->name = $this->name;
        $user->gender = $this->gender;
        $user->mobile = $this->mobile;
        $user->profile_image = $this->profile_image->store('uploads/users/profile_images', 'public');
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->register_by = Auth::user()->id;
        $user->account_type = 'guide';
        $user->save();
        $this->newModalClose();
        session()->flash('success', 'Tour guide account successfully created, please go to agency tab and add agency details.');
    }

    public function render()
    {
        return view('livewire.panel-app.agency.guides-list', [
            'users' => User::where('status', '!=', 'deleted')->where('account_type', 'guide')->where('register_by', Auth::user()->id)->where(function ($query) {
                $query->where('name', 'LIKE', $this->search . '%')->orWhere('email',  'LIKE', $this->search . '%');
            })->select('profile_image', 'name', 'gender', 'email', 'created_at', 'status', 'mobile')->orderBy('name', 'asc')->paginate(100)
        ]);
    }
}
