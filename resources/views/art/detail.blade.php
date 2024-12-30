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
                <p><strong>{{ $art->usersArt->where('like_status', true)->count() }}</strong> Likes</p>

                <div class="like-section">
                    @auth
                        <form action="{{ route('art.like', ['art' => $art->art_id]) }}" method="POST">
                            @csrf
                            <button type="submit">
                                @if ($art->usersArt->where('users_id', Auth::id())->where('like_status', true)->count())
                                    Unlike
                                @else
                                    Like
                                @endif
                            </button>
                        </form>
                    @endauth
                </div>
            </div>

            <div class="art-actions">
                @if ($art->users->contains('id', Auth::id()))
                <form action="{{ route('art.destroy', $art->art_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this art?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button">DELETE</button>
                </form>
                    <a href="{{ route('art.edit', $art->art_id) }}" class="edit-button">EDIT</a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
