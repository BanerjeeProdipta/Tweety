<x-app>
    <div class="text-2xl font-bold mb-8">{{ __('Settings') }}</div>
    <form method="POST" action="/profile/settings/{{$user->username}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="username"
            >
                Username
            </label>

            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
                   type="text"
                   name="username"
                   id="username"
                   value="{{ $user->username }}"
                   required
            >

            @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="name"
            >
                Name
            </label>

            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
                   type="text"
                   name="name"
                   id="name"
                   value="{{ $user->name }}"
                   required
            >

            @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="email"
            >
                Email
            </label>

            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
                   type="email"
                   name="email"
                   id="email"
                   value="{{ $user->email }}"
                   required
            >

            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="password"
            >
                Password
            </label>

            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
                   type="password"
                   name="password"
                   id="password"
                   required
            >

            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="password_confirmation"
            >
                Password Confirmation
            </label>

            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
                   type="password"
                   name="password_confirmation"
                   id="password_confirmation"
                   required
            >

            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" onclick="return Validate()"
                    class="bg-blue-400 text-white rounded-lg py-2 px-4 hover:bg-blue-500"
            >
                Submit
            </button>
        </div>
    </form>
</x-app>