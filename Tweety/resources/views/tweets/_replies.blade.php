<div class="border border-gray-300 rounded-lg mt-4">

    @forelse ($replies as $reply)

        <div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    
            <div class="mr-2 flex-shrink-0">
                <a href="{{ $reply->user->path() }}">
                    <img
                        src="{{ $reply->user->avatar }}"
                        alt=""
                        class="mr-2"
                        style="object-fit:cover; border-radius:50%; width:40px; height:40px;"
                    >
                </a>
            </div>
            
            <div style="width:-webkit-fill-available">
                <a href="{{ $reply->user->path() }}">
                    <h5 class="font-bold mb-2">{{ $reply->user->name }}</h5>
                </a>
                <div class="flex justify-between">
                    <p class="text-sm mb-2">
                        {{ $reply->body }}
                    </p>
                </div>
            </div>
            
        </div>

    @empty

        <p class="p-4">No reply yet!</p>  

    @endforelse
    
</div>
<div class="mt-10">
    {{ $replies->links('pagination::tailwind') }}
</div>