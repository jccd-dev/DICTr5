<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Date</th>
        <th>Level</th>
        <th>Message</th>
    </tr>
    </thead>
    <tbody>
    @foreach (explode("\n", $logs) as $log)
        <tr>
            @foreach (explode(' ', $log, 3) as $column)
                <td>{{ $column }}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>


</body>
</html>
