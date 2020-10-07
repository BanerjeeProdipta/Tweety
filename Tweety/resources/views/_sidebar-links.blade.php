<ul>
    <li><a
            class="font-bold text-lg mb-4 block"
            href="{{ route('home')}}"
        >Home</a></li>
    <li><a
            class="font-bold text-lg mb-4 block"
            href="{{ route('explore')}}"
        >Explore</a></li>
    <li><a
            class="font-bold text-lg mb-4 block"
            href="/{{auth()->user()->username}}/notification"
        >
        Notifications<span class="text-xs font-semibold ml-2 py-1 px-2 uppercase rounded text-blue-600 bg-blue-200 uppercase last:mr-0 mr-1"
    >{{ auth()->user()->unreadNotifications->count()}}</span></a></li>
    <li><a
            class="font-bold text-lg mb-4 block"
            href="{{ route('profile', auth()->user() ) }} "
        >Profile</a></li>
    <li><a
            class="font-bold text-lg mb-4 block"
            href="/settings/{{auth()->user()->username}}/edit"
        >Settings</a></li>
    <li><a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                class="font-bold text-lg  block" 
                href="{{ route('logout') }}"
                >Logout</button>
            </form>
        </a>
    </li>
</ul>

