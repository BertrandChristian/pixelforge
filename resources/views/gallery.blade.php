extends('layouts.master')
@section('title', 'Profile')

<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="top-section">
    GALLERY
</div>

<div class="search-section">
    <input type="text" placeholder="🔍 Search">
</div>

<x-app-layout>

    <!-- Gallery Section -->
    <div class="gallery-container">
        <!-- Loop through the arts to display images -->
        @foreach ($arts as $art)
            <div class="gallery-item">
                <img src="{{ asset('storage/' . $art->art_picture) }}" alt="{{ $art->name }}">
                <p>{{ $art->name }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
