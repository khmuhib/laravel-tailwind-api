<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>

<body>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Boy</h1>
        <div class="">
            {{ Session::get('message') }}
        </div>
        <form method="POST" action="{{ route('boys.update', $boy->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Boy Name</label>
                <input type="text" name="name" id="name"
                    class="form-input rounded-md w-full @error('name') border-red-500 @enderror"
                    value="{{ $boy->name }}">
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Boy Email</label>
                <input type="text" name="email" id="name"
                    class="form-input rounded-md w-full @error('name') border-red-500 @enderror"
                    value="{{ $boy->email }}">
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Boy phone</label>
                <input type="text" name="phone" id="name"
                    class="form-input rounded-md w-full @error('name') border-red-500 @enderror"
                    value="{{ $boy->phone }}">
                @error('phone')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Boy address</label>
                <input type="text" name="address" id="name"
                    class="form-input rounded-md w-full @error('name') border-red-500 @enderror"
                    value="{{ $boy->address }}">
                @error('address')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800">Add
                    Boy</button>
                <a href="{{ route('boys.index') }}" class="text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>


</body>

</html>
