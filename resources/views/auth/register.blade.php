@extends('layouts.auth')
@section('title', 'Register')
@section('content')

    <div class="card-header text-center">
        {{ __('Register') }}
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


        <form method="POST" action="{{ route('register') }}" class="mb-0 pb-0">
            @csrf


            <div class="form-group row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                <div class="col-md-8">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-md-8">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                <div class="col-md-8">
                    <input id="password-confirm" type="password" class="form-control"
                        name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
            <div class="form-group row mb-0 mt-2">
                <div class="col-md-8 offset-md-4">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link mb-0 pb-0" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a><a href="{{ route('register') }}" class="btn btn-link">
                    </a>
                    @endif
                </div>
                <div class="col-md-8 offset-md-4">
                    <a href="{{ route('login') }}" class="btn btn-link mb-0 pb-0">
                        <p class="pb-0 mb-0">
                            {{ __('I already have a membership') }}
                        </p>
                    </a>
                </div>
            </div>
        </form>
    </div>

@endsection

