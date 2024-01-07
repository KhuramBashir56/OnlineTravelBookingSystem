<div class="row">
    <div class="col-12">
        <div class="card m-0">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div></div>
                <div class="col-8 col-sm-4">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control" placeholder="Start typing to search...">
                </div>
            </div>
            <hr class="m-0">
            @if ($messages->count() < 1)
                <h1 class="p-3">Record not found...</h1>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Status</th>
                                <th scope="col">Registration Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $index => $data)
                                <tr wire:key="{{ $data->id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->subject }}</td>
                                    <td>
                                        @if ($data->read === 'yes')
                                            <span class="badge bg-success">Read</span>
                                        @else
                                            <span class="badge bg-danger">Un Read</span>
                                        @endif
                                    </td>
                                    <td>
                                        <time title="{{ $data->created_at->format('d-m-Y') }}" datetime="{{ $data->created_at->format('d-m-Y') }}">{{ $data->created_at->format('F d, Y') }}</time>
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
                {{ $messages->links('components.panel-app.pagination-links') }}
            @endif
        </div>
    </div>
    @if ($openMessage)
        <x-panel-app.modal-box>
            <div class="modal-header">
                <h5 class="modal-title">User Message</h5>
                <button type="button" wire:click="closeMessage" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn-close" title="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>User Name</td>
                            <td>{{ $message->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $message->email }}</td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td>{{ $message->subject }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ $message->message }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="delete({{ $message->id }})" wire:loading.attr="disabled" wire:offline.attr="disabled" wire:confirm="Are you sure you want to delete the message?" class="btn btn-danger">Delete</button>
                <button type="button" wire:click="closeMessage" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-warning">Close</button>
            </div>
        </x-panel-app.modal-box>
    @endif
</div>
