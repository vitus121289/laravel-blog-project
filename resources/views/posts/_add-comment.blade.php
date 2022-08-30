@auth
    <x-panel>
        <form action="/post/{{ $post->slug }}/comments" method="post">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/?id={{ auth()->id() }}"
                    alt=""
                    width="40"
                    height="40"
                    class="rounded-full"
                >
                <p class="ml-3">Want to participate?</p>
            </header>
            <div class="mt-6">
                <textarea name="body"
                    id=""
                    rows="5"
                    class="w-full text-sm focus:outline-none focus:ring"
                    placeholder="Quick, think of something to say!"
                    required
                ></textarea>
            </div>
            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-submit-button>
                    Post
                </x-submit-button>
            </div>
        </form>
    </x-panel>
@else
        <p class="font-semibold">
            <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Log in</a> to leave a comment.
        </p>
@endauth