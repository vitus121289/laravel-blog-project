<x-layout>
    <x-settings heading="Publish New Post">
        <form action="/admin/posts/store" method="post" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />
            <x-form.field>
                <x-form.label name="category" />
                <select
                    name="category_id"
                    id="category_id"
                    class="border border-gray-200 rounded"
                >
                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>
            </x-form.field>
            <x-form.button>Publish</x-submit-button>
        </form>
    </x-settings>
</x-layout>