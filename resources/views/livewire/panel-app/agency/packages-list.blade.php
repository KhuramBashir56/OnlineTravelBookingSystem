<div class="row">
    @if (session('success'))
        <x-panel-app.alerts.success :message="session('success')" />
    @endif
    <div class="col-12">
        <div class="card m-0">
            <div class="card-body d-flex align-items-center justify-content-between">
                <button type="button" wire:click="newModalOpen" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-outline-info">Create New Package</button>
                <div class="col-8 col-sm-4">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control" placeholder="Start typing to search...">
                </div>
            </div>
            <hr class="m-0">
            @if ($packages->count() < 1)
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
                            @foreach ($packages as $data)
                                <tr>
                                    <td>
                                        @if ($data->place->thumbnail)
                                            <img src="{{ asset('storage/' . $data->place->thumbnail) }}" alt="{{ $data->title }}" title="{{ $data->title }}" width="50" height="35" />
                                        @else
                                            <img src="{{ asset('assets/panel/assets/images/users/d2.jpg') }}" alt="{{ $data->title }}" title="{{ $data->title }}" width="50" height="35" />
                                        @endif
                                    </td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->place->city->name }}</td>
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
                {{ $packages->links('components.panel-app.pagination-links') }}
            @endif
        </div>
    </div>
    @if ($addNewAgencyModel)
        <x-panel-app.modal-box>
            <div class="modal-header">
                <h5 class="modal-title">Ad New Tour Package</h5>
                <button type="button" wire:click="newPlaceModalClose" wire:confirm="Are you sure you want to destroy the form data?" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn-close" title="Close"></button>
            </div>
            <form wire:submit="save" action="" method="POST">
                @csrf
                <div class="modal-body">
                    <x-panel-app.input-select wire:model="place_id" :for="__('place_id')" :title="__('Tour Destination / Place')" :error="$errors->first('place_id')" required>
                        @foreach ($places as $data)
                            <option value="{{ $data->id }}">{{ $data->title . ' (' . $data->city->name . ')' }}</option>
                        @endforeach
                    </x-panel-app.input-select>
                    <x-panel-app.input type="text" wire:model="title" :for="__('title')" :title="__('Package Title')" required :error="$errors->first('title')" required placeholder="Package Title" />
                    <x-panel-app.input type="number" wire:model="price" :for="__('price')" :title="__('Package Price PKR')" required :error="$errors->first('price')" required placeholder="Package Price PKR" min="0" max="9999999" />
                    <div class="row">
                        <div class="col-6">
                            <x-panel-app.input type="date" wire:model="start_date" :for="__('start_date')" :title="__('Package Start Date')" required :error="$errors->first('start_date')" required min="{{ now()->format('Y-m-d') }}" />
                        </div>
                        <div class="col-6">
                            <x-panel-app.input type="date" wire:model="end_date" :for="__('end_date')" :title="__('Package End Date')" required :error="$errors->first('end_date')" required min="{{ now()->format('Y-m-d') }}" />
                        </div>
                    </div>
                    <x-panel-app.textarea wire:model="description" :for="__('description')" :title="__('Description')" :error="$errors->first('description')" rows='10' required maxlength="1500" placeholder="Write a description of up to 1500 characters." />
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="newPlaceModalClose" wire:confirm="Are you sure you want to destroy the form data?" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-danger">Cancel</button>
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:offline.attr="disabled">Save</button>
                </div>
            </form>
        </x-panel-app.modal-box>
    @endif
</div>
