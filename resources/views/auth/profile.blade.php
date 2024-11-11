@extends('layouts.app')
@section('content')
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">
                        Profile {{$item->name}}
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
                            Profile
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <div class="app-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-header mt-3 text-center fw-bold">
                            Profile Information
                        </div>
                        <div class="card-body">
                            <!-- Alert Status -->
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <!-- Alert Validation Errors -->
                            @if ($errors->updateProfileInformation->any())
                            <div class="alert alert-danger alert-dismissible fade show mb-0 pb-0" role="alert">
                                <ul>
                                    @foreach ($errors->updateProfileInformation->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <form id="updateProfileForm" class="mt-3" action="{{ route('user-profile-information.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">
                                        {{ __('Name') }}
                                    </label>
                                    <div class="col-md-8">
                                        <input id="name"
                                            type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            name="name"
                                            value="{{ $item->name ?? old('name') }}"
                                            required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">
                                        {{ __('E-Mail Address') }}
                                    </label>
                                    <div class="col-md-8">
                                        <input id="email"
                                            type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            name="email"
                                            value="{{ $item->email ?? old('email') }}"
                                            required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4 mb-2 col-md-6 offset-md-4 d-grid gap-2">
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#passModal">
                                            {{ __('Update Profile') }}
                                        </button>

                                        <div class="modal fade" id="passModal" tabindex="-1" aria-label="passModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                @include('auth.confirm-password')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="{{ route('users.delete', $item->id) }}" id="delete-user" class="d-inline" method="POST">
                                <div class="form-group row mb-3">
                                    <div class="col-lg-4 mb-2 col-md-6 offset-md-4 d-grid gap-2">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            {{ __('Delete Profile') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="card-footer mb-3">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- <script>
    document.getElementById('delete-account').addEventListener('click', function() {
    if (confirm('Apakah Anda yakin ingin menghapus akun ini?')) {
        fetch('{{ route('users.delete') }}', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            }
        })
        .then(response => {
            if (response.ok) {
                alert('Akun berhasil dihapus.');
                window.location.href = '/'; // Redirect setelah penghapusan
            } else {
                return response.json().then(data => {
                    alert('Error: ' + data.error);
                });
            }
        })
        .catch(error => {
            alert('Terjadi kesalahan: ' + error.message);
        });
    }
    });
</script> --}}
@endsection
