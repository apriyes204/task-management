@extends('layouts.auth')
@section('title', 'Reset Password')
@section('content')


    <div class="card-header text-center">
        {{ __('Forgot Password') }}
    </div>

    <div class="card-body">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-success" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-right">
                    {{ __('E-Mail Address') }}
                </label>
                <div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
                <div class="col-md-6 offset-md-4">
                    <a href="{{ route('register') }}" class="btn btn-link mb-0 pb-0">
                        <p class="pb-0 mb-0">
                            {{ __('Register a new membership') }}
                        </p>
                    </a>
                </div>
            </div>
        </form>

    </div>

@endsection
