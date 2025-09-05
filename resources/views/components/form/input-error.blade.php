@props(['for'])

@php
    $field = $for ?? $attributes->get('for');
@endphp

@if ($field && $errors->has($field))
    @foreach ($errors->get($field) as $message)
        <span {{ $attributes->merge(['class' => 'invalid-feedback d-block']) }}>
            {{ $message }}
        </span>
    @endforeach
@endif