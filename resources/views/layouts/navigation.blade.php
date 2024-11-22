<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<nav x-data="{ open: false }" class="nav">

    <!-- Primary Navigation Menu -->
    <div class="w-full px-0">
        <div class="flex justify-between h-16 tengah">
            <div class="flex justify-start nav-container">
                <!-- Logo -->
                <div class="logo-section sm:items-center">
                    <h1><span class="pixel">PIXEL</span><span class="forge">FORGE</span></h1>
                </div>

                <!-- Navigation Links -->
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 logo-section">
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-home">
                        {{ __('HOME') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')" class="nav-about">
                        {{ __('ABOUT') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('gallery')" :active="request()->routeIs('gallery')" class="nav-gallery">
                        {{ __('GALLERY') }}
                    </x-nav-link>
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="settings">
                            <div>SETTINGS</div>

                            <div class="ms-1">
                                <svg class="fill-black h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.index')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
