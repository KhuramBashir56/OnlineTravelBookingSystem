<x-layouts.guest-layout>
    <x-slot name="title">
        {{ __('Login') }}
    </x-slot>

    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>Login</h1>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{ asset('assets/web-app/img/page-title-area/login.jpg') }}" alt="Demo Image" />
        </div>
    </div>

    <div class="authentication-section">
        <div class="container">
            <div class="main-form ptb-100">
                <form id="#authForm" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="content">
                        <h3>Welcome Back</h3>
                        <p>Login please if you already have an account</p>
                    </div>
                    <div class="form-group">
                        <div class="input-icon"><i class="bx bx-user"></i></div>
                        <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" placeholder="Enter Your Email Address" maxlength="65" />
                    </div>
                    <div class="form-group">
                        <div class="input-icon"><i class="bx bx-key"></i></div>
                        <input class="form-control" id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password" minlength="8" maxlength="32" />
                    </div>
                    <div class="row align-items-center mb-30">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <div class="checkbox">
                                <input type="checkbox" id="remember_me" name="remember" />
                                <label for="remember">Remember me</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.guest-layout>
