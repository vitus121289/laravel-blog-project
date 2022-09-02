<x-layout>
    <main class="max-w-lg mx-auto mt-10">
        <x-panel>
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form action="/register" method="post">
                @csrf
                <x-form.input name="name" />
                <x-form.input name="email" />
                <x-form.input name="username" />
                <x-form.input name="password" type="password" />
                <x-form.button>
                    Submit
                </x-form.button>
            </form>
        </x-panel>
    </main>
</x-layout>