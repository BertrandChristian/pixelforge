@extends('layouts.master')
@section('title', 'Profile')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<div class="top-section">
    PROFILE
</div>
<br>
<div class="search-section">
    <input type="text" placeholder="🔍 Search">
</div>
<br>
<x-app-layout>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="profile-container">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-form">
            @csrf
            @method('PATCH')

            <!-- Profile Image Section -->
            <div class="profile-image-section">
                <label for="upload" class="profile-label">Profile's Icon</label>
                <input type="file" name="profile_image" id="profile_image" class="upload-input" accept="image/*">
            </div>

            <!-- Profile Form Section -->
            <div class="profile-form-section">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-input" value="{{ old('name', Auth::user()->name) }}">

                <label for="about" class="form-label">About</label>
                <textarea id="about" name="about" class="form-textarea">{{ old('about', Auth::user()->about) }}</textarea>

                <!-- Update Email Section -->
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" value="{{ old('email', Auth::user()->email) }}">

                <!-- Update Password Section -->
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="form-input">

                <label for="password" class="form-label">New Password</label>
                <input type="password" id="password" name="password" class="form-input">

                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input">

                <button type="submit" class="finish-button">Finish</button>
            </div>
        </form>

        <!-- Delete Account Section -->
        <form action="{{ route('profile.destroy') }}" method="POST" class="delete-account-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-account-button">Delete Account</button>
        </form>
    </div>
</x-app-layout>
