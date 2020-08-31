<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf

        <textarea
            name="body"
            class="w-full"
            placeholder="What's up doc?"
            required
        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between">
            <img
                src="{{auth()->user()->avatar}}"
                alt=""
                class="mr-2"
                style="object-fit:cover; border-radius:50%; width:50px; height:50px;"
            >

            <button
                type="submit"
                class="bg-blue-400 text-white rounded-lg py-2 px-4 hover:bg-blue-500"
            >
                Publish
            </button>
        </footer>
    </form>

    @error('body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>