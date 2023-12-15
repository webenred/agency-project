<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination\Paginator;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    public function index()
    {
        return view('admin.manage-hotels', [
            'hotels' => Hotel::paginate(5),
        ]);
    }

    public function create()
    {
        return view('admin.create-hotel');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:2', 'unique:' . Hotel::class],
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
            'assets' => ['required', 'array', 'min:1', 'max:6'],
            'assets.*' => ['required', 'image', 'mimes:jpg,svg,png,jpeg', 'max:2048']
        ]);

        $hotel = Hotel::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'coordinates' => json_encode([
                'phone' => $request->phone_code . $request->coordinates['phone'],
                'email' => $request->coordinates['email']
            ]),
            'classification' => $request->rating,
            'number_rooms' => $request->nb_rooms,
            'services' => json_encode(explode(',', $request->services))
        ]);

        $assets = $request->file('assets');

        for ($i = 0; $i < sizeof($assets); $i++) {
            $hotel->assets()->create([
                'type' => 'image',
                'path' => $assets[$i]->store('public/hotels'),
            ]);
        }

        return redirect(route('admin.hotel.show', ['id' => $hotel->id]))->with('status', 'Hôtel créer avec succés');
    }

    public function show($id)
    {
        return view('admin.manage-hotels', [
            'hotels' => Hotel::where('id', $id)->get()
        ]);
    }

    public function edit($id)
    {
        return view('admin.edit-hotel', [
            'hotel' => Hotel::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);
        $request->validate([
            'name' => ['required', 'min:2', 'unique:hotels,name,' . $hotel->id],
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
            // 'assets' => ['required', 'array', 'min:1'],
            // 'assets.*' => ['required', 'image', 'mimes:jpg,svg,png,jpeg']
        ]);

        $hotel->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'coordinates' => json_encode([
                'phone' => $request->phone_code . $request->coordinates['phone'],
                'email' => $request->coordinates['email']
            ]),
            'classification' => $request->rating,
            'number_rooms' => $request->nb_rooms,
            'services' => json_encode(explode(',', $request->services))
        ]);

        return redirect(route('admin.hotel.show', ['id' => $hotel->id]))->with('status', 'Hôtel créer avec succés');
    }


    public function delete($id)
    {
        Hotel::where('id', $id)->first()->delete();
        return redirect(route('admin.hotels'))->with('status', 'Hôtel supprimer avec succés');
    }
}
