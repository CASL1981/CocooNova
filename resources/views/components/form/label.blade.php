@props(['value'])

<label {{ $attributes }} {!! $attributes->merge(['class' => 'form-label']) !!}>
  {{ $value ?? $slot }}
</label>