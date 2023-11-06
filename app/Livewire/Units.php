<?php

namespace App\Livewire;

use App\Models\Truck;
use Livewire\Component;
use Livewire\WithPagination;

class Units extends Component
{
    use WithPagination;

    public $searchengine, $driver;
    public function render()
    {
        $query = Truck::query();

        if ($this->searchengine) {
            $query = $query->where('unit', 'like', '%' . $this->searchengine . '%')
                ->orWhere('driver', 'like', '%' . $this->searchengine . '%');
        }

        $trucks = $query->paginate(10);
        return view('livewire.units', compact('trucks'));
    }
}
