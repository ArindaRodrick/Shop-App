

@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm leading-6  text-gray-900']) }}>
    {{ $value ?? $slot }}
</label>       