<div class="flex h-full w-full justify-center items-center">

    <style>
        body {
            height: 100vh;
        }

        body > div#main {
            height: 100%;
            width: 100%;
        }
    </style>

    <div class="w-[25rem] flex flex-col justify-center">
        <form class="w-full flex flex-col" wire:submit.prevent="authenticate">
            <img src="{{ asset('img/DICT.png') }}" class="w-56 self-center mb-10" alt="">
            <h1 class="font-bold font-quicksand text-3xl text-center mb-10">Admin Login</h1>
            @if(session()->has('invalid'))
                <div class="text-red-400 font-bold">
                    {{ session('invalid') }}
                </div>
            @endif

            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Email</label>
                <input
                    type="text"
                    name="email"
                    id="email"
                    wire:model="email"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" />
                @error('email') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Password</label>
                <input
                    type="text"
                    name="password"
                    id="password"
                    wire:model="password"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" />
                @error('password') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
            </div>
            <div>
                <button type="submit" class="bg-custom-blue text-white w-full py-3 rounded-xl">LOGIN</button>
            </div>
        </form>
    </div>
</div>
