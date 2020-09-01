<x-app>
    <div>
        @foreach ($users as $user)
            <a href="{{ $user->path() }}" class="flex items-center mb-5">
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
        @endforeach
    <div class="mt-10">
        {{ $users->links('pagination::tailwind') }}
    </div>
    </div>
</x-app>