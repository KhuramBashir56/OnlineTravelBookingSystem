<div class="row">
    <div class="col-12">
        <div class="card m-0">
            <div class="card-body d-flex align-items-center justify-content-between">
                <button type="button" wire:click="addNew" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-outline-info">Add New Agency</button>
                <div class="col-8 col-sm-4">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control" placeholder="Start typing to search...">
                </div>
            </div>
            <hr class="m-0">
            @if ($agencies->count() < 1)
                <h1 class="p-3">Record not found...</h1>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Logo</th>
                                <th scope="col">Title</th>
                                <th scope="col">Registration Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agencies as $data)
                                <tr wire:key="{{ $data->id }}">
                                    <td>
                                        @if (!$data->logo)
                                            <img src="{{ asset('assets/panel/assets/images/logo-icon.png') }}" alt="{{ $data->name }}" title="{{ $data->name }}" class="rounded-circle" width="35" height="35" />
                                        @else
                                            <img src="{{ asset('storage/' . $data->logo) }}" alt="{{ $data->name }}" title="{{ $data->name }}" class="rounded-circle" width="35" height="35" />
                                        @endif
                                    </td>
                                    <td>{{ $data->title }}</td>
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
            @endif
            {{ $agencies->links('components.panel-app.pagination-links') }}
        </div>
    </div>

    @if ($informationModal)
        <x-panel-app.modal-box>
            <div class="modal-header">
                <h5 class="modal-title">Agency Information</h5>
                <button type="button" wire:click="informationModalClose" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn-close" title="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    @if ($agency->logo)
                        <img class="mb-2" src="{{ asset('storage/' . $agency->logo) }}" width="50%" style="aspect-ratio:1;" alt="image description">
                    @else
                        <img class="mb-2" src="{{ asset('assets/panel/assets/images/logo-icon.png') }}" width="50%" style="aspect-ratio:1;" alt="image description">
                    @endif
                </div>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" colspan="2">Agency Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Title / Name</td>
                            <td>{{ $agency->title }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                @if ($data->status === 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Blocked</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Registration Date</td>
                            <td>
                                <time title="{{ $data->created_at->format('d-m-Y') }}" datetime="{{ $data->created_at->format('d-m-Y') }}">{{ $data->created_at->format('F d, Y') }}</time>
                            </td>
                        </tr>
                        <tr>
                            <td>Representative Name</td>
                            <td>{{ $agency->name }}</td>
                        </tr>
                        <tr>
                            <td>Contact#</td>
                            <td>{{ $agency->contact }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $agency->email }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $agency->address }}</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" colspan="2">Owner Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $agency->agencyOwner->name }}</td>
                        </tr>
                        <tr>
                            <td>Mobile#</td>
                            <td>{{ $agency->agencyOwner->mobile }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $agency->agencyOwner->email }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </x-panel-app.modal-box>
    @endif
</div>
