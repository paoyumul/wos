@extends('layouts.web')

@section('content')
    <div class="container flex justify-center py-8">
        <div class="max-w-[480px] w-full">
            <h1 class="text-center text-3xl font-bold">{{ __('Reset Password') }}</h1>
            <form
                class="bg-white p-7 rounded border-gray-100 shadow-sm"
                action="{{ route('password.update') }}"
                method="POST"
            >
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email">{{ __('Email Address') }}</label>

                    <input
                        id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ $email ?? old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                    >

                    @error('email')
                        <span class="text-red-500 text-xs" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password">{{ __('Password') }}</label>

                    <input
                        id="password"
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        required
                        autocomplete="new-password"
                    >

                    @error('password')
                        <span class="text-red-500 text-xs" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password-confirm">
                        {{ __('Confirm Password') }}
                    </label>
                    <input
                        id="password-confirm"
                        type="password"
                        class="form-control"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    >
                </div>

                <button type="submit" class="btn btn-primary w-full">
                    {{ __('Reset Password') }}
                </button>
            </form>
        </div>
    </div>
@endsection
