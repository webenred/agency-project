<?php

namespace App\Livewire;

use Livewire\Component;
// use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Rule;
use App\Models\Hotel;
use App\Models\HotelAsset;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreateHotel extends Component
{
    public string $name;

    public string $description = "la description de l'hotel ";

    public string $country = "Algeria";

    public string $city;

    public string $address;

    public array $coordinates;

    public int $rating;

    public int $nb_rooms;

    public string $services;

    public array $assets;


    public function save()
    {
        $this->validate([
            'name' => ['required', 'min:2'],
            'description' => ['required', 'min:10'],
            'address' => ['required', 'min:5'],
            'country' => ['required'],
            'city' => ['required'],
            'coordinates' => ['required', 'array'],
            'coordinates.phone' => ['required', 'string'],
            'coordinates.email' => ['required', 'string'],
            'rating' => ['required', 'integer'],
            'nb_rooms' => ['required', 'integer'],
            'services' => ['required'],
            'assets' => ['required', 'array', 'min:1'],
            'assets.*' => ['required', 'image', 'mimes:jpg,svg,png,jpeg']
        ]);

        // dd($this, json_encode(explode(',', $this->services)), $this->rating);

        $hotel = Hotel::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'coordinates' => json_encode($this->coordinates),
            'classification' => $this->rating,
            'number_rooms' => $this->nb_rooms,
            'services' => json_encode(explode(',', $this->services))
        ]);

        return redirect(route('admin.hotels'))
            ->with('status', 'Hotel créer avec succès.');
    }

    public function render()
    {
        return view('livewire.create-hotel', [
            'hotelServices' => Storage::json('public/data/hotel_services.json'),
            'countries' => Storage::json('public/data/country_info.json'),
        ]);
    }
}
