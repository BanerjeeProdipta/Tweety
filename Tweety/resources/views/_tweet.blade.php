<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $tweet->user->path() }}">
            <img
                src="{{ $tweet->user->avatar }}"
                alt=""
                class="mr-2"
                style="object-fit:cover; border-radius:50%; width:40px; height:40px;"
            >
        </a>
    </div>

    <div style="width:-webkit-fill-available">
        <a href="{{ $tweet->user->path() }}">
            <h5 class="font-bold mb-2">{{ $tweet->user->name }}</h5>
        </a>
        <div class="flex justify-between">
            <a href="">
                <p class="text-sm mb-2">
                    {{ $tweet->body }}
                </p>
            </a>
            @can('delete', $tweet)
            <form action="tweets/{{$tweet->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <svg class="w-4 h-4" fill="none" stroke="gray" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                </button>
            </form>
            @endcan
            
        </div>
        @include('_like')
    </div>
</div>
