@extends('layouts.app')

@section('content')

<header class="mb-6">
    <div>
        <img
        src="/images/header.jpg"
        alt=""
        class="rounded mb-2"
        style="
            width:100%; 
            height:100%; 
            object-fit:cover; "
        >
    </div>
    
    <div class="flex justify-between items-center">
        <div>
            <h2 class="font-bold text-2xl mb-2">{{ $user->name }}</h2>
            <p class="text sm">Joined {{ $user->created_at->diffForHumans() }}</p>
        </div>
        <div>
            <a href="#" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
            <a href="#" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">Follow Me</a>
        </div>
    </div>
</header>

@include('_timeline', [
    'tweets' => $user->tweets
])

@endsection