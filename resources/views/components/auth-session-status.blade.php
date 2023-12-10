@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-red-600']) }} style="color: #3b9d30">
        {{ $status }}
    </div>
@endif
