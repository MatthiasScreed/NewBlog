@props(['name',
        'value' => '',
        'type' => 'text'])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <input class="border border-gray-200 p-2 w-full rounded"
            name="{{ $name }}"
            id="{{ $name }}"
            type="{{$type}}"
           @if($type === 'file') enctype="multipart/form-data" @endif
           value="{{ old($name, $value) }}"
           placeholder="{{ $value }}"
            {{ $attributes }}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
