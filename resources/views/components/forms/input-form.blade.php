<div>
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">${{ $name }}</label>

    @if($insideText)
        <div class="flex">
            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                {{ $insideText }}
            </span>
            <input type="{{ $type }}"
                   id="{{ $name }}"
                   class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="{{ $placeholder }}"
                   required="{{ $isRequired }}"
                   wire:model="{{ $model }}"
            >
        </div>
    @endif

    @if(!$insideText)
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="{{ $placeholder }}"
            required="{{ $isRequired }}"
            wire:model="{{ $model }}"
        >
    @endif

    @error($model) <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
</div>
