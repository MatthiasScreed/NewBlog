@props(['name', 'value'=> ''])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <input class="border border-gray-200 p-2 w-full rounded"
            name="{{ $name }}"
            id="{{ $name }}"
           value="{{ old($name, $value) }}"
           placeholder="{{ $value }}"
            {{ $attributes }}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
