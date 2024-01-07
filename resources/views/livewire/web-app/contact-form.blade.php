<form id="contactForm" wire:submit="send">
    <h3 class="sub-title">Contact Us</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-icon"><i class="bx bx-user"></i></div>
                <input type="text" wire:model="name" name="name" class="form-control" id="name" required data-error="Please enter your name" placeholder="Name" />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-icon"><i class="bx bx-at"></i></div>
                <input type="email" wire:model="email" name="email" class="form-control" id="email" required data-error="Please enter your email" placeholder="Email" />
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="input-icon"><i class="bx bx-comment-detail"></i></div>
                <input type="text" wire:model="subject" name="subject" class="form-control" id="subject" required data-error="Please enter subject" placeholder="Subject" />
                @error('subject')
                    <div class="help-block with-errors">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="input-icon textarea"><i class="bx bx-envelope"></i></div>
                <textarea wire:model="message" name="message" id="message" class="form-control" cols="100" rows="6" required data-error="Please enter your message" placeholder="Message..."></textarea>
                @error('message')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group check-group">
                <div class="form-check agree-label">
                    <input name="gridCheck" wire:model="agreement" value="I agree to the terms and privacy policy." class="form-check-input" type="checkbox" id="gridCheck" required>
                    <label class="form-check-label" for="gridCheck">
                        Accept <a href="terms-condition.html">Terms & Conditions</a> And <a href="privacy-policy.html">Privacy Policy.</a>
                    </label>
                    @error('agreement')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        @if (session('success'))
            <x-web-app.alert.success :message="session('success')" />
        @endif
        <div class="col-lg-12">
            <button type="submit" wire:offline.attr="disabled" wire:loading.attr="disabled" class="btn-primary">send message</button>
        </div>
    </div>
</form>
