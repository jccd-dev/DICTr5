<div class="{{ $classes }}">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">{{ $name }}</label>
    <div class="relative w-full">
        <input
            datepicker
            datepicker-autohide
            datepicker-format="mm/dd/yyyy"
            id="{{ $id }}"
            type="text"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="{{ $placeholder }}">
    </div>
    @error($err ?: $model) <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
</div>
