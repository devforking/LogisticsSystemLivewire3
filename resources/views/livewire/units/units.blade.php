<div>

    <form>
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input wire:model.live='searchengine' type="search" id="default-search"
                class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search" required>
        </div>
    </form>


    <div class="bg-white overflow-auto mt-5 rounded">
        <table class="min-w-full bg-white rounded">
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
                        <td class="w-1/3 text-left py-3 px-4">{{ $truck->driver->name }}</td>

                        <td class=""><span><img src="{{ asset('storage/' . $truck->image) }}" alt="example"
                                    height="70" width="80" class="rounded"></span>
                        </td>

                        <td class="text-center">


                            <button type="button" href="javascript:void(0)"
                                class="inline-block px-6 py-2 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out mt-2 lg:mt-0"
                                title="Edit" wire:click="Edit({{ $truck->id }})">
                                @svg('pen', 'w-6 h-6')
                            </button>

                            <button type="button" href="javascript:void(0)"
                                class="inline-block px-6 py-2 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                title="Delete" wire:click="deletingUser({{ $truck->id }})">
                                @svg('trash', 'w-6 h-6')
                            </button>




                            {{-- {{ $category->image }} --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>


        </table>

        @include('livewire.units.modalUnits')
    </div>
</div>
