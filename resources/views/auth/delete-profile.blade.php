<div class="modal-content">
    <div class="modal-header text-center">
        {{-- Confirm Your Password --}}
        <h5 class="modal-title text-center" id="passModalLabel">
            Confirm Account Deletion
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body text-center">
        <p>Are you sure you want to delete your account?</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            {{ __('Close') }}
        </button>
        <form action="{{ route('users.delete-account', $item->id )}}" method="POST" id="delUserForm">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                {{ __('Delete Account') }}
            </button>
        </form>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#delUserForm').on('submit', function(e) {
                e.preventDefault();  // Mencegah form dikirimkan secara default

                let formData = new FormData(this);  // Form data untuk dikirim

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),  // Ambil URL action dari form
                    data: formData,  // Kirim data form
                    processData: false,  // Jangan proses data
                    contentType: false,  // Jangan set contentType secara otomatis
                    headers: {
                        'X-CSRF-Token' : "{{ csrf_token() }}"  // CSRF token
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.href = "{{ route('tasks.dashboard') }}";  // Redirect setelah sukses
                        } else {
                            alert('Error: ' + response.message);  // Tampilkan pesan error
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('An error occurred. Please try again!');  // Tampilkan error jika gagal
                    }
                });
            });
        });
    </script>
@endpush

