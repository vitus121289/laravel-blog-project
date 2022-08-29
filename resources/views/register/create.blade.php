<x-layout>
    {{-- @include('posts/_header') --}}
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-100 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form action="/register" method="post">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="name">
                        Name
                    </label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="name"
                        id="name">
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="email">Email Address</label>
                        <input type="text"
                            class="border border-gray-400 p-2 w-full"
                            name="email"
                            id="email"
                            required>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="username">
                        Username
                    </label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="username"
                        id="username"
                        required>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="password">
                        Password
                    </label>
                    <input type="password"
                        class="border border-gray-400 p-2 w-full"
                        name="password"
                        id="password"
                        required>
                </div>
                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>
                </div>
            </form>
        </main>
    @include('posts/_footer')
</x-layout>