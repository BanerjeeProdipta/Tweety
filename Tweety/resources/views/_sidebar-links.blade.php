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
            href="#"
        >Notifications</a></li>
    <li><a
            class="font-bold text-lg mb-4 block"
            href="{{ route('profile', auth()->user() ) }} "
        >Profile</a></li>
    <li><a
            class="font-bold text-lg mb-4 block"
            href="/profile/settings/{{auth()->user()->username}}/edit"
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

