<form class="form-horizontal" wire:submit="save">
    <div class="card-body">
        <h4 class="card-title">Owner Info</h4>
        <div class="row">
            <div class="col-lg-6">
                <x-panel-app.input type="text" wire:model="name" :for="__('name')" :title="__('Agency Owner Name')" required placeholder="Agency Owner Name" :error="$errors->first('name')" maxlength="48" />
            </div>
            <div class="col-lg-6">
                <x-panel-app.input type="text" wire:model="mobile" :for="__('mobile')" :title="__('Agency Owner Mobile Number')" required placeholder="Agency Owner Mobile Number" :error="$errors->first('mobile')" maxlength="15" minlength="11" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <x-panel-app.input type="text" wire:model="email" :for="__('email')" :title="__('Email Address')" required placeholder="Agency Representative Email Address" :error="$errors->first('email')" maxlength="48" />
            </div>
            <div class="col-lg-6">
                <x-panel-app.input type="file" wire:model="profile_image" :for="__('profile_image')" :title="__('Agency Owner Profile Image')" required :error="$errors->first('profile_image')" />
                @if ($profile_image)
                    <div class="text-center">
                        <img class="mb-2" src="{{ $profile_image->temporaryUrl() }}" width="50%" style="aspect-ratio:1;" alt="image description">
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <x-panel-app.input type="password" wire:model="password" :for="__('password')" :title="__('Password')" required placeholder="Password" :error="$errors->first('password')" maxlength="32" minlength="8" />
            </div>
            <div class="col-lg-6">
                <x-panel-app.input type="password" wire:model="password_confirmation" :for="__('password_confirmation')" :title="__('Confirm Password')" required placeholder="Confirm Password" :error="$errors->first('password_confirmation')" maxlength="32" minlength="8" />
            </div>
        </div>
        <hr>
        <h4 class="card-title">Agency Info</h4>
        <div class="row">
            <div class="col-lg-6">
                <x-panel-app.input type="text" wire:model="title" :for="__('title')" :title="__('Agency Name / Title')" required placeholder="New Agency Name / Title" :error="$errors->first('title')" maxlength="48" />
            </div>
            <div class="col-lg-6">
                <x-panel-app.input type="text" wire:model="representative_name" :for="__('representative_name')" :title="__('Agency Representative Name')" required placeholder="Agency Representative Name" :error="$errors->first('representative_name')" maxlength="56" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <x-panel-app.input type="text" wire:model="agency_email" :for="__('agency_email')" :title="__('Agency Representative Email Address')" required placeholder="Agency Representative Email Address" :error="$errors->first('agency_email')" maxlength="48" />
            </div>
            <div class="col-lg-6">
                <x-panel-app.input type="text" wire:model="contact" :for="__('contact')" :title="__('Agency Representative Phone Number')" required placeholder="Agency Representative Phone Number" :error="$errors->first('contact')" maxlength="15" minlength="11" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <x-panel-app.textarea wire:model="address" :for="__('address')" :title="__('Agency Office Address')" required placeholder="Write here Agency Office Address" :error="$errors->first('address')" maxlength="255" />
            </div>
            <div class="col-lg-6">
                <x-panel-app.input type="file" wire:model="logo" :for="__('logo')" :title="__('Agency Logo')" required :error="$errors->first('logo')" />
                @if ($logo)
                    <div class="text-center">
                        <img class="mb-2" src="{{ $logo->temporaryUrl() }}" width="50%" style="aspect-ratio:1;" alt="image description">
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button type="button" wire:click="cancel" wire:confirm="Are you sure you want to destroy the form data?" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-danger me-2">Cancel</button>
            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:offline.attr="disabled">Save</button>
        </div>
    </div>
</form>
