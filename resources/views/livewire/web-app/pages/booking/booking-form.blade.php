<form wire:submit="booking">
    <div class="content">
        <h3>Booking Form</h3>
        <div class="row">
            <div class="col-md-6">
                <label for="persons">Add Persons</label>
                <div class="form-group" style="padding-left: 0">
                    <button wire:click="decrement" type="button" class="btn-primary"><i class="bx bx-minus"></i></button>
                    <input wire:model="persons" type="number" name="text" class="form-control" readonly width="200" max="20" min="1" required style="text-align: center" />
                    <button wire:click="increment" type="button" class="btn-primary"><i class="bx bx-plus"></i></button>
                </div>
                @error('persons')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="total_amount">Total Amount</label>
                <div class="form-group" style="padding-left: 0">
                    <input wire:model="total_amount" type="number" name="total_amount" id="total_amount" class="form-control" readonly required style="text-align: center" />
                </div>
                @error('total_amount')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <h3>Company Bank Information</h3>
        <div class="row">
            <p><strong>Account Title : </strong> Admin Account</p>
            <p><strong>Bank Name : </strong> Example Bank</p>
            <p><strong>Account # : </strong> 1234567999</p>
            <p><strong>IBAN # : </strong> AB11ABCD12345678996321</p>
        </div>
        <h3>Transaction Information</h3>
        <p class="text-danger">Please transfer the total PKR={{ $total_amount }}/- using the above admin account credentials and then fill out the form.</p>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" wire:model="bank_name" name="bank_name" id="bank_name" class="form-control" required placeholder="Bank Name" />
                </div>
                @error('bank_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" wire:model="account_title" name="account_title" id="account_title" class="form-control" required placeholder="Account Title" />
                </div>
                @error('account_title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="number" wire:model="transaction_id" name="transaction_id" id="transaction_id" class="form-control" required placeholder="Transaction ID" />
                </div>
                @error('transaction_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" wire:model="claim_amount" name="claim_amount" id="claim_amount" class="form-control" required placeholder="Transfer / Claim Amount" />
                </div>
                @error('claim_amount')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn-primary">Confirm Booking</button>
</form>
