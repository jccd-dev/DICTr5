<div class="relative">
    <label for="" class="absolute text-sm font-quicksand bg-white px-2 -top-1/4 left-3 font-semibold">
        <span>{{ $name }}</span>
        @if ($required)
            <span class="required text-red-500">*</span>
        @endif
    </label>
    <input type="{{ $type }}" placeholder="{{ $placeholder }}" class="border-2 border-black border-opacity-50 rounded-lg w-[20rem] px-3 py-2 font-quicksand focus:outline-none outline-none focus:border-dark-blue">
</div>
