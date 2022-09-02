<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 items-center flex">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button
                                class="text-xs font-bold uppercase"
                            >
                                Welcome, {{ auth()->user()->name }}!
                            </button>
                        </x-slot>
                        @can('admin')                       
                            <x-dropdown-item
                                href="/admin/posts"
                                :active="request()->routeIs('adminDashboard')"
                            >
                                Dashboard
                            </x-dropdown>
                            <x-dropdown-item
                                href="/admin/posts/create"
                                :active="request()->routeIs('createPost')"
                            >
                                Create Post
                            </x-dropdown-item>
                        @endcan
                        <x-dropdown-item
                            href="#"
                            x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()"
                        >
                        Logout
                        </x-dropdown>
                        <form id="logout-form" action="/logout" method="post" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="text-xs font-bold uppercase ml-4">Login</a>
                @endauth
                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

    </section>
    <x-flash />
</body>
