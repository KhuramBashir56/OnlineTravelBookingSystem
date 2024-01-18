<x-layouts.guest-layout>
    <x-slot name="title">
        {{ __('Register') }}
    </x-slot>

    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>Register</h1>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{ asset('assets/web-app/img/page-title-area/register.jpg') }}" alt="Demo Image" />
        </div>
    </div>

    <div class="authentication-section">
        <div class="container">
            <div class="main-form ptb-100">
                <form id="#authForm" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="content">
                        <h3>Create Account</h3>
                        <p>Register please if you don't have an account</p>
                    </div>
                    <div class="form-group">
                        <div class="input-icon"><i class="bx bx-user"></i></div>
                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" maxlength="48" pattern="^[a-zA-Z ]+$" placeholder="Your Full Name" />
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon"><i class="bx bx-phone"></i></div>
                        <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}" class="form-control" maxlength="11" autocomplete="mobile" required maxlength="15" pattern="^[0-9]+$" placeholder="Your Mobile Number" />
                        @error('mobile')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon"><i class="bx bx-at"></i></div>
                        <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" maxlength="56" placeholder="Email Address" />
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon"><i class="bx bx-key"></i></div>
                        <input type="password" id="password" class="form-control" name="password" required autocomplete="new-password" minlength="8" maxlength="25" pattern="[^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$]" placeholder="Password" />
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
                    <div class="row align-items-start mb-30">
                        <div class="col-lg-12">
                            <div class="checkbox">
                                <input type="checkbox" id="agreement" name="agreement" value="agreement" required />
                                <label for="agreement">I agreed Jaunt <a href="terms-of-service.html">Terms of Services</a> and <a href="privacy-policy.html">Privacy Policy</a></label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.guest-layout>
