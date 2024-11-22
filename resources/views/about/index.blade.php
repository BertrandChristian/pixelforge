@extends('layouts.master')
@section('title', 'Home')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="top-section">
    GALLERY
</div>
<br>
<div class="search-section">
    <input type="text" placeholder="🔍 Search">
</div>
<br>
<x-app-layout>
    <div class="about-image">
        <img src="{{ asset('image/about_image.png') }}" alt="Banner Image">
    </div>

    <div class="spotlight-section">
        <h1><span class="ungu">Enter </span><span class="spot">PIXEL</span><span class="light">FORGE</span><span class="ungu">of Creativity!</span></h1>
    </div>

    <div class="rules-section">
        <div class="spotlight-section">
            <h1>Where Creativity is Forged in Pixel</h1>
        </div>
        <ol>
            <li>Welcome to PixelForge – a vibrant community dedicated to pixel artists and enthusiasts from all corners of the globe. Our mission is simple: to provide a platform where creativity thrives, pixel by pixel. Whether you're an experienced artist or just beginning your pixel art journey, PixelForge is your space to showcase your work, connect with like-minded creators, and find inspiration.</li>
            <li>At PixelForge, every detail matters. From nostalgic 8-bit designs to intricate modern pieces, we celebrate the timeless beauty of pixel art. Join us in forging a world where every square tells a story.</li>
        </ol>
    </div>

</x-app-layout>
