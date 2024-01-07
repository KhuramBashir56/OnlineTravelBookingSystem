<div class="row">
    @if (session('success'))
        <x-panel-app.alerts.success :message="session('success')" />
    @endif
    <div class="col-12">
        <div class="card m-0">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div></div>
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
                                <th scope="col">Agency Name</th>
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
                                    <td>{{ $data->agency->title }}</td>
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
</div>
