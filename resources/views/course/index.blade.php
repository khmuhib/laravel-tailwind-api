<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>

<body class="">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold mb-4">Course List</h1>
            <a href="{{ route('course.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Course</a>
        </div>

        @if (count($courses) > 0)
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 font-semibold text-sm text-gray-700 border-b">Course Name</th>
                        <th class="py-2 px-4 font-semibold text-sm text-gray-700 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $course->name }}</td>
                            <td>
                                {{-- <a href="{{ route('course.show', $course->id) }}">View</a> --}}
                                <a href="{{ route('course.edit', $course->id) }}">Edit</a>
                                <form style="display: inline-block" action="{{ route('course.delete', $course->id) }}"
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
            <h1>Course Not Available</h1>
        @endif



    </div>
</body>

</html>
