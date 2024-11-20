@extends('layouts.auth')
@section('title', 'Login')
@section('content')

    <div class="card-header text-center">
        {{ __('Login') }}
    </div>

    <div class="card-body">

        @if (session('error'))
            <div class="alert alert-success" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-md-8">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row my-2">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember"
                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0 ">
                <div class="col-md-4 offset-md-4 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
            <div class="form-group row mb-0 pb-0 mt-2">
                <div class="col-md-8 offset-md-4">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link mb-0 pb-0" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
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
