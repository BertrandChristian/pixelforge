<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="top-section">
    <h5>Sign Up</h5>
</div>
<br>
<div class="logo-section">
    <h1><span class="pixel">PIXEL</span><span class="forge">FORGE</span></h1>
</div>
<br>
<div class="signup-content">
    <div class="signup-image">
        <img src="{{ asset('image/loginimage2.jpg') }}" alt="Your Image Description">
    </div>

    <div class="signup-form">
        <h2 class="sign-in-title">{{ __('SIGN IN') }}</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="input-group">
                <x-input-label class="name" for="name" :value="__('Name')" />
                <br>
                <br>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label class="email-title-s" for="email" :value="__('Email')" />
                <br>
                <br>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <br>
                <x-input-label class="password-title-s" for="password" :value="__('Password')" />
                <br>
                <br>
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <br>
                <x-input-label class="confirm-password" for="password_confirmation" :value="__('Confirm Password')" />
                <br>
                <br>
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="btn-have underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <br>
                <div class="actions mt-4" href="{{ route('login') }}">
                    <button class="btn-register">{{ __('Register') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
