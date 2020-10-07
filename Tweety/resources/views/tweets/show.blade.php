<x-app>
    <div class="bg-gray-200 border border-blue-400 rounded-lg">
        <div class="flex py-4 px-6">
            @include('_tweet')
        </div>
        @include('tweets._postReply')
    </div>
    @include('tweets._replies')
</x-app>