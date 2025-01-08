@extends('layouts.master')
@section('title', 'Profile')

<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="top-section">
    PROFILE
</div>
<br>
<x-app-layout>
    <div class="profile-container">
        <div class="profile-main">
            <div class="profile-header">
                <div class="profile-info">
                    <form id="profile-image-form" action="{{ route('profile.update_image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="file" id="profile-image-input" name="profile_image" accept="image/*" style="display: none;" onchange="submitProfileImageForm()">
                        <img
                            src="{{ asset('storage/profile_images/' . $user->profile_image) }}"
                            alt="Profile Image"
                            class="profile-image"
                            onclick="document.getElementById('profile-image-input').click()"
                        >
                    </form>
                    <div class="profile-name">
                        <h2>{{ $user->name }}</h2>
                    </div>
                </div>
                <div class="profile-buttons">
                    <a href="{{ route('art.index') }}" class="button-link">
                        <button class="upload-button">UPLOAD</button>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="button-link">
                        <button class="edit-button">EDIT</button>
                    </a>
                </div>
            </div>

            <div class="content-section">
                <div class="art-sections">
                    <div class="main-content">
                        <div class="featured-art">
                            <h3>Featured Art</h3>
                            <div class="art-gallery">
                                @foreach ($arts as $art)
                                    <div class="gallery-item">
                                        <a href="{{ route('art.show', $art->art_id) }}">
                                            <img src="{{ asset('storage/' . $art->art_picture) }}" alt="{{ $art->name }}">
                                        </a>
                                        <p>{{ $art->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="liked-art">
                            <h3>Loved Art</h3>
                            <div class="art-gallery">
                                @foreach ($likedArts as $art)
                                    <div class="gallery-item">
                                        <a href="{{ route('art.show', $art->art_id) }}">
                                            <img src="{{ asset('storage/' . $art->art_picture) }}" alt="{{ $art->name }}">
                                        </a>
                                        <p>{{ $art->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- About section on the right -->
                    <div class="about-section">
                        <h3>About</h3>
                        <p>{{ $user->about }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function submitProfileImageForm() {
        document.getElementById('profile-image-form').submit();
    }
</script>
