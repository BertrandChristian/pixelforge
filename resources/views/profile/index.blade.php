@extends('layouts.master')
@section('title', 'Profile')

<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="top-section">
    PROFILE
</div>

<div class="search-section">
    <input type="text" placeholder="🔍 Search">
</div>
<x-app-layout>
    <div class="profile-container">
        <div class="profile-main">
            <div class="profile-header">
                <div class="profile-info">
                    <img src="{{ asset('storage/profile_images/' . $user->profile_image) }}" alt="Profile Image" class="profile-image">
                    <div class="profile-name">
                        <h2>{{ $user->name }}</h2>
                    </div>
                </div>
                <div class="profile-buttons">
                    <a href="/upload" class="button-link">
                        <button class="upload-button">UPLOAD</button>
                    </a>
                    <a href="{{route('profile.edit')}}" class="button-link">
                        <button class="edit-button">EDIT</button>
                    </a>
                </div>
            </div>

            <div class="content-section">
                <div class="featured-art">
                    <h3>Featured Art</h3>
                    <div class="art-gallery">
                        <img src="{{ asset('images/art1.png') }}" alt="Art 1">
                        <img src="{{ asset('images/art2.png') }}" alt="Art 2">
                        <img src="{{ asset('images/art3.png') }}" alt="Art 3">
                        <img src="{{ asset('images/art4.png') }}" alt="Art 4">
                        <img src="{{ asset('images/art5.png') }}" alt="Art 5">
                        <img src="{{ asset('images/art6.png') }}" alt="Art 6">
                    </div>
                </div>

                <div class="about-section">
                    <h3>About</h3>
                    <p>{{ $user->about }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
