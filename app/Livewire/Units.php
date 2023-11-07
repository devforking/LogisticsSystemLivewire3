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



    public $searchengine, $drivers, $unit, $name, $selected_id, $image;
    public $confirmingUserDeletion, $Edits, $user_id, $Adds;
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

        $trucks = $query->paginate(100);
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

    public function Add()
    {

        $this->Adds = true; // Esta línea abrirá el modal.
    }

    public function create()
    {
        $this->validate([
            'unit' => 'required|string|max:255', // Solo como ejemplo, ajusta según tus necesidades
            'image' => 'nullable|image|max:2048', // Haciendo la imagen opcional
            'user_id' => 'required',

        ]);

        // Verificar si la imagen está presente
        $imagePath = $this->image
            ? $this->image->store('trucks', 'public') // Aquí especificamos el disco 'public'
            : null; // Si no hay imagen, asignamos null


        Truck::create([
            'unit' => $this->unit,
            'image' => $imagePath,
            'user_id' => $this->user_id,

        ]);
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
        $truck = Truck::find($this->selected_id);

        if ($truck) {
            $truck->delete();
            $this->userDeleted = true;
        } else {
            // Manejar el caso de que el camión no se encuentre
            $this->userDeleted = false;
            session()->flash('message', 'Truck not found.'); // Ejemplo de manejo de error
        }

        $this->confirmingUserDeletion = false;
    }
}
