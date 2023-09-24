<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>

<body class="bg-gray-100 p-4">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Product Details</h1>

        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <img style="height: 300px; width: 300px;" src="{{ asset($product->image) }}" alt="Product Image"
                    class="w-64 h-64 mx-auto">
            </div>
            <div class="text-center">
                <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                <p class="text-gray-600">{{ $product->description }}</p>
                <p class="text-gray-700">Price: ${{ $product->price }}</p>
                <p class="text-gray-700">Quantity: {{ $product->quantity }}</p>
            </div>
            <div class="mt-6 text-center">
                <a href="{{ route('products.index') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cencle</a>
                <a href="{{ route('products.edit', $product->id) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                        onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
