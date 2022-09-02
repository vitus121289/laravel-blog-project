<x-layout>
    <x-settings :heading="'Edit Post: ' . $post->title">
        <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="$post->title" />
            <x-form.input name="slug" :value="$post->slug" />
            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="asset('storage/' . $post->thumbnail)" />
                </div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>
            <x-form.textarea name="excerpt" >{{ $post->excerpt }}</x-form.textarea>
            <x-form.textarea name="body" >{{ $post->body }}</x-form.textarea>
            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ $post->category->id == $category->id ? 'selected' : '' }}    
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </x-form.field>
            <x-form.button>Update</x-form.button>
        </form>
    </x-settings>
</x-layout>