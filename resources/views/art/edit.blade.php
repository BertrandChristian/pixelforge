@extends('layouts.master')
@section('title', 'Edit Art')
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
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile-container">
        <form action="{{ route('art.update', $art->art_id) }}" method="POST" enctype="multipart/form-data" class="profile-form">
            @csrf
            @method('PUT')

            <!-- Art's Picture Section -->
            <div class="profile-image-section">
                <label for="art-picture" class="profile-label">Art's Picture</label>
                <input type="file" id="art-picture" name="art_picture" class="upload-input" accept="image/*">
                <!-- Display current art picture if available -->
                @if ($art->art_picture)
                    <img src="{{ asset('storage/' . $art->art_picture) }}" alt="Art Picture" class="current-art-image">
                @endif
            </div>

            <!-- Art's Name Section -->
            <div class="profile-form-section">
                <label for="art-name" class="form-label">Art's Name</label>
                <input type="text" id="art-name" name="art_name" class="form-input" placeholder="Enter Art's Name" value="{{ old('art_name', $art->name) }}">

                <!-- Description Section -->
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-textarea" rows="4" placeholder="Enter a description...">{{ old('description', $art->description) }}</textarea>

                <!-- Finish Button -->
                <button type="submit" class="finish-button">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
