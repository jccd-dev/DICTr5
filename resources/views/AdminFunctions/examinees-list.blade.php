<style>
    table, td, th {
        border: 1px solid;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
</style>
<div>
    <form id="search-form">
        <input type="text" name="search_text" placeholder="Search...">
        <select name="gender">
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <select name="curr_status">
            <option value="">Select Status</option>
            <option value="student">Student</option>
            <option value="professional">Professional</option>
        </select>
        <select name="reg_status">
            <option value="">Select Status</option>
            <option value="1">Approved</option>
            <option value="0">Pending</option>
        </select>
        <select name="order_by">
            <option value="">Sort</option>
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select>
    </form>
    <table>
        {{$try}}
        <thead>
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Tertiary Education</th>
            <th>Address</th>
        </tr>
        </thead>
        <tbody id="results">
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
        </tbody>

    </table>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#search-form input, #search-form select').on('change, input', function() {
            var formData = $('#search-form').serialize();
            // console.log(formData)
            $.ajax({
                url: '{{ route('search') }}',
                type: 'GET',
                data: formData,
                success: function(data) {
                    $('#results').html(data);
                }
            });
        });
    })
</script>
