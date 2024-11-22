@extends('layouts.app')
@section('content')
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">
                    Dashboard
                </h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="{{route('tasks.dashboard')}}">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Dashboard
                    </li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            @include('includes.small-box')
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row">
            <!-- Start col -->
            <div class="col-12" id="tableTask">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Task Lists</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addTaskModal">
                                Add Task
                            </button>
                            {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button> --}}
                            <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
                                @include('pages.newTask')
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="table-responsive">

                            <table class="table table-striped align-middle" style="width: 100%">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" class="text-start">#</th>
                                        <th scope="col" class="text-start">Name Task</th>
                                        <th scope="col" class="text-start">Description</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                    <tr>
                                        <th scope="row" style="width:3%">
                                            {{ $items->currentPage() * $items->perPage() - $items->perPage() + $loop->iteration }}
                                        </th>
                                        <td>
                                            {{$item->title}}
                                        </td>
                                        <td style="width: 40%">
                                            {{ Str::limit($item->description, 100) }}
                                        </td>
                                        <td class="text-center" style="width: 10%">
                                            <div
                                                class="form-check form-switch d-flex justify-content-start align-items-center">

                                                <form action="{{ route('tasks.updateStatus', $item->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" id="statusCheckbox_{{ $item->id }}"
                                                            name="status" class="form-check-input" role="switch"
                                                            value="completed" onchange="this.form.submit()"
                                                            {{ $item->status === 'completed' ? 'checked' : '' }}>
                                                    </div>
                                                </form>

                                                <label for="statusCheckbox_{{ $item->id }}" class="form-check-label">
                                                    <span
                                                        class="badge rounded-pill {{$item->status === 'pending' ? 'text-bg-secondary' : 'text-bg-success'}}">
                                                        {{ ucfirst($item->status) }}
                                                    </span>
                                                </label>
                                                {{-- <button class="toggle-status" data-id="{{$item->id}}">
                                                {{$item->status === 'pending' ? 'completed' : 'pending'}}
                                                </button> --}}
                                            </div>
                                        </td>
                                        <td class="text-center" style="width: 12%">
                                            {{$item->created_at}}
                                        </td>
                                        <td style="width: 10%">
                                            {{$item->users ? $item->users->name : "No user Assigned"}}
                                        </td>
                                        <td class="text-center justify-content-between" style="width: 10%">
                                            <button onclick="openEditModal('{{ $item->id }}', '{{ $item->name }}')"
                                                class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editTaskModal_{{ $item->id }}" role="button"
                                                aria-label="Edit Task {{$item->name}}"
                                                title="Edit Task {{$item->name}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <div class="modal fade" id="editTaskModal_{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="editTaskModalLabel" aria-hidden="true">
                                                @include('pages.editTask', ['item' => $item])
                                                <!-- Pastikan Anda mengirim data item ke modal -->
                                            </div>

                                            <form action="{{ route('tasks.destroy', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this task?')"
                                                    aria-label="Delete Task">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-bg-danger">
                                            <p>No tasks available.</p>
                                        </td>
                                    </tr>

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item {{ $items->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $items->previousPageUrl() }}"
                                        tabindex="-1">Previous</a>
                                </li>
                                @for ($i = 1; $i <= $items->lastPage(); $i++)
                                    <li class="page-item {{ $items->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $items->url($i) }}">{{ $i }}</a>
                                    </li>
                                    @endfor
                                    <li class="page-item {{ $items->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $items->nextPageUrl() }}">Next</a>
                                    </li>
                            </ul>
                        </nav>
                    </div>

                    {{-- <div class="card-footer d-flex justify-content-center">
                        <nav aria-label="Page navigation">
                            {{ $items->links() }}
                    </nav>
                </div> --}}
            </div> <!-- /.direct-chat -->
        </div> <!-- /.Start col -->
        <!-- Start col -->
    </div> <!-- /.row (main row) -->
</div>
<!--end::Container-->
</div>
<script>
    // Untuk modal dengan ID #addTaskModal
    $('#addTaskModal').on('shown.bs.modal', function () {
        $(this).attr('aria-hidden', 'false');
        $(this).find('input, button, select, textarea, a').attr('tabindex', '0'); // Menambahkan link
    }).on('hidden.bs.modal', function () {
        $(this).attr('aria-hidden', 'true');
        $(this).find('input, button, select, textarea, a').attr('tabindex', '-1'); // Menambahkan link
        // Pastikan tidak ada fokusable element ketika modal tersembunyi
        $(this).find('input, button, select, textarea, a').blur();
    });

    // Untuk modal secara umum
    $('.modal').on('shown.bs.modal', function () {
        $(this).attr('aria-hidden', 'false');
        $(this).find('input, button, select, textarea, a').attr('tabindex', '0'); // Menambahkan link
    }).on('hidden.bs.modal', function () {
        $(this).attr('aria-hidden', 'true');
        $(this).find('input, button, select, textarea, a').attr('tabindex', '-1'); // Menambahkan link
        // Pastikan tidak ada fokusable element ketika modal tersembunyi
        $(this).find('input, button, select, textarea, a').blur();
    });

</script>
@endsection
