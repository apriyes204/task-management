@extends('layouts.auth')
@section('title', 'Verify Your Email Address')
@section('content')
    <div class="card-header">
        {{ __('Verify Your Email Address') }}

    </div>

    <div class="card-body">
        @if (session('error'))
            <div class="alert alert-warning" role="alert">
                {{ session('erro') }}
            </div>
        @endif
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <form method="POST" action="{{ route('verification.send') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                {{ __('click here to request another') }}
            </button>.
        </form>
    </div>
@endsection
