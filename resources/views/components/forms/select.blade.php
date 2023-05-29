<div class="{{ $classes }}">
    <label for="{{ $id }}" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ $name }}</label>
    <select id="{{ $id }}" wire:model.lazy="{{ $model }}" data-value="{{ $dataValue }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        {{-- <option {{ $value ? 'selected' : '' }}></option> --}}
        @if($options)
            @foreach($options as $k => $option)
                @if(gettype($option) == "string")
                    @if($value)
                        <option selected value="{{ $k }}">{{ $option }}</option>
                    @else
                        <option value="{{ $k }}">{{ $option }}</option>
                    @endif
                @else
                    @if(is_array($option) || is_object($option))
                        @if($value)
                            <option selected value="{{ $option['id'] }}">{{ $option['category'] }}</option>
                        @else
                            <option value="{{ $option['id'] }}">{{ $option['category'] }}</option>
                        @endif
                    @endif
                @endif
            @endforeach
        @endif
    </select>
    @error($err ?: $model) <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
</div>
