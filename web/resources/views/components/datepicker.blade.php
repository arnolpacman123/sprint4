@props([
    'error' => null
])

<div
    x-data="{ value: @entangle($attributes->wire('model')) }"
    x-on:change="value = $event.target.value"
    x-init="
        new Pikaday(
            {
                field: $refs.input,
                'format': 'YYYY-M-D',
                toString(date, format) {
                    // you should do formatting based on the passed format,
                    // but we will just return 'D/M/YYYY' for simplicity
                    let day = date.getDate();
                    let month = date.getMonth() + 1;
                    const year = date.getFullYear();
                    if (day < 10) {
                        day = `0${day}`;
                    }
                    if (month < 10) {
                        month = `0${month}`;
                    }
                    return `${year}-${month}-${day}`;
                },
                firstDay: 1
            }
        );"
>
    <input
        {{ $attributes->whereDoesntStartWith('wire:model') }}
        x-ref="input"
        x-bind:value="value"
        type="text"
        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm @if($error) focus:ring-danger-500 focus:border-danger-500 border-danger-500 text-danger-500 pr-10 @else focus:ring-primary-500 focus:border-primary-500 @endif rounded-md"
    />
</div>
