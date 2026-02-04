@props(['disabled' => false])
<div class="d-flex justify-content-center form-check form-switch">
    <input type="checkbox" 
    {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-check-input border border-1 border-primary']) !!}>
</div>