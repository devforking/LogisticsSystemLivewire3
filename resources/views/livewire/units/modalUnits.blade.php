<x-dialog-modal wire:model="Adds">
    <x-slot name="title">
        Add Truck
    </x-slot>

    <x-slot name="content">
        <form class="">
            <div class="flex">
                <div class="w-1/2 mr-4">
                    <x-label class="mb-2" for="unit">Truck Unit</x-label>
                    <x-input class="mb-2 w-full" id="unit" type="text" wire:model="unit" />
                    @error('unit')
                        <span class="text-red-500 er">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-1/2">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="user_id">Driver</label>
                    <select
                        class="mb-2 bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="user_id" wire:model="user_id">
                        <option value="" disabled>Choose Driver...</option>
                        @foreach ($drivers as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $this->user_id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-red-500 er">{{ $message }}</span>
                    @enderror
                </div>
            </div>




            <div class="col-sm-12 mt-1">
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        type="file" wire:model="image" id="formFile">
                </div>


                @if ($selected_id > 0 && !$image)
                    <img src="{{ asset('storage/' . $currentImage) }}" alt="example" height="70" width="80"
                        class="rounded">
                @elseif($image)
                    <img height="270" width="280" src="{{ $image->temporaryUrl() }}">
                @endif




                @error('image')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror


            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$set('Edits', false)" wire:loading.attr="disabled">
            Cancel
        </x-secondary-button>

        <x-danger-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
            Create
        </x-danger-button>
    </x-slot>
</x-dialog-modal>




<x-dialog-modal wire:model="Edits">
    <x-slot name="title">
        Edit Truck
    </x-slot>

    <x-slot name="content">
        <form class="">
            <div class="flex">
                <div class="w-1/2 mr-4">
                    <x-label class="mb-2" for="unit">Truck Unit</x-label>
                    <x-input class="mb-2 w-full" id="unit" type="text" wire:model="unit" />
                </div>

                <div class="w-1/2">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="user_id">Driver</label>
                    <select
                        class="mb-2 bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="user_id" wire:model="user_id">
                        <option value="" disabled>Choose Driver...</option>
                        @foreach ($drivers as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $this->user_id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger er">{{ $message }}</span>
                    @enderror
                </div>
            </div>




            <div class="col-sm-12 mt-1">
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        type="file" wire:model="image" id="formFile">
                </div>


                @if ($selected_id > 0 && !$image)
                    <img src="{{ asset('storage/' . $currentImage) }}" alt="example" height="270" width="280"
                        class="rounded">
                @elseif($image)
                    <img height="270" width="280" src="{{ $image->temporaryUrl() }}">
                @endif




                @error('image')
                    <span class="error">{{ $message }}</span>
                @enderror


            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$set('Edits', false)" wire:loading.attr="disabled">
            Cancel
        </x-secondary-button>

        <x-danger-button class="ml-2" wire:click="Update" wire:loading.attr="disabled">
            Save Changes
        </x-danger-button>
    </x-slot>
</x-dialog-modal>



<x-confirmation-modal wire:model="confirmingUserDeletion">
    <x-slot name="title">
        Delete
    </x-slot>

    <x-slot name="content">
        Are you sure you want to delete this Truck? {{ $unit }}

        <td class="w-1/3 text-left py-3 px-4">{{ $unit }}</td>

    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
            Nevermind
        </x-secondary-button>

        <x-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
            Delete Account
        </x-danger-button>
    </x-slot>
</x-confirmation-modal>
