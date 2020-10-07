<div class="border border-gray-300 rounded-lg">

    @forelse ($tweets as $tweet)

        <div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    
            @include('_tweet')
        
        </div>

    @empty

        <p class="p-4">No tweets yet!</p>  

    @endforelse
 
</div>