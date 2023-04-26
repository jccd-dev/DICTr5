<div wire:ignore class="flex h-full w-full justify-center items-center">
    <style>
        body {
            height: 100vh;
        }

        body > div#main {
            height: 100%;
            width: 100%;
        }
    </style>
{{--    <div wire:ignore class="flex h-full w-full justify-center items-center">--}}
    <div class="w-[25rem] flex flex-col justify-center">
        <h1 class="font-bold font-quicksand text-3xl text-center mb-10">Admin Login</h1>
        {{ $password }}
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Password</label>
            <input
                type="text"
                id="password"
                wire:model.lazy="password"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" />
        </div>
    </div>
{{--    </div>--}}
</div>
