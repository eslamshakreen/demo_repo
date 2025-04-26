<form action="{{ route('products.store') }}" method="POST" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-bold mb-2">Product Name:</label>
        <input type="text" id="name" name="name" required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="mb-4">
        <label for="price" class="block text-gray-700 font-bold mb-2">Product Price:</label>
        <input type="number" id="price" name="price" required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <button type="submit"
        class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Add
        Product</button>
</form>