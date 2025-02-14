@extends('layouts.master')
@section('title', 'Gallery')

<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="top-section">
    GALLERY
</div>

<div class="search-section">
    <form action="{{ route('gallery') }}" method="GET">
        <input type="text" name="search" placeholder="🔍 Search" value="{{ $search }}">
    </form>
</div>

<x-app-layout>
    <div class="gallery-container">
        @foreach ($arts as $art)
            <div class="gallery-item">
                <a href="{{ route('art.show', $art->art_id) }}">
                    <img src="{{ asset('storage/' . $art->art_picture) }}" alt="{{ $art->name }}">
                </a>
                <p>{{ $art->name }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
