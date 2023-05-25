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
                @if (empty($user->user_login_id))
                    Manual
                @else
                    Online
                @endif
            </td>
            <td class="px-6 py-4">
                @if (empty($user->regDetails) OR $user->regDetails->apply == 0)
                    Not yet been applied
                @else
                    @switch($user->regDetails->status)
                        @case(1)
                            <i>Disapproved</i>
                            @break
                        @case(2)
                            <i>Incomplete Requirements</i>
                            @break
                        @case(3)
                            <i>For Evaluation</i>
                            @break
                        @case(4)
                            <i>Approved</i>
                            @break
                        @case(5)
                            <i>Scheduled for Exam</i>
                            @break
                        @case(6)
                            <i>Waiting for Result</i>
                            @break
                        @default

                    @endswitch
                @endif
            </td>
            <td class="px-6 py-4">
                @if (empty($user->userHistoryLatest))
                    No Exam Results
                @else
                    @if ($user->userHistoryLatest->exam_result == 'passed')
                        <i>Passed</i>
                    @else
                        <i>Passed</i>
                    @endif
                @endif
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
                {{ ucfirst($user->gender) }}
            </td>
            <td class="px-6 py-4">
                {{ ucfirst($user->current_status) }}
            </td>
            <td class="px-6 py-4">
                {{ $user->addresses ? $user->addresses->formatted_address : '' }}
            </td>
            <td class="px-6 py-4">
                @if (empty($user->user_login_id))
                    Manual
                @else
                    Online
                @endif
            </td>
            <td class="px-6 py-4">
                @if (empty($user->regDetails) OR $user->regDetails->apply == 0)
                    Not yet been applied
                    @else
                    @switch($user->regDetails->status)
                        @case(1)
                            <i>Disapproved</i>
                            @break
                        @case(2)
                            <i>Incomplete Requirements</i>
                            @break
                        @case(3)
                            <i>For Evaluation</i>
                            @break
                        @case(4)
                            <i>Approved</i>
                            @break
                        @case(5)
                            <i>Scheduled for Exam</i>
                            @break
                        @case(6)
                            <i>Waiting for Result</i>
                            @break
                        @default

                    @endswitch
                @endif
            </td>
            <td class="px-6 py-4">
                @if (empty($user->userHistoryLatest))
                No Exam Results
                @else
                    @if ($user->userHistoryLatest->exam_result == 'passed')
                        <i>Passed</i>
                    @else
                        <i>Passed</i>
                    @endif
                @endif
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
