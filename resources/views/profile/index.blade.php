@extends('layouts.master')
@section('title', 'Profile')

<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<x-app-layout>
    <div class="profile-container">
        <!-- Top Section: Title -->
        <div class="top-section">
            PROFILE
        </div>

        <!-- Search Section -->
        <div class="search-section">
            <input type="text" placeholder="🔍 Search">
        </div>

        <!-- Main Profile Section -->
        <div class="profile-main">
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="profile-info">
                    <div class="profile-image">
                        <img src="{{ asset('images/default-profile.png') }}" alt="Profile Picture">
                    </div>
                    <div class="profile-name">
                        <h2>Name</h2>
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

            <!-- Featured Art and About Section -->
            <div class="content-section">
                <!-- Featured Art Section -->
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

                <!-- About Section -->
                <div class="about-section">
                    <h3>About</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue nisi, molestie vel ex sed,
                        efficitur efficitur metus. Donec nulla libero, molestie a enim in, ullamcorper tincidunt odio.
                        Pellentesque iaculis, purus quis viverra eleifend, eros mi blandit nunc, vel dictum eros ex vel metus.
                        Praesent vel tincidunt lacus. Ut at purus pulvinar, posuere nisl ac, dapibus augue. Praesent cursus
                        lacus tellus, vitae consectetur sem laoreet et. Ut vestibulum purus a ex molestie, ut vehicula erat
                        euismod. Donec sem augue, hendrerit vel urna eget, gravida ultrices velit.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
