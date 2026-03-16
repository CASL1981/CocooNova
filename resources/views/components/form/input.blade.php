@props(['disabled' => false])

<input 
{!! $disabled ? 'disabled tabindex="-1" style="pointer-events: none; user-select: none; background-color: #f8f9fa; opacity: 0.6;"' : '' !!} 
{!! $attributes->merge(['class' => 'form-control form-control-sm mb-1 shadow-none']) !!}>