@extends('layouts.master')
@section('title', 'Art Detail')

<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<div class="top-section">
    ART
</div>
<br>

<div class="search-section">
    <input type="text" placeholder="🔍 Search">
</div>
<br>

<x-app-layout>
    <div class="detail-container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="art-image-section">
            <img src="{{ asset('storage/' . $art->art_picture) }}" alt="{{ $art->name }}" class="art-detail-image">
        </div>
        <div class="art-info-section">
            <div class="art-details">
                <div class="profile-section">
                    @if ($art->users->isNotEmpty() && $art->users->first()->profile_image)
                        <img src="{{ asset('storage/profile_images/' . $art->users->first()->profile_image) }}"
                             alt="{{ $art->users->first()->name }}" class="profile-icon">
                    @else
                        <p class="profile-placeholder">Profile Image</p>
                    @endif
                    <div class="profile-name">
                        <h2>{{ $art->users->isNotEmpty() ? $art->users->first()->name : 'Unknown User' }}</h2>
                    </div>
                </div>
                <h3>{{ $art->name }}</h3>
                <p>{{ $art->description }}</p>
                <p><strong>{{ $likeCount }}</strong> Likes</p>

                <div class="like-section">
                    @auth
                        <form action="{{ route('art.like', ['art' => $art->art_id]) }}" method="POST">
                            @csrf
                            <button type="submit">
                                @if ($userLikes > 0)
                                    ⭐
                                @else
                                    ☆
                                @endif
                            </button>
                        </form>
                    @endauth
                </div>
            </div>

            <div class="art-actions">
                @if (Auth::check() && Auth::id() === $art->user_id)
                    <a href="{{ route('art.edit', $art->art_id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('art.destroy', $art->art_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
