<div class="modal-content">
    <div class="modal-header text-center">
        {{-- Confirm Your Password --}}
        <h5 class="modal-title text-center" id="passModalLabel">
            Confirm your password
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="form-group row mb-3">
            <label for="current_password" class="col-md-4 col-form-label text-md-right">
                {{ __('Current Password') }}
            </label>
            <div class="col-md-8">
                <input id="current_password"
                    type="password"
                    class="form-control @error('current_password') is-invalid @enderror"
                    name="current_password"
                    required>
                    @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            {{ __('Close') }}
        </button>
        <button type="button" class="btn btn-primary" onclick="submitForm()">
            {{ __('Verify & Update Profile') }}
        </button>
    </div>
</div>
<script>
    function submitForm() {
        document.getElementById('updateProfileForm').submit();
    }
</script>
