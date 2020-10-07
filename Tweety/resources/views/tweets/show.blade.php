<x-app>
    <div class="bg-gray-200 rounded-lg">
        <div class="flex py-4 px-6">
            @include('_tweet')
        </div>
        @include('tweets._reply')
    </div>

</x-app>