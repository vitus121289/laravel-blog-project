@props(['name'])
<x-form.field>
    <x-form.label name="{{ $name }}" />
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        class="border border-gray-200 p-2 w-full rounded"
        required
        {{ $attributes }}
    >{{ old($name) ?? $slot }}</textarea>
    <x-form.error name="{{ $name }}" />
</x-form.field>