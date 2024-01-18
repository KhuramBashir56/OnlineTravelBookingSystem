<div class="row">
    @if (session('success'))
        <x-panel-app.alerts.success :message="session('success')" />
    @endif
    <div class="col-12">
        <div class="card m-0">
            <div class="card-body d-flex align-items-center justify-content-between">
                <button type="button" wire:click="newModalOpen" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-outline-info">Add New Tour Guide</button>
                <div class="col-8 col-sm-4">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control" placeholder="Start typing to search...">
                </div>
            </div>
            <hr class="m-0">
            @if ($users->count() < 1)
                <h1 class="p-3">Record not found...</h1>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Profile Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile#</th>
                                <th scope="col">Registration Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $data)
                                <tr>
                                    <td>
                                        @if ($data->profile_image)
                                            <img src="{{ asset('storage/' . $data->profile_image) }}" alt="{{ $data->name }}" title="{{ $data->name }}" class="rounded-circle" width="35" height="35" />
                                        @else
                                            <img src="{{ asset('assets/panel/assets/images/users/d2.jpg') }}" alt="{{ $data->name }}" title="{{ $data->name }}" class="rounded-circle" width="35" height="35" />
                                        @endif
                                    </td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ Str::ucfirst($data->gender) }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->mobile }}</td>
                                    <td>
                                        <time title="{{ $data->created_at->format('d-m-Y') }}" datetime="{{ $data->created_at->format('d-m-Y') }}">{{ $data->created_at->format('F d, Y') }}</time>
                                    </td>
                                    <td>
                                        @if ($data->status === 'active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Blocked</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $users->links('components.panel-app.pagination-links') }}
            @endif
        </div>
    </div>
    @if ($addNewAgencyModel)
        <x-panel-app.modal-box>
            <div class="modal-header">
                <h5 class="modal-title">Ad New Tour Guide</h5>
                <button type="button" wire:click="newModalClose" wire:confirm="Are you sure you want to destroy the form data?" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn-close" title="Close"></button>
            </div>
            <form wire:submit="save" action="" method="POST">
                @csrf
                <div class="modal-body">
                    <x-panel-app.input type="text" wire:model="name" :for="__('name')" :title="__('Name')" required placeholder="Name" :error="$errors->first('name')" maxlength="48" />
                    <x-panel-app.label :for="__('gender')" :title="__('Gender')" :error="$errors->first('gender')">
                        <x-panel-app.radio-button wire:model="gender" :value="__('male')" :for="__('gender')" :title="__('Male')" />
                        <x-panel-app.radio-button wire:model="gender" :value="__('female')" :for="__('gender')" :title="__('Female')" />
                    </x-panel-app.label>
                    <x-panel-app.input type="text" wire:model="mobile" :for="__('mobile')" :title="__('Mobile Number')" required placeholder="Mobile Number" :error="$errors->first('mobile')" maxlength="15" minlength="11" />
                    <x-panel-app.input type="file" wire:model="profile_image" :for="__('profile_image')" :title="__('Profile Image')" required :error="$errors->first('profile_image')" />
                    @if ($profile_image)
                        <div class="text-center">
                            <img class="mb-2" src="{{ $profile_image->temporaryUrl() }}" width="50%" style="aspect-ratio:1;" alt="image description">
                        </div>
                    @endif
                    <x-panel-app.input type="text" wire:model="email" :for="__('email')" :title="__('Email Address')" required placeholder="Agency Representative Email Address" :error="$errors->first('email')" maxlength="48" />
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="newModalClose" wire:confirm="Are you sure you want to destroy the form data?" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-danger">Cancel</button>
                    <button type="submit" class="btn btn-success" wire:loading.attr="disabled" wire:offline.attr="disabled">Save</button>
                </div>
            </form>
        </x-panel-app.modal-box>
    @endif
</div>
