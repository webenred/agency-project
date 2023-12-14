<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
class EditHotel extends Component
{

    public $hotel;

    public string $name;

    public string $description;

    public string $country;

    public string $city;

    public string $address;

    public array $coordinates;

    public int $rating;

    public int $nb_rooms;

    public string $services;

    public function mount($hotel)
    {
        $this->hotel = $hotel;
        $this->name = $hotel->name;
        $this->description = $hotel->description;
        $this->country = $hotel->country;
        $this->city = $hotel->city;
        $this->address = $hotel->address;
        $this->coordinates = json_decode($hotel->coordinates, true);
        $this->rating = $hotel->classification;
        $this->nb_rooms = (int)$hotel->nb_rooms;
        $this->services = $hotel->services;
    }


    public function render()
    {
        return view('livewire.edit-hotel', [
            'hotelServices' => Storage::json('public/data/hotel_services.json'),
            'countries' => Storage::json('public/data/country_info.json'),
        ]);
    }
}
