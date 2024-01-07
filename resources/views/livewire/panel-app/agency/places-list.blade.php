<div class="row">
    @if (session('success'))
        <x-panel-app.alerts.success :message="session('success')" />
    @endif
    <div class="col-12">
        <div class="card m-0">
            <div class="card-body d-flex align-items-center justify-content-between">
                <button type="button" wire:click="newModalOpen" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-outline-info">Add New Tour Destinations</button>
                <div class="col-8 col-sm-4">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control" placeholder="Start typing to search...">
                </div>
            </div>
            <hr class="m-0">
            @if ($places->count() < 1)
                <h1 class="p-3">Record not found...</h1>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Title</th>
                                <th scope="col">City</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($places as $data)
                                <tr>
                                    <td>
                                        @if ($data->thumbnail)
                                            <img src="{{ asset('storage/' . $data->thumbnail) }}" alt="{{ $data->title }}" title="{{ $data->title }}" width="50" height="35" />
                                        @else
                                            <img src="{{ asset('assets/panel/assets/images/users/d2.jpg') }}" alt="{{ $data->title }}" title="{{ $data->title }}" width="50" height="35" />
                                        @endif
                                    </td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->city->name }}</td>
                                    <td>
                                        @if ($data->status === 'published')
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-danger">Un Published</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $places->links('components.panel-app.pagination-links') }}
            @endif
        </div>
    </div>
    @if ($addNewAgencyModel)
        <x-panel-app.modal-box>
            <div class="modal-header">
                <h5 class="modal-title">Ad New Tour Destination</h5>
                <button type="button" wire:click="newPlaceModalClose" wire:confirm="Are you sure you want to destroy the form data?" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn-close" title="Close"></button>
            </div>
            <form wire:submit="save" action="" method="POST">
                @csrf
                <div class="modal-body">
                    <x-panel-app.input-select wire:model="city" :for="__('city')" :title="__('City')" :error="$errors->first('city')" required>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </x-panel-app.input-select>
                    <x-panel-app.input type="text" wire:model="title" :for="__('title')" :title="__('Tour Place Title')" required :error="$errors->first('title')" required />
                    <x-panel-app.input type="file" wire:model="thumbnail" :for="__('thumbnail')" :title="__('Profile Image')" required :error="$errors->first('thumbnail')" />
                    @if ($thumbnail)
                        <div class="text-center">
                            <img class="mb-2" src="{{ $thumbnail->temporaryUrl() }}" width="50%" style="aspect-ratio:1;" alt="image description">
                        </div>
                    @endif
                    <x-panel-app.textarea wire:model="short_description" :for="__('short_description')" :title="__('Short Description')" :error="$errors->first('short_description')" required maxlength="160" placeholder="Write a short description of up to 160 characters." />
                    <x-panel-app.textarea wire:model="description" :for="__('description')" :title="__('Description')" :error="$errors->first('description')" rows='10' required maxlength="1500" placeholder="Write a description of up to 1500 characters." />
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="newPlaceModalClose
                    " wire:confirm="Are you sure you want to destroy the form data?" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-danger">Cancel</button>
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:offline.attr="disabled">Save</button>
                </div>
            </form>
        </x-panel-app.modal-box>
    @endif
</div>
