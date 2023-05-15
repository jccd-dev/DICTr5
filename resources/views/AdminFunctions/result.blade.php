@foreach ($data as $user)
    <tr>
        <td>{{ $user->formatted_name }}</td>
        <td>{{ $user->gender }}</td>
        <td>{{ $user->current_status }}</td>
        <td>{{ $user->tertiaryEdu ? $user->tertiaryEdu->degree : '' }}</td>
        <td>{{ $user->addresses ? $user->addresses->formatted_address : '' }}</td>
    </tr>
@endforeach
{{$data->links()}}
