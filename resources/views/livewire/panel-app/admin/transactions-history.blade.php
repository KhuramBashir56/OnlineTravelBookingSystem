<div class="row">
    <div class="col-12">
        <div class="m-0 card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <button type="button" wire:click="showAll" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-outline-info">Show All</button>
                <div class="col-8 col-sm-4">
                    <input type="date" wire:model.live.debounce.1000ms="search" class="form-control" placeholder="Start typing to search...">
                </div>
            </div>
            <hr class="m-0">
            @if ($transactions->count() < 1)
                <h1 class="p-3">Record not found...</h1>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Sr.#</th>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->transaction_id }}</td>
                                    <td>{{ Str::ucfirst($data->type) }}</td>
                                    <td><span class="badge bg-danger">{{ $data->debit > 0 ? '-' . $data->debit : '' }}</span><span class="badge bg-success">{{ $data->credit > 0 ? '+' . $data->credit : '' }}</span></td>
                                    <td>
                                        <time title="{{ $data->created_at->format('d-m-Y') }}" datetime="{{ $data->created_at->format('d-m-Y h:i:s A') }}">{{ $data->created_at->format('F d, Y h:i:s A') }}</time>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $transactions->links('components.panel-app.pagination-links') }}
            @endif
        </div>
    </div>
</div>
