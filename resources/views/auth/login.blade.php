<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="top-section">
    <h5>Log In</h5>
</div>

<!-- Logo Section (PixelForge Logo) -->
<div class="logo-section">
    <h1><span class="pixel">PIXEL</span><span class="forge">FORGE</span></h1>
</div>

<div class="login-container">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Background Image and Form Section -->
    <div class="login-content">
        <div class="login-image">
            <img src="{{ asset('image/loginimage2.jpg') }}" alt="Your Image Description">
        </div>

        <div class="login-form">
            <h2 class="sign-in-title">{{ __('SIGN IN') }}</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="input-group">
                    <x-input-label class="email-title" for="email" :value="__('Email')" />
                    <br>
                    <br>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="input-group mt-4">
                    <x-input-label class="password-title" for="password" :value="__('Password')" />
                    <br>
                    <br>
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Action Buttons (Sign up, Guest, and Login) -->
                <div class="actions mt-4">
                    <a class="btn-signup" href="{{ route('register') }}">
                        {{ __('Sign up') }}
                    </a>
                    <a class="btn-guest" href="{{ route('dashboard') }}">
                        {{ __('Continue as Guest') }}
                    </a>
                </div>
                <br>
                <div class="actions mt-4">
                    <button class="btn-login">{{ __('Log in') }}</button>
                </div>

                <!-- Forgot Password -->
                <div class="mt-4">
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

