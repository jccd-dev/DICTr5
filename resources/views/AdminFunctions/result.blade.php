@foreach ($data as $key => $user)
    @if($key % 2 === 0)
        <tr class="bg-[#FDC500] bg-opacity-25">
            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                {{ $user->formatted_name }}
            </th>
            <td class="px-6 py-4">
                {{ ucfirst($user->gender) }}
            </td>
            <td class="px-6 py-4">
                {{ ucfirst($user->current_status) }}
            </td>
            <td class="px-6 py-4">
                {{ $user->addresses ? $user->addresses->formatted_address : '' }}
            </td>
            <td class="px-6 py-4">
                {{ $user->tertiaryEdu ? $user->tertiaryEdu->degree : '' }}
            </td>
            <td class="px-6 py-4">
                <select class="bg-[#00509D] bg-opacity-10 border-none text-black text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose status</option>
                    <option value="0">Disapproved</option>
                    <option value="1">Incomplete Requirements</option>
                    <option value="2">For Evaluation</option>
                    <option value="3">Approved</option>
                    <option value="4">Waiting for Result</option>
                </select>
            </td>
            <td class="px-6 py-4">
                <select class="bg-[#00509D] bg-opacity-10 border-none text-black text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose status</option>
                    <option value="0">Failed</option>
                    <option value="1">Processing</option>
                    <option value="2">Passed</option>
                </select>
            </td>
            <td class="px-6 py-4">
                <button
                    data-popover-target="popover-animation"
                    data-popover-trigger="click"
                    data-popover-placement="bottom"
                    type="button"
                    class="bg-[#00509D] bg-opacity-10 rounded-xl p-2"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
            </td>
        </tr>
    @else
        <tr class="bg-[#FDC500] bg-opacity-10">
            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                {{ $user->formatted_name }}
            </th>
            <td class="px-6 py-4">
                {{ $user->gender }}
            </td>
            <td class="px-6 py-4">
                {{ $user->current_status }}
            </td>
            <td class="px-6 py-4">
                {{ $user->addresses ? $user->addresses->formatted_address : '' }}
            </td>
            <td class="px-6 py-4">
                {{ $user->tertiaryEdu ? $user->tertiaryEdu->degree : '' }}
            </td>
            <td class="px-6 py-4">
                <select class="bg-[#00509D] bg-opacity-10 border-none text-black text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose status</option>
                    <option value="0">Disapproved</option>
                    <option value="1">Incomplete Requirements</option>
                    <option value="2">For Evaluation</option>
                    <option value="3">Approved</option>
                    <option value="4">Waiting for Result</option>
                </select>
            </td>
            <td class="px-6 py-4">
                <select class="bg-[#00509D] bg-opacity-10 border-none text-black text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose status</option>
                    <option value="0">Failed</option>
                    <option value="1">Processing</option>
                    <option value="2">Passed</option>
                </select>
            </td>
            <td class="px-6 py-4">
                <button
                    data-popover-target="popover-animation"
                    data-popover-trigger="click"
                    data-popover-placement="bottom"
                    type="button"
                    class="bg-[#00509D] bg-opacity-10 rounded-xl p-2"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
            </td>
        </tr>
    @endif
@endforeach
{{$data->links()}}
