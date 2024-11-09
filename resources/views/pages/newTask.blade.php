<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">
                Add Task
            </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>

        <form id="taskForm" method="POST" enctype="multipart/form-data" action="{{route('tasks.store')}}">
            @csrf
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Name Task --}}
                            <div class="mb-3">
                                <label for="taskName" class="form-label">Task Name</label>
                                <input type="text" class="form-control" name="title" id="taskName"
                                    placeholder="Nama Tugas" required>
                            </div>

                            {{-- Image Task --}}
                            <div class="mb-3">
                                <label for="taskImg" class="form-label">Task Image</label>
                                <input type="file" class="form-control" name="image" id="taskImg"
                                    accept="image/jpg,image/png,image/jpeg" onchange="viewImg(this)">
                            </div>

                            {{-- Description Task --}}
                            <div class="mb-3">
                                <label for="taskDescription" class="form-label">Task Description</label>
                                <textarea class="form-control" name="description" id="taskDescription"
                                    rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">

                            {{-- Preview Image --}}
                            <div class="mb-3">
                                <label class="form-label">Preview Gambar</label>
                                <div class="text-center preview-container">
                                    <div id="wrapImg" class="position-relative d-none">
                                        <img id="imgView" src="/api/placeholder/400/300" class="img-fluid rounded"
                                            alt="Preview">
                                        <button type="button" class="btn btn-danger position-absolute top-0 end-0 m-2"
                                            onclick="rmImg()">
                                            Hapus
                                        </button>
                                    </div>
                                    <p id="noImgNote" class="text-muted">Belum ada gambar dipilih</p>
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
        $('#taskForm').on('submit', function (e) {
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
    function viewImg(input) {
        const wrapImg = document.getElementById('wrapImg');
        const noImgNote = document.getElementById('noImgNote');
        const imgView = document.getElementById('imgView');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imgView.src = e.target.result;
                wrapImg.classList.remove('d-none');
                noImgNote.classList.add('d-none');
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            rmImg();
        }
    }

    function rmImg() {
        const imgInput = document.getElementById('taskImg');
        const wrapImg = document.getElementById('wrapImg');
        const noImgNote = document.getElementById('noImgNote');
        const imgView = document.getElementById('imgView');

        // Reset file input
        imgInput.value = '';
        // Hide preview
        wrapImg.classList.add('d-none');
        imgView.src = '/api/placeholder/400/300';
        // Show no image text
        noImgNote.classList.remove('d-none');
    }
</script>
