<div class="{{ $classes }}">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $name }}</label>
    <select id="{{ $name }}" wire:model.lazy="{{ $model }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option {{ $value ? 'selected' : '' }}>Choose a category</option>
            @foreach($options as $k => $option)
                @if(is_array($option) || is_object($option))
                            @if($value)
                                <option selected value="{{ $option['id'] }}">{{ $option['category'] }}</option>
                            @else
                                <option value="{{ $option['id'] }}">{{ $option['category'] }}</option>
                            @endif
{{--                        @foreach($option as $key => $val)--}}
{{--                        @endforeach--}}
                @endif
            @endforeach

    </select>
    @error($err ?: $model) <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
</div>
