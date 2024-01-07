<div class="row">
    <div class="col-12">
        <div class="card m-0">
            <div class="card-body d-flex align-items-center justify-content-between">
                <button type="button" wire:click="newModalOpen" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-outline-info">Add New Agency</button>
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
                                <th scope="col">Account Title</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile#</th>
                                <th scope="col">Account Type</th>
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
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->mobile }}</td>
                                    <td>{{ Str::upper($data->account_type . ' account') }}</td>
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
</div>
