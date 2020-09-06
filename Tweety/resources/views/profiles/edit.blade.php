<x-app>
    <div class="text-2xl font-bold mb-8">{{ __('Edit Profile') }}</div>
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6 mt-6">
            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="header"
                >
                    Header
                </label>

                <div class="flex shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                    <input class="p-2 w-full"
                        type="file"
                        name="header"
                        id="header"
                        
                    >

                    <img src="{{ $user->header }}"
                        alt="your header"
                        width="150"
                        class="px-2 py-2"
                    >
                </div>
            </div>

            <div class="mb-6 mt-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="avatar"
                >
                    Avatar
                </label>

                <div class="flex shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                    <input class="p-2 w-full"
                        type="file"
                        name="avatar"
                        id="avatar"
                        
                    >

                    <img src="{{ $user->avatar }}"
                        alt="your avatar"
                        width="150"
                        class="px-2 py-2"
                    >
                </div>
            </div>

            <div class="mb-6 mt-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="bio"
                >
                    Bio
                </label>
    
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
                       type="text"
                       name="bio"
                       id="bio"
                       value="{{ $user->bio }}"
                >
    
                @error('bio')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
                
            </div>

        </div>


        <div class="mb-6">
            <button type="submit"
                    class="bg-blue-400 text-white rounded-lg py-2 px-4 hover:bg-blue-500"
            >
                Submit
            </button>
        </div>
    </form>
</x-app>