<x-layouts.guest-layout>
    <x-slot name="title">
        {{ __('Change Password') }}
    </x-slot>

    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>Change Password</h1>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{ asset('assets/web-app/img/page-title-area/register.jpg') }}" alt="Demo Image" />
        </div>
    </div>
    <div class="authentication-section">
        <div class="container">
            <div class="main-form ptb-100">
                <form id="#authForm" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="content">
                        <h3>Change Password</h3>
                        <p>Change password using the old password</p>
                    </div>
                    <div class="form-group">
                        <div class="input-icon"><i class="bx bx-key"></i></div>
                        <input type="password" id="current_password" class="form-control" name="current_password" value="{{ old('current_password') }}" required autocomplete="current_password" maxlength="56" placeholder="Old Password" />
                        @error('current_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon"><i class="bx bx-key"></i></div>
                        <input type="password" id="password" class="form-control" name="password" required autocomplete="new-password" minlength="8" maxlength="25" pattern="[^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$]" placeholder="New Password" />
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon"><i class="bx bx-key"></i></div>
                        <input type="password" id="password_confirmation" class="form-control"name="password_confirmation" required autocomplete="new-password" minlength="8" maxlength="25" pattern="[^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$]" placeholder="Confirm Password" />
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
    {{-- <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-layouts.guest-layout>
