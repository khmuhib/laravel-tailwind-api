<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boys List</title>
</head>

<body class="">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold mb-4">Boys List</h1>
            <a href="{{ route('boys.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Boys</a>
        </div>


        @if (count($boys) > 0)
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 font-semibold text-sm text-gray-700 border-b">Boys Name</th>
                        <th class="py-2 px-4 font-semibold text-sm text-gray-700 border-b">Email</th>
                        <th class="py-2 px-4 font-semibold text-sm text-gray-700 border-b">Phone</th>
                        <th class="py-2 px-4 font-semibold text-sm text-gray-700 border-b">Address</th>
                        <th class="py-2 px-4 font-semibold text-sm text-gray-700 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($boys as $boy)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $boy->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $boy->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $boy->phone }}</td>
                            <td class="py-2 px-4 border-b">{{ $boy->address }}</td>
                            <td>
                                {{-- <a href="{{ route('Student.show', $Student->id) }}">View</a> --}}
                                <a href="{{ route('boys.edit', $boy->id) }}">Edit</a>
                                <form style="display: inline-block" action="{{ route('boys.delete', $boy->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        @else
            <h1>Student Not Available</h1>
        @endif



    </div>
</body>

</html>
