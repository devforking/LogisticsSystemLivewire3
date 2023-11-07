<?php

namespace App\Livewire;

use App\Models\Truck;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Units extends Component
{
    use WithPagination;

    public $searchengine, $drivers;

    public function mount()
    {
        $this->drivers = User::query()->role('driver')->get(); // Adjusted to use a query builder
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
        return view('livewire.units', compact('trucks'));
    }
}
