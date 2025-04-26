<table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
    <thead class="bg-gray-200">
        <tr>
            <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-700 font-semibold">Product Name</th>
            <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-700 font-semibold">Product Price</th>
        </tr>
    </thead>
    <tbody>
        <tr class="hover:bg-gray-100">
            <td class="py-2 px-4 border-b border-gray-300">{{ $product['name'] }}</td>
            <td class="py-2 px-4 border-b border-gray-300">${{ $product['price'] }}</td>
        </tr>
    </tbody>
</table>