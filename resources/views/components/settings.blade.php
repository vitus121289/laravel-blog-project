@props(['heading'])
<section class="max-w-4xl mx-auto py-8">
    <h1 class="text-lg font-bold mb-8 p-2 border-b">
        {{ $heading }}
    </h1>
    <div class="flex flex-shrink-0">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a
                        href="/admin/posts"
                        class="{{ request()->routeIs('adminDashboard') ? 'text-blue-500' : '' }}"    
                    >
                        Dashboard
                    </a>
                </li>
                <li>
                    <a
                        href="/admin/posts/create"
                        class="{{ request()->routeIs('createPost') ? 'text-blue-500' : '' }}"
                    >
                        Create Post
                    </a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
    
</section>
@include('posts/_footer')