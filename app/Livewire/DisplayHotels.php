<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Hotel;
class DisplayHotels extends Component
{
    public function render()
    {
        return view('livewire.display-hotels', [
            'hotels' => Hotel::paginate(3)
        ]);
    }
}
