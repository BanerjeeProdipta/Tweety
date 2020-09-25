<x-app>
    <div class="text-2xl font-bold mb-8">{{ __('Notification') }}</div>
    <h5 class="font-bold text-xl mb-4">Unread Notifications</h5>
    <ul>
        @forelse ($unreadNotifications as $notification)
        {{$unreadNotifications -> markAsRead()}}
            <li>
                @if( $notification->type == 'App\Notifications\TweetLike')
                {{$notification->data['reacter'] }} {{$notification->data['reaction'] }} {{$notification->data['tweet'] }} {{$notification->created_at->diffForHumans()}}.
                @endif
            </li>
            <li>
                @if( $notification->type == 'App\Notifications\TweetDislike')
                {{$notification->data['reacter'] }} {{$notification->data['reaction'] }} on{{$notification->data['tweet'] }} {{$notification->created_at->diffForHumans()}}.
                @endif
            </li>
            @empty
            <li>You have no unread notification at the moment.</li>
        @endforelse
    </ul>
    <h5 class="font-bold text-xl mb-4 mt-4">Previous Notifications</h5>
    <ul>
        @forelse ($readNotifications as $notification)
            <li>
                @if( $notification->type == 'App\Notifications\TweetLike')
                {{$notification->data['reacter'] }} {{$notification->data['reaction'] }} {{$notification->data['tweet'] }} {{$notification->created_at->diffForHumans()}}.
                @endif
            </li>
            <li>
                @if( $notification->type == 'App\Notifications\TweetDislike')
                {{$notification->data['reacter'] }} {{$notification->data['reaction'] }} {{$notification->data['tweet'] }} {{$notification->created_at->diffForHumans()}}.
                @endif
            </li>
            @empty
            <li>You have no notification at the moment.</li>
        @endforelse
    </ul>
</x-app>