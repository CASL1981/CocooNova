@props([
  'options' => [],
  'selected' => null,
  'disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
  'class' => 'form-select form-select-sm mb-3 shadow-none' ]) !!}>
  <option value="">--- Seleccione ---</option>
  @foreach($options as $key => $value)
      <option value="{{ $key }}" {{ $key == $selected ? 'selected' : '' }}>{{ $value }}</option>
  @endforeach
</select>