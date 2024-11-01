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
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue nisi, molestie vel ex sed, efficitur efficitur metus. Donec nulla libero, molestie a enim in, ullamcorper tincidunt odio. Pellentesque iaculis, purus quis viverra eleifend, eros mi blandit nunc, vel dictum eros ex vel metus. Praesent vel tincidunt lacus. Ut at purus pulvinar, posuere nisl ac, dapibus augue. Praesent cursus lacus tellus, vitae consectetur sem laoreet et. Ut vestibulum purus a ex molestie, ut vehicula erat euismod. Donec sem augue, hendrerit vel urna eget, gravida ultrices velit.</p>
        <br>
        <p>Praesent pretium erat ut leo aliquam, at interdum nisl ornare. Fusce et condimentum diam. Donec eget ex nulla. Aenean quis massa sodales, facilisis magna ut, egestas lorem. Quisque porta libero pulvinar sapien placerat bibendum. Pellentesque molestie nisi a velit egestas, ut accumsan nisi maximus. Pellentesque accumsan quam quam, eget vehicula ante egestas eu.</p>
        <br>
        <p>Praesent tincidunt augue at odio auctor, vitae condimentum elit mollis. Integer eget ante et massa varius convallis id sit amet justo. Nam placerat tortor urna, et bibendum dolor suscipit eget. Duis sagittis nisi dui, id dapibus sapien bibendum vitae. Cras vestibulum, massa non pharetra molestie, risus arcu vestibulum magna, et eleifend arcu urna nec massa. Aliquam metus enim, tempus sed malesuada vel, bibendum quis mauris.
            Etiam tempor in eros sit amet vehicula. Duis pretium est ac aliquet sodales. In feugiat efficitur aliquet. Proin feugiat est pretium interdum elementum.</p>
        <br>
        <p>Pellentesque et nisi ut orci hendrerit porttitor. Sed quis leo eget lacus aliquet auctor interdum non magna. Proin mattis, libero sed faucibus euismod, erat nisi varius massa, id dapibus nulla elit porta arcu. Integer nec urna pellentesque, rhoncus nibh et, pellentesque mauris. Donec ut lacus sit amet mi ultricies tempus. Aenean semper risus nisl, id interdum felis condimentum in. Curabitur dictum accumsan ipsum, vitae suscipit dui. Nunc suscipit varius eleifend. Etiam dictum arcu vel tristique imperdiet. Etiam lacinia pretium dolor, vitae bibendum sem condimentum sit amet. Curabitur luctus mollis dolor in vehicula. Cras nec vehicula justo.</p>
    </div>

    <div class="rules-section">
        <div class="spotlight-section">
            <h1><span class="spot">RU</span><span class="light">LES</span></h1>
        </div>
        <ol>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue nisi, molestie vel ex sed, efficitur efficitur metus. Donec nulla libero, molestie a enim in, ullamcorper tincidunt odio. Pellentesque iaculis, purus quis viverra eleifend, eros mi blandit nunc, vel dictum eros ex vel metus. Praesent vel tincidunt lacus. Ut at purus pulvinar, posuere nisl ac, dapibus augue. Praesent cursus lacus tellus, vitae consectetur sem laoreet et. Ut vestibulum purus a ex molestie, ut vehicula erat euismod. Donec sem augue, hendrerit vel urna eget, gravida ultrices velit.</li>
            <li>Praesent pretium erat ut leo aliquam, at interdum nisl ornare. Fusce et condimentum diam. Donec eget ex nulla. Aenean quis massa sodales, facilisis magna ut, egestas lorem. Quisque porta libero pulvinar sapien placerat bibendum. Pellentesque molestie nisi a velit egestas, ut accumsan nisi maximus. Pellentesque accumsan quam quam, eget vehicula ante egestas eu.</li>
            <li>Praesent tincidunt augue at odio auctor, vitae condimentum elit mollis. Integer eget ante et massa varius convallis id sit amet justo. Nam placerat tortor urna, et bibendum dolor suscipit eget. Duis sagittis nisi dui, id dapibus sapien bibendum vitae. Cras vestibulum, massa non pharetra molestie, risus arcu vestibulum magna, et eleifend arcu urna nec massa. Aliquam metus enim, tempus sed malesuada vel, bibendum quis mauris. </li>
            <li>Etiam tempor in eros sit amet vehicula. Duis pretium est ac aliquet sodales. In feugiat efficitur aliquet. Proin feugiat est pretium interdum elementum.</li>
            <li>Pellentesque et nisi ut orci hendrerit porttitor. Sed quis leo eget lacus aliquet auctor interdum non magna. Proin mattis, libero sed faucibus euismod, erat nisi varius massa, id dapibus nulla elit porta arcu. Integer nec urna pellentesque, rhoncus nibh et, pellentesque mauris. Donec ut lacus sit amet mi ultricies tempus. Aenean semper risus nisl, id interdum felis condimentum in. Curabitur dictum accumsan ipsum, vitae suscipit dui. Nunc suscipit varius eleifend. Etiam dictum arcu vel tristique imperdiet. Etiam lacinia pretium dolor, vitae bibendum sem condimentum sit amet. Curabitur luctus mollis dolor in vehicula. Cras nec vehicula justo.</li>
        </ol>
    </div>
</x-app-layout>
