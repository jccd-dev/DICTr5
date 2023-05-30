@foreach ($data as $key => $user)
    @if($key % 2 === 0)
        <tr class="bg-[#FDC500] bg-opacity-25">
            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                {{ $user->formatted_name }}
            </th>
            <td class="px-6 py-4">
                @if ($user->is_retaker == 'yes' AND !empty($user->userHistoryLatest))
                    @if ($user->userHistoryLatest->exam_result == 'failed')
                        Yes
                    @else
                        No
                    @endif
                @elseif ($user->is_retaker == 'yes' AND empty($user->userHistoryLatest))
                    Yes
                @else
                    No
                @endif
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
                @if (empty($user->regDetails) OR $user->regDetails->apply == 2)
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
                @if(empty($user->userHistoryLatest))
                    No Exam Results
                @else
                    @if ($user->userHistoryLatest->exam_result == 'passed')
                        <i>Passed</i>
                    @else
                        <i>Failed</i>
                    @endif
                @endif
            </td>
            <td class="px-6 py-4">
                <a href="{{ url('/admin/examinee/' . $user->id) }}" class="font-medium hover:underline flex gap-2 items-center bg-dark-blue bg-opacity-50 w-fit py-2 px-4 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                    <span class="font-semibold">View</span>
                </a>
            </td>
        </tr>
    @else
        <tr class="bg-[#FDC500] bg-opacity-10">
            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                {{ $user->formatted_name }}
            </th>
            <td class="px-6 py-4">
                @if ($user->is_retaker == 'yes' AND !empty($user->userHistoryLatest))
                    @if ($user->userHistoryLatest->exam_result == 'failed')
                        Yes
                    @else
                        No
                    @endif
                @elseif ($user->is_retaker == 'yes' AND empty($user->userHistoryLatest))
                    Yes
                @else
                    No
                @endif
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
                @if (empty($user->regDetails) OR $user->regDetails->apply == 2)
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
                            @break
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
                        <i>Failed</i>
                    @endif
                @endif
            </td>
            <td class="px-6 py-4">
                <a href="{{ url('/admin/examinee/' . $user->id) }}" class="font-medium hover:underline flex gap-2 items-center bg-dark-blue bg-opacity-50 w-fit py-2 px-4 rounded-2xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                              </svg>
                                            <span class="font-semibold">View</span>
                                        </a>
            </td>
        </tr>
    @endif
@endforeach
{{$data->links()}}
