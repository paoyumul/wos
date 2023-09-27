@extends('layouts.web')

@section('content')
    <div class="container flex justify-center py-8">
        <div class="max-w-[480px] border-gray-100 w-full">
            <h1 class="text-center text-3xl font-bold">{{ __('Register') }}</h1>
            <form
                class="bg-white rounded p-7 border-gray-100 shadow-sm"
                method="POST" action="{{ route('register') }}"
            >
                @csrf

                <div class="row mb-3">
                    <label for="first_name">{{ __('First Name') }}</label>

                    <input
                        id="first_name"
                        type="text"
                        class="form-control @error('first_name') is-invalid @enderror"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        required
                        autocomplete="first_name"
                        autofocus
                    >

                    @error('first_name')
                        <span class="text-red-500 text-xs" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="first_name">{{ __('Last Name') }}</label>

                    <input
                        id="last_name"
                        type="text"
                        class="form-control @error('last_name') is-invalid @enderror"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        required
                        autocomplete="last_name"
                        autofocus
                    >

                    @error('last_name')
                        <span class="text-red-500 text-xs" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="email">{{ __('Email Address') }}</label>

                    <input
                        id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                    >

                    @error('email')
                        <span class="text-red-500 text-xs" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
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

                <div class="row mb-3">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>

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
                    {{ __('Register') }}
                </button>
            </form>
        </div>
    </div>
@endsection
