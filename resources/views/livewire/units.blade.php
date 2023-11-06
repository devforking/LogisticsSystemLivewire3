<div>
    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Truck</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Driver
                    </th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Image</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">
                @foreach ($trucks as $truck)
                    <tr>


                        <td class="w-1/3 text-left py-3 px-4">{{ $truck->unit }}</td>
                        <td class="w-1/3 text-left py-3 px-4">{{ $truck->driver }}</td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500">{{ $truck->image }}</a>
                        </td>
                        <td class="text-center">
                            <a href="javascript:void(0)"
                                class="inline-block px-6 py-2 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out mt-2 lg:mt-0"
                                title="Edit" wire:click="Edit({{ $truck->id }})">
                                @svg('pen', 'w-6 h-6')
                            </a>

                            <a href="javascript:void(0)"
                                class="inline-block px-6 py-2 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out"
                                title="Delete" wire:click="delete({{ $truck->id }})">
                                @svg('trash', 'w-6 h-6')
                            </a>




                            {{-- {{ $category->image }} --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>


        </table>
    </div>
</div>
