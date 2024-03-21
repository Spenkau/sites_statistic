@props(['value'])

<label {{ $attributes->merge(['class' => 'fst-italic']) }}>
    {{ $value ?? $slot }}
</label>
