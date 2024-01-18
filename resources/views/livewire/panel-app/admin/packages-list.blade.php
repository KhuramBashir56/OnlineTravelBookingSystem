<div class="row">
    @if (session('success'))
        <x-panel-app.alerts.success :message="session('success')" />
    @endif
    @if (session('error'))
        <x-panel-app.alerts.error :message="session('error')" />
    @endif
    <div class="col-12">
        <div class="m-0 card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div></div>
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
                                <th scope="col">Duration</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
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
                                    <td>{{ $data->duration }}{{ $data->duration <= 1 ? ' Day' : ' Days' }}</td>
                                    <td>
                                        @if ($data->status === 'published')
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-danger">Un Published</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm" type="button" wire:click="information({{ $data->id }})" wire:loading.attr="disabled" wire:offline.attr="disabled" title="Information">
                                            <i class="mdi mdi-information" style="font-size: 16px;"></i>
                                        </button>
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

    @if ($packageInfo)
        <x-panel-app.modal-box>
            <div class="modal-header">
                <h5 class="modal-title">Package Details</h5>
                <button type="button" wire:click="closeInformation" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn-close" title="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    @if ($package->place->thumbnail)
                        <img class="mb-2" src="{{ asset('storage/' . $package->place->thumbnail) }}" width="100%" alt="{{ $package->title }}">
                    @else
                        <img class="mb-2" src="{{ asset('assets/panel/assets/images/logo-icon.png') }}" alt="{{ $package->title }}">
                    @endif
                </div>
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>Title / Name</td>
                            <td>{{ $package->title }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                @if ($package->start >= Carbon\Carbon::now()->startOfDay())
                                    <span class="badge bg-success">Active</span>
                                @elseif ($package->end < Carbon\Carbon::now()->endOfDay())
                                    <span class="badge bg-danger">Espied</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <td>{{ $package->start->format('F d, Y') }}</td>
                        </tr>
                        <tr>
                            <td>Emd Date</td>
                            <td>{{ $package->end->format('F d, Y') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ $package->description }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h4>Guides</h4>
                            </td>
                        </tr>
                        @foreach ($package->guide as $data)
                            <tr>
                                <td colspan="2">
                                    <img src="{{ asset('storage/' . $data->profile_image) }}" alt="{{ $data->name }}" title="{{ $data->name }}" class="rounded-circle" width="35" height="35" />
                                    <span>{{ $data->name }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                @if ($package->status === 'published')
                    <button type="button" wire:click="unpublished({{ $package->id }})" wire:loading.attr="disabled" wire:offline.attr="disabled" wire:confirm="Are you sure you want to un-publish the record?" class="btn btn-warning">Un Publish</button>
                @else
                    <button type="button" wire:click="published({{ $package->id }})" wire:loading.attr="disabled" wire:offline.attr="disabled" wire:confirm="Are you sure you want to publish the record?" class="btn btn-success">Publish</button>
                @endif
                <button type="button" wire:click="delete({{ $package->id }})" wire:loading.attr="disabled" wire:offline.attr="disabled" wire:confirm="Are you sure you want to delete the record?" class="btn btn-danger">Delete</button>
                <button type="button" wire:click="closeInformation" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-secondary">Close</button>
            </div>
        </x-panel-app.modal-box>
    @endif
</div>
