<?php

namespace App\Livewire;

use App\Models\Truck;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Units extends Component
{
    use WithPagination;
    use WithFileUploads;



    public $searchengine, $drivers, $unit, $name, $selected_id;
    public $confirmingUserDeletion, $Edits, $user_id;
    public $userDeleted;
    public function mount()
    {
        $this->drivers = User::query()->role('driver')->get(); // Adjusted to use a query builder

        $this->confirmingUserDeletion = false;
        $this->userDeleted = false;
    }

    public function render()
    {

        $query = Truck::with('driver');
        $query = Truck::query();

        $users = User::all();

        if ($this->searchengine) {
            $query = $query->where('unit', 'like', '%' . $this->searchengine . '%')
                ->orWhere('user_id', 'like', '%' . $this->searchengine . '%');
        }

        $trucks = $query->paginate(10);
        return view('livewire.units.units', compact('trucks', 'users'));
    }


    public function Edit($id)
    {
        $record = Truck::findOrFail($id); // Usar findOrFail para obtener el camión o lanzar un error si no existe.
        $this->unit = $record->unit;
        $this->user_id = $record->user_id; // Asegúrate de que esta propiedad exista y esté definida en tu componente Livewire.
        $this->selected_id = $record->id;
        $this->Edits = true; // Esta línea abrirá el modal.
    }



    public function deletingUser($id)
    {
        $record = Truck::find($id, ['unit', 'user_id']);
        $this->unit = $record->unit;
        $this->name = $record->name;
        $this->selected_id = $record->id;
        $this->confirmingUserDeletion = true;
    }
    public function deleteUser()
    {
        $this->userDeleted = true;
        $this->confirmingUserDeletion = false;
    }
}
