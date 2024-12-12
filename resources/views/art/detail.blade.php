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
        <div class="art-image-section">
            <img src="{{ asset('storage/' . $art->art_picture) }}" alt="{{ $art->name }}" class="art-detail-image">
        </div>
        <div class="art-info-section">
            <div class="art-details">
                <div class="profile-section">
                    @if ($art->users && $art->users->profile_image)
                        <img src="{{ asset('storage/profile_images/' . $art->users->profile_image) }}"
                             alt="{{ $art->users->name }}"
                             class="profile-icon">
                    @else
                        <p class="profile-placeholder">Profile Image</p>
                    @endif
                    <div class="profile-name">
                        <h2>{{ $art->users ? $art->users->name : 'Unknown User' }}</h2>
                    </div>
                </div>
                <h3>{{ $art->name }}</h3>
                <p>{{ $art->description }}</p>
                <p><strong>0</strong></p>
            </div>
            <div class="art-actions">
                @if ($art->users_id === Auth::id())
                    <form action="{{ route('art.destroy', $art->art_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this art?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">DELETE</button>
                    </form>
                @endif
                <a href="" class="edit-button">EDIT</a>
            </div>
        </div>
    </div>
</x-app-layout>
