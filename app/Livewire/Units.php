<?php

namespace App\Livewire;

use App\Models\Truck;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Units extends Component
{
    use WithPagination;

    public $searchengine, $drivers, $unit, $name, $selected_id;
    public $confirmingUserDeletion;
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

        if ($this->searchengine) {
            $query = $query->where('unit', 'like', '%' . $this->searchengine . '%')
                ->orWhere('user_id', 'like', '%' . $this->searchengine . '%');
        }

        $trucks = $query->paginate(10);
        return view('livewire.units.units', compact('trucks'));
    }


    public function Edit($id)
    {
        $record = Truck::find($id, ['unit', 'user_id']);
        $this->unit = $record->unit;
        $this->name = $record->name;
        $this->selected_id = $record->id;
        $this->confirmingUserDeletion = true;
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
