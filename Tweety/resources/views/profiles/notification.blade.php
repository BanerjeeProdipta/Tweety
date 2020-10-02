<x-app>
    <div class="text-2xl font-bold mb-8">{{ __('Notification') }}</div>
    <h5 class="font-bold text-xl mb-4">Unread Notifications</h5>
    <ul>
        @forelse ($unreadNotifications as $notification)
        {{$unreadNotifications -> markAsRead()}}
            <li>
                @if( $notification->type == 'App\Notifications\TweetLike')
                    <div  class="bg-blue-200 p-3 rounded m-2 flex justify-between">
                        <div>{{$notification->data['reacter'] }} {{$notification->data['reaction'] }} {{$notification->data['tweet'] }}</div>
                        <div><p class="text-xs">{{$notification->created_at->diffForHumans()}}.</p></div>
                    </div>
                @endif
            </li>
            <li>
                @if( $notification->type == 'App\Notifications\TweetDislike')
                    <div  class="bg-blue-200 p-3 rounded m-2 flex justify-between">
                        <div>{{$notification->data['reacter'] }} {{$notification->data['reaction'] }} {{$notification->data['tweet'] }}</div>
                        <div><p class="text-xs">{{$notification->created_at->diffForHumans()}}.</p></div>
                    </div>
                @endif
            </li>
            @empty
            <li>
                <div  class="bg-blue-200 p-3 rounded m-2">You have no unread notification at the moment.</div></li>
        @endforelse
    </ul>
    <h5 class="font-bold text-xl mb-4 mt-4">Previous Notifications</h5>
    <ul>
        @forelse ($readNotifications as $notification)
            <li>
                @if( $notification->type == 'App\Notifications\TweetLike')
                    <div  class="bg-gray-300 p-3 rounded m-2 flex justify-between">
                        <div>{{$notification->data['reacter'] }} {{$notification->data['reaction'] }} {{$notification->data['tweet'] }}</div>
                        <div><p class="text-xs">{{$notification->created_at->diffForHumans()}}.</p></div>
                    </div>
                @endif
            </li>
            <li>
                @if( $notification->type == 'App\Notifications\TweetDislike')
                <div  class="bg-gray-300 p-3 rounded m-2 flex justify-between">
                    <div>{{$notification->data['reacter'] }} {{$notification->data['reaction'] }} {{$notification->data['tweet'] }}</div>
                    <div><p class="text-xs">{{$notification->created_at->diffForHumans()}}.</p></div>
                </div>
            @endif
            </li>
            @empty
            <div  class="bg-gray-300 p-3 rounded m-2">You have no notification at the moment.</div></li>
        @endforelse
    </ul>
</x-app>