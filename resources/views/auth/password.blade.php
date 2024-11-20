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
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header mt-3 text-center fw-bold">
                            Change your password
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
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show mb-0 pb-0" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <form class="mt-3" action="{{ route('users.update', $item->id) }}" method="POST">
                                @csrf
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
                                <div class="form-group row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">
                                        {{ __('New Password') }}
                                    </label>
                                    <div class="col-md-8">
                                        <input id="password"
                                            type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password"
                                            required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">
                                        {{ __('Confirm Password') }}
                                    </label>
                                    <div class="col-md-8">
                                        <input id="password_confirmation"
                                            type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation"
                                            required>
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-12 col-lg-6 offset-lg-4 d-grid gap-2 mb-0 pb-0">
                                        <button class="btn btn-primary" type="submit">
                                            {{ __('Reset password') }}
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
@endsection
