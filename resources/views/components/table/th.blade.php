@props([
    'field' => '',
    'sortField' => '{{$sortField}}',
    'sortDirection' => '{{$sortDirection}}',
    ])
<th wire:click="sortBy('{{$field}}')" style="cursor: pointer;" scope="col" {{ $attributes->merge(['class' => '']) }} >
    {{$slot}}
</th>