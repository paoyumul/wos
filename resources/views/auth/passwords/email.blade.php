@extends('layouts.web')

@section('content')
    <div class="container flex justify-center py-8">
        <div class="max-w-[480px] w-full">
            <h1 class="text-center text-3xl font-bold">{{ __('Reset Password') }}</h1>
            <form
                class="bg-white p-3 rounded border-gray-100 shadow-sm"
                method="POST" action="{{ route('password.email') }}"
            >
                @if (session('status'))
                    <div class="p-3 mb-3 bg-green-400 text-white text-center rounded" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @csrf

                <div class="mb-3">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input
                        id="email"
                        type="email"
                        class="@error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                    >
                    @error('email')
                        <span class="text-red-500 text-xs" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-full">
                    {{ __('Send Password Reset Link') }}
                </button>
            </form>
        </div>
    </div>
@endsection
