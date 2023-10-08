<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="">
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone name</th>
                <th>Phone number</th>
            </tr>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->phone->name }}</td>
                    <td>{{ $customer->phone->number }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
