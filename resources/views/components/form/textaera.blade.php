@props(['name'])

<x-form.field>
        <x-form.label name="{{ $name }}" />

        <textarea {{ $attributes->merge([ 'class' =>'border border-gray-200 p-2 w-full rounded'])}}
                  name="{{ $name }}"
                  {{ $attributes }}
                >{{ $slot ?? old($name) }}</textarea>

        <x-form.error name="{{ $name }}" />
</x-form.field>
