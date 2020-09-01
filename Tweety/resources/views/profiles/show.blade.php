<x-app>
    <header class="mb-6 relative">
        <div class="relative">
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
            <img
                src="{{ $user->avatar }}"
                alt=""
                class="absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" 
                style="object-fit:cover; border-radius:50%; width:150px; height:150px; left:50%"
            >   
        </div>
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl mb-2">{{ $user->name }}</h2>
                <p class="text sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            {{-- Buttons --}}
            <div class="flex">
                
                @can('update', $user)
                    <a href="/profile/{{$user->username}}/edit" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
                @endcan

                @can('follow', $user)
                    <form method="POST" action="/profile/{{$user->username}}/follow">
                        @csrf
                        <button class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
                            {{ auth()->user()->following($user) ? 'Unfollow' : 'Follow Me' }}
                        </button>
                    </form>
                @endcan

            </div>
        </div>
        
        <p class="text-sm mt-6">Let's move on and implement a profile page for each user. This page should show their avatar, a short bio, and then a timeline their tweets. This lesson will give us the chance to flex our Tailwind chops!</p>
    </header>
    @include('_timeline', [
        'tweets' => $user->tweets
    ])
</x-app>