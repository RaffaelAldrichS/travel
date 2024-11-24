{{-- @dd($data) --}}
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-4">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            @if ($hasImageColumn)
                <th scope="col" class="px-4 py-3">Image</th>
            @endif
            @foreach ($columns as $column)
                <th scope="col" class="px-4 py-3">{{ $column }}</th>
            @endforeach
            <th scope="col" class="px-4 py-3"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr class="border-b dark:border-gray-700">
                @if ($hasImageColumn)
                    <td class="px-4 py-3">
                        <img src="storage/images/destinations/{{ $item['image'] }}" alt="Image"
                            class="w-12 h-12 object-cover rounded">
                    </td>
                @endif
                @foreach ($columns as $column)
                    <td class="px-4 py-3 text-white">
                        @if ($column == 'entrance_fee')
                            {{ 'Rp ' . number_format($item[$column], 0, ',', '.') }}
                        @else
                            {{ $item[$column] }}
                        @endif
                    </td>
                @endforeach
                <td class="px-4 py-3 flex items-center justify-end">
                    <button id="apple-imac-27-dropdown-button-{{ $item['id'] }}"
                        data-dropdown-toggle="apple-imac-27-dropdown-{{ $item['id'] }}"
                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                        type="button">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                        </svg>
                    </button>
                    <div id="apple-imac-27-dropdown-{{ $item['id'] }}"
                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="apple-imac-27-dropdown-button">
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                            </li>
                            <li>
                                <a href="{{ route($routePrefix . '.edit', $item['id']) }}"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <form action="{{ route('destinations.destroy', $item['id']) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="block w-full text-left py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
