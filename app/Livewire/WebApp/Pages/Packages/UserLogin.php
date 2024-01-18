<?php

namespace App\Livewire\WebApp\Pages\Packages;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Str;


class UserLogin extends Component
{
    public $package;

    public $userLogin = false;

    #[Rule(['required', 'string', 'email'])]
    public string $email = '';

    #[Rule(['required', 'string'])]
    public string $password = '';

    #[Rule(['boolean'])]
    public bool $remember = false;

    public function loginForm()
    {
        $this->userLogin  = true;
    }

    public function closeForm()
    {
        $this->userLogin = false;
        $this->reset('email', 'password', 'remember');
    }

    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (!auth()->attempt($this->only(['email', 'password'], $this->remember))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());

        session()->regenerate();

        $this->closeForm();

        session()->flash('success', 'You have login successfully, now you can buy the package.');
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }

    public function render()
    {
        return view('livewire.web-app.pages.packages.user-login');
    }
}
