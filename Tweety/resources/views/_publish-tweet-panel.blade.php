<publishtweet-component inline-template id="tweet" label="tweet" :limit="255">
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <form method="POST" action="/tweets" @submit.prevent="postTweet">
            @csrf
            <textarea
            name="body"
            class="w-full"
            placeholder="Post your tweet!"
            required
            v-model="text"
            @keyup="isVisible = true"
        ></textarea>
        <p v-if="! isOver()" class="bellow" v-show="isVisible">You have @{{charactersRemaining}} characters remaining.</p>
        <p v-else class="over" v-show="isVisible">You are @{{ charactersOver }} characters over the limit.</p>
      
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
                    class="bg-blue-400 text-white rounded-lg py-1 px-6 hover:bg-blue-500"
                    :class="text.length > 255? 'bg-blue-400 text-white rounded-lg py-1 px-6 cursor-not-allowed': 'bg-blue-400 text-white rounded-lg py-1 px-6 hover:bg-blue-500'"
                    :disabled = "text.length > 255"
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
</publishtweet-component>