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
            <h1 class="text-2xl font-bold mb-4">Product List</h1>
            <a href="{{ route('products.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Product</a>
        </div>

        @if (count($products) > 0)
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 font-semibold text-sm text-gray-700 border-b">Product Name</th>
                        <th class="py-2 px-4 font-semibold text-sm text-gray-700 border-b">Description</th>
                        <th class="py-2 px-4 font-semibold text-sm text-gray-700 border-b">Price</th>
                        <th class="py-2 px-4 font-semibold text-sm text-gray-700 border-b">Image</th>
                        <th class="py-2 px-4 font-semibold text-sm text-gray-700 border-b">Quantity</th>
                        <th class="py-2 px-4 font-semibold text-sm text-gray-700 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->description }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->price }}</td>
                            <td class="py-2 px-4 border-b">
                                <img style="height: 100px; width: 100px;" src="{{ asset($product->image) }}"
                                    alt="Product Image" class="w-16 h-16">
                            </td>
                            <td class="py-2 px-4 border-b">{{ $product->quantity }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                        onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        @else
            <tr>
                <td colspan="6">
                    <h1>Product Not Available</h1>
                </td>
            </tr>
        @endif

    </div>
</body>

</html>
