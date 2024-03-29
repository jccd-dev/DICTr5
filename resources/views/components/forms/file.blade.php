<div class="{{ $classes }}">
    <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" for="{{ $name }}">{{ $name }}</label>
    <input
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        aria-describedby="{{ $name }}"
        id="{{ $id }}"
        type="file"
        accept="{{ $accept }}"
        wire:model="{{ $model }}"
    />
    @if ($th)
        <p class="text-sm">Current upload: {{ basename($th) }}</p>
    @endif
    @error($err ?: $model) <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
</div>
