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

    <div>
        <a href="{{ $tweet->user->path() }}">
            <h5 class="font-bold mb-2">{{ $tweet->user->name }}</h5>
        </a>

        <p class="text-sm">
            {{ $tweet->body }}
        </p>

    </div>
</div>
