@extends('layouts.master')
@section('title', 'Home')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="top-section">
    HOME
</div>
<br>
<div class="search-section">
    <input type="text" placeholder="🔍 Search">
</div>
<br>
<x-app-layout>
    <div class="home-image">
        <img src="{{ asset('image/bloom.gif') }}" alt="Banner Image">
    </div>

    <div class="spotlight-section">
        <h1><span class="spot">SPOT</span><span class="light">LIGHT</span></h1>
    </div>

    <div class="spotlight-images">
        <img src="{{ asset('image/titan.jpg') }}" alt="Spotlight Image 1">
        <img src="{{ asset('image/temple.jpg') }}" alt="Spotlight Image 2">
        <img src="{{ asset('image/loginimage2.jpg') }}" alt="Spotlight Image 3">
    </div>

    <div class="news-section">
        <div class="spotlight-section">
            <h1><span class="spot">NE</span><span class="light">WS</span></h1>
        </div>
        <p>🎉 Platform Launch Announcement! </p>
        <p> We're thrilled to officially launch PixelForge! Start uploading your pixel masterpieces and connect with artists worldwide. Explore our gallery and leave your mark today.</p>
        <br>
        <p>🌟 Featured Artist Program</p>
        <p>We’ll highlight three exceptional artist each week with the most stars. Selected artists will be featured on our homepage.</p>
    </div>

    <div class="rules-section">
        <div class="spotlight-section">
            <h1><span class="spot">RU</span><span class="light">LES</span></h1>
        </div>
        <ol>
            <li>At PixelForge, we aim to foster a positive and respectful community. To ensure a welcoming environment, please adhere to the following rules:</li>
            <li>1. Original Work: Only upload pixel art that you have created or have the rights to share. Plagiarism or stealing artwork is strictly prohibited.</li>
            <li>2. Appropriate Content: Keep your artwork and comments appropriate for all audiences. Explicit or offensive content will be removed.</li>
            <li>3. No Spam: Avoid spamming the platform with irrelevant content or links.</li>
            <li>4. Follow Copyright Laws: Ensure that any resources or references used in your art comply with copyright regulations.</li>
        </ol>
    </div>
</x-app-layout>
