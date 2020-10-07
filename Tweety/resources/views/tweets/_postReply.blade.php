<div class="bg-white rounded-lg px-2 py-2">
    <form method="POST" action="/tweet/{{$tweet->id}}">
        @csrf
        <div class="flex justify-between">
        <img
        src="{{auth()->user()->avatar}}"
        alt=""
        class=""
        style="object-fit:cover; border-radius:50%; width:40px; height:40px;"
        >
        <input
            name="body"
            class="w-full px-2 mx-2"
            placeholder="Reply to this tweet!"
            required
            id="textbox" 
            onkeyup="charcountupdate(this.value)"
            v-model="tweet"
        >
            <button
                type="submit"
                class="bg-blue-400 text-white rounded-full py-1 px-6 hover:bg-blue-500"
                :class="tweet.length > 255? 'bg-blue-400 text-white rounded-full py-1 px-6 cursor-not-allowed': 'bg-blue-400 text-white rounded-full py-1 px-6 hover:bg-blue-500'"
                :disabled = "tweet.length > 255"
            >
                Reply
            </button>
        </div>
    </form>

    @error('body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
