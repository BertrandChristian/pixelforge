<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<x-app-layout>
    <div class="home-image">
        <img src="{{ asset('image/bloom.gif') }}" alt="Your Image Description">
    </div>
    <br>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
{{--                <div class="p-6 text-gray-900">--}}
{{--                    {{ __("You're logged in!") }}--}}
{{--                    <a href="{{ route('home-list') }}" role="button" class="btn btn-success bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full transition duration-300">--}}
{{--                        Masuk--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</x-app-layout>
