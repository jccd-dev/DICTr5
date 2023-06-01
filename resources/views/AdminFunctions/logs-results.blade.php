@foreach ($data as $key => $item)
@php
    $role = '';
    switch ($item->admin->role) {
        case 100: // super admin
            # show all data
            $role = 'Super admin';
            break;
        case 200: // normal admin
            $role = "Admin";
            break;
        case 300: // creator (cms)
            $role = "Creator";
            break;
    }
@endphp
@if($key % 2 === 0)
    <tr class="bg-[#FDC500] bg-opacity-25">
        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
            {{ $item->admin->name }}
        </th>
        <td class="px-6 py-4">
            {{ $role }}
        </td>
        <td class="px-6 py-4">
            {{ $item->activity }}
        </td>
        <td class="px-6 py-4">
            {{ $item->end_point }}
        </td>
        <td class="px-6 py-4">
            {{ date('F j, Y g:i a', strtotime($item->timestamp)) }}
        </td>
    </tr>
@else
    <tr class="bg-[#FDC500] bg-opacity-10">
        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
            {{ $item->admin->name }}
        </th>
        <td class="px-6 py-4">
            {{ $role }}
        </td>
        <td class="px-6 py-4">
            {{ $item->activity }}
        </td>
        <td class="px-6 py-4">
            {{ $item->end_point }}
        </td>
        <td class="px-6 py-4">
            {{ date('F j, Y g:i a', strtotime($item->timestamp)) }}
        </td>
    </tr>
@endif
@endforeach
{{ $data->links() }}
