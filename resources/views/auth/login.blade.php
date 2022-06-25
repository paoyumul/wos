@extends('layouts.web')

@section('content')
    <div class="container flex justify-center py-8">
        <div class="max-w-[480px] w-full">
            <h1 class="text-center text-3xl font-bold">Login to your account</h1>
            <form
                action="{{ route('login') }}"
                method="POST"
                class="bg-white p-7 rounded border-gray-100 shadow-sm"
            >
                @csrf

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
                        autofocus
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
                        autocomplete="current-password"
                    >

                    @error('password')
                        <span class="text-red-500 text-xs" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            id="remember"
                            name="remember-me"
                            type="checkbox"
                            class="h-2 w-2 mr-1 border-gray-300 rounded"
                            {{ old('remember') ? 'checked' : '' }}
                        />

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="text-base text-sm" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary w-full">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>
@endsection
