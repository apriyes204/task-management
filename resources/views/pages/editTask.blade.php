<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="eeditTaskModalLabel">
                Edit Task {{$item->title}}
            </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>

        <form id="editForm" method="POST" enctype="multipart/form-data" action="{{route('tasks.update', $item->id)}}">
            @csrf
            @method('PUT')
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Name Task --}}
                            <div class="mb-3">
                                <label for="taskName" class="form-label">Task Name</label>
                                <input type="text" value="{{$item->title}}" class="form-control" name="title" id="taskName_{{$item->id}}"
                                    placeholder="Nama Tugas" required>
                            </div>

                            {{-- Image Task --}}
                            <div class="mb-3">
                                <label for="taskImage" class="form-label">Task Image</label>
                                <input type="file" class="form-control" name="image" id="taskImage_{{$item->id}}"
                                       accept="image/jpg,image/png,image/jpeg" onchange="viewImage(this)">

                            </div>
                            <div class="mb-3">
                                <input type="hidden" id="removeImageInput" name="remove_image" value="false">
                            </div>

                            {{-- Description Task --}}
                            <div class="mb-3">
                                <label for="taskDescription" class="form-label">Task Description</label>
                                <textarea class="form-control" name="description" id="taskDescription_{{$item->id}}"
                                    rows="3" required>{{$item->description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-6">

                            {{-- Preview Image --}}
                            <div class="mb-3">
                                {{-- <label class="form-label">Preview Gambar</label> --}}
                                <p class="h4">Preview Gambar</p>
                                <div class="text-center preview-container">
                                    <div id="wrapImage" class="position-relative {{ $item->image_path ? '' : 'd-none' }}">
                                        <img id="imageView"
                                             src="{{ $item->image_path ? asset('storage/' . $item->image_path) : asset('/api/placeholder/400/300') }}"
                                             class="img-fluid rounded" alt="Preview">
                                        <button type="button" class="btn btn-danger position-absolute top-0 end-0 m-2"
                                                onclick="removeImage()">
                                            Hapus
                                        </button>
                                    </div>
                                    <p id="noImageText" class="text-muted {{$item->image_path ? 'd-none' : ''}}">Belum ada gambar dipilih</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

        </form>

    </div>
</div>

@push('script')
    <script>
        $(document).ready(function () {
            $('#editForm').on('submit', function (e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.success) {
                            window.location.href = '{{ route('tasks.dashboard') }}';
                        } else {
                            alert('Failed to create task!');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('An error ocurred. Please try again!');
                    }
                });
            });
        });
    </script>
@endpush

<script>
    function viewImage(input) {
        const wrapImage = document.getElementById('wrapImage');
        const noImageText = document.getElementById('noImageText');
        const imageView = document.getElementById('imageView');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imageView.src = e.target.result;
                wrapImage.classList.remove('d-none');
                noImageText.classList.add('d-none');
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            removeImage();
        }
    }

    function removeImage() {
        const taskImage = document.getElementById('taskImage');
        const wrapImage = document.getElementById('wrapImage');
        const noImageText = document.getElementById('noImageText');
        const imageView = document.getElementById('imageView');
        const removeImageInput = document.getElementById('removeImageInput');

        // Reset file input
        taskImage.value = '';
        // Menandai gambar harus dihapus saat submit form
        removeImageInput.value = 'true'; // Perbaikan di sini
        // Hide preview
        wrapImage.classList.add('d-none');
        imageView.src = "{{ asset('/api/placeholder/400/300') }}";
        // Show no image text
        noImageText.classList.remove('d-none');
    }
</script>
