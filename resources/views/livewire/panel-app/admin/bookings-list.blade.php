<div class="row">
    @if (session('success'))
        <x-panel-app.alerts.success :message="session('success')" />
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
            @if ($bookings->count() < 1)
                <h1 class="p-3">Record not found...</h1>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Account Title</th>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Booking Date / Time</th>
                                <th scope="col">Status</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $index => $data)
                                <tr wire:key="{{ $data->id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->bank_name }}</td>
                                    <td>{{ $data->account_title }}</td>
                                    <td>{{ $data->transaction_id }}</td>
                                    <td>{{ $data->total_amount }}</td>
                                    <td>
                                        <time title="{{ $data->created_at->format('d-m-Y') }}" datetime="{{ $data->created_at->format('d-m-Y') }}">{{ $data->created_at->format('F d, Y h:i:s A') }}</time>
                                    </td>
                                    <td>
                                        @if ($data->status === 'verified')
                                            <span class="badge bg-success">Verified</span>
                                        @else
                                            <span class="badge bg-danger">Un Verified</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->released === 'yes')
                                            <span class="badge bg-success">Released</span>
                                        @else
                                            <span class="badge bg-danger">Not Released</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->status != 'verified')
                                            <button class="btn btn-info btn-sm" type="button" wire:click="verifyFormOpen({{ $data->id }})" wire:loading.attr="disabled" wire:offline.attr="disabled">
                                                Verify
                                            </button>
                                        @else
                                            @if ($data->released === 'no')
                                                <button class="text-white btn btn-success btn-sm" type="button" wire:click="releaseFormOpen({{ $data->id }})" wire:loading.attr="disabled" wire:offline.attr="disabled">
                                                    Release
                                                </button>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $bookings->links('components.panel-app.pagination-links') }}
            @endif
        </div>
    </div>

    @if ($bookingVerificationForm)
        <x-panel-app.modal-box>
            <div class="modal-header">
                <h5 class="modal-title">Verify Payment</h5>
                <button type="button" wire:click="verifyFormClose" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn-close" title="Close"></button>
            </div>
            <div class="modal-body">
                <x-panel-app.input type="number" wire:model="transaction_id" :for="__('transaction_id')" :title="__('Transaction Id With Received Payment')" required placeholder="Transaction Id With Received Payment" :error="$errors->first('transaction_id')" />
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="verifyBooking({{ $booking_id }})" wire:loading.attr="disabled" wire:offline.attr="disabled" wire:confirm="Are you sure you have received payment" class="text-white btn btn-success">Verify</button>
                <button type="button" wire:click="verifyFormClose" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-warning">Close</button>
            </div>
        </x-panel-app.modal-box>
    @endif

    @if ($bookingReleaseForm)
        <x-panel-app.modal-box>
            <div class="modal-header">
                <h5 class="modal-title">Release Payment</h5>
                <button type="button" wire:click="releaseFormClose" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn-close" title="Close"></button>
            </div>
            <div class="modal-body">
                <x-panel-app.input type="number" wire:model="transaction_id" :for="__('transaction_id')" :title="__('Transaction Id With Send Payment')" required placeholder="Transaction Id With Send Payment" :error="$errors->first('transaction_id')" />
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="releaseBooking({{ $booking_id }})" wire:loading.attr="disabled" wire:offline.attr="disabled" wire:confirm="Are you sure you have sent payment" class="text-white btn btn-success">Verify</button>
                <button type="button" wire:click="releaseFormClose" wire:loading.attr="disabled" wire:offline.attr="disabled" class="btn btn-warning">Close</button>
            </div>
        </x-panel-app.modal-box>
    @endif
</div>
