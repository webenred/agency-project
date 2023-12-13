<?php

namespace App\Livewire;

use Livewire\Component;

class DisplayHotels extends Component
{
    public $hotels;

        public function mount($hotels)
    {
        $this->hotels = $hotels;
    }

    public function delete($id) {

    }

    public function render()
    {
        return view('livewire.display-hotels');
    }
}
