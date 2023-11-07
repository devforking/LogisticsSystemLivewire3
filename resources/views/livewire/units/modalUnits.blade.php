<x-confirmation-modal wire:model="confirmingUserDeletion">
    <x-slot name="title">
        Delete
    </x-slot>

    <x-slot name="content">
        Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will
        be permanently deleted.

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


<x-dialog-modal wire:model="Edits">
    <x-slot name="title">
        Edit Truck
    </x-slot>

    <x-slot name="content">
        <form>
            <div>
                <label for="unit">Truck Unit:</label>

                <x-input id="unit" type="text" wire:model="unit" />

            </div>

            <div class="form-group">
                <label for="user_id">Driver:</label>
                <select class="form-select" id="user_id" wire:model="user_id">
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
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$set('Edits', false)" wire:loading.attr="disabled">
            Cancel
        </x-secondary-button>

        <x-danger-button class="ml-2" wire:click="updateTruck" wire:loading.attr="disabled">
            Save Changes
        </x-danger-button>
    </x-slot>
</x-dialog-modal>


<x-dialog-modal wire:model="Adds">
    <x-slot name="title">
        Add Truck
    </x-slot>

    <x-slot name="content">
        <form>
            <div>
                <label for="unit">Truck Unit:</label>

                <x-input id="unit" type="text" wire:model="unit" />

            </div>

            <div class="form-group">
                <label for="user_id">Driver:</label>
                <select class="form-select" id="user_id" wire:model="user_id">
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


            <div class="col-sm-12 mt-1">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" wire:model="image" id="formFile">
                </div>


                @if ($selected_id > 0 && !$image)
                    <img src="{{ asset('storage/' . $currentImage) }}" alt="example" height="70" width="80"
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

        <x-danger-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
            Create
        </x-danger-button>
    </x-slot>
</x-dialog-modal>
