<x-layout>
    @include('posts/_header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if (count($posts) >= 1)
            <x-post-featured :post="$posts[0]"></x-post-featured>

            <div class="lg:grid lg:grid-cols-6">
                @foreach ($posts->skip(1) as $post)
                    <x-posts-card :post="$post" class="{{ $loop->iteration > 2 ? 'col-span-2' : 'col-span-3' }}"></x-posts-card>
                @endforeach
            </div>
            {{ $posts->links() }}
        @else
            <p class="text-center">No posts yet. Check back later.</p>
        @endif
    </main>

    @include('posts/_footer')
</x-layout>