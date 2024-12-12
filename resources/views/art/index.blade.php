@extends('layouts.master')
@section('title', 'Profile')
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
        <form action="{{ route('art.store') }}" method="POST" enctype="multipart/form-data" class="profile-form">
            @csrf

            <!-- Art's Picture Section -->
            <div class="profile-image-section">
                <label for="art-picture" class="profile-label">Art's Picture</label>
                <input type="file" id="art-picture" name="art_picture" class="upload-input" accept="image/*">
            </div>

            <!-- Art's Name Section -->
            <div class="profile-form-section">
                <label for="art-name" class="form-label">Art's Name</label>
                <input type="text" id="art-name" name="art_name" class="form-input" placeholder="Enter Art's Name">

                <!-- Description Section -->
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-textarea" rows="4" placeholder="Enter a description..."></textarea>

                <!-- Finish Button -->
                <button type="submit" class="finish-button">Finish</button>
            </div>
        </form>
    </div>
</x-app-layout>
