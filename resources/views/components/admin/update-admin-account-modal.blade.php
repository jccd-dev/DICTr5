<div class="p-4 overflow-y-auto w-[30rem]">
    <div class="mb-3 md:mb-5 flex-1 flex-col">
        <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Email"
                value="{{ $admin_data->email }}"
            >
        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
    </div>
    <div class="mb-3 md:mb-5 flex-1 flex-col">
        <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Password"
                value=""
            >
        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
    </div>
    <div class="mb-3 md:mb-5 flex-1 flex-col">
        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Name"
                value="{{ $admin_data->name }}"
            >
        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
    </div>
    <div class="mb-3 md:mb-5 flex-1 flex-col">
        <label for="office" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Office</label>
            <input
                type="text"
                id="office"
                name="office"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Office"
                value="{{ $admin_data->office }}"
            >
        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
    </div>
    <div class="mb-3 md:mb-5 flex-1 flex-col">
        <label for="role" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Role</label>
        <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Choose a role</option>
            <option {{ $admin_data->role == 100 ? "selected" : ""  }} value="100">Super Admin</option>
            <option {{ $admin_data->role == 200 ? "selected" : ""  }}  value="200">Normal Admin</option>
            <option {{ $admin_data->role == 300 ? "selected" : ""  }}  value="300">Content Manager</option>
        </select>
        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
    </div>
    <div class="mb-3 md:mb-5 flex-1 flex-col">
        <label for="designation" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Designation</label>
            <input
                type="text"
                id="designation"
                name="designation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Designation"
                value="{{ $admin_data->designation }}"
            >
            <input
                type="hidden"
                name="admin_id"
                value="{{ $admin_data->id }}"
            >
        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
    </div>
</div>
