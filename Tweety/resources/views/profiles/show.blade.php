@extends('layouts.app')

@section('content')

<header class="mb-6 relative">
    
    <img
    src="/images/header.jpg"
    alt=""
    class="mb-4"
    style="
        width:100%; 
        height:100%; 
        object-fit:cover; 
        border-radius:1.25rem"
    >

    
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
    <img
        src="{{ $user->avatar }}"
        alt=""
        class="rounded-full absolute"
        style="width:150px; left: 40%; top:55% "
    >
    <p class="text-sm mt-3">Let's move on and implement a profile page for each user. This page should show their avatar, a short bio, and then a timeline their tweets. This lesson will give us the chance to flex our Tailwind chops!</p>
</header>

@include('_timeline', [
    'tweets' => $user->tweets
])

@endsection