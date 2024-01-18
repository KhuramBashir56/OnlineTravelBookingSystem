<div>
    @if (session('success'))
        <x-web-app.alert.success :message="session('success')" />
    @endif
    @auth
        @can('user')
            <a href="{{ route('user.booking', ['package' => $package]) }}" class="mb-5 btn btn-primary">Buy Package</a>
        @endcan
    @else
        @if ($userLogin)
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Account Login</h1>
                        <button type="button" class="btn-close" title="Close" wire:click="closeForm"></button>
                    </div>
                    <form wire:submit="login">
                        <div class="modal-body">
                            <div class="main-form">
                                <div class="form-group">
                                    <div class="input-icon"><i class="bx bx-user"></i></div>
                                    <input class="form-control" wire:model="email" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" placeholder="Enter Your Email Address" maxlength="65" />
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-icon"><i class="bx bx-key"></i></div>
                                    <input class="form-control" wire:model="password" id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password" minlength="8" maxlength="32" />
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="row align-items-center mb-30">
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <div class="checkbox">
                                            <input wire:model="remember" type="checkbox" id="remember_me" name="remember" />
                                            <label for="remember">Remember me</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="m-4 text-center">
                            <a href="{{ route('register') }}">Don't already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <button type="button" wire:click="loginForm" class="mb-5 btn btn-primary">Buy Package</button>
        @endif
    @endauth
</div>
