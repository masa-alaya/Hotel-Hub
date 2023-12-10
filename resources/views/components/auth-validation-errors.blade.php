@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }} style="color: #f00">
        <div class="font-medium text-red-600">
            {{ __('Sorry there is an error') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
