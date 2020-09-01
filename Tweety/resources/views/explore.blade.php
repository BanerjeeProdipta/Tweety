<x-app>
    <div>
        @foreach ($users as $user)
            <div class="flex items-center justify-between mb-3">
                <a href="{{ $user->path() }}" class="flex items-center ">
                    <img src="{{ $user->avatar }}"
                        alt="{{ $user->username }}'s avatar"
                        width="60"
                        class="mr-4"
                        style="border-radius:50%"
                    >
                    <div>
                        <h4 class="font-bold">{{ '@' . $user->username }}</h4>
                    </div>
                </a>
                @can('follow', $user)
                <form method="POST" action="/profile/{{$user->username}}/follow">
                    @csrf
                    <button class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
                        {{ auth()->user()->following($user) ? 'Unfollow' : 'Follow Me' }}
                    </button>
                </form>
                @endcan
            </div>
            <hr class="mb-3">
        @endforeach
        <div class="mt-10">
            {{ $users->links('pagination::tailwind') }}
        </div>
    </div>
</x-app>