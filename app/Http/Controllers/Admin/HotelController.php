<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::get();
        return view('admin.manage-hotels', [
            'hotels' => $hotels
        ]);
    }

    public function show($id)
    {
        return Hotel::find($id);
    }

    public function create()
    {
        
        return view('admin.create-hotel');
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }


    public function delete($id)
    {
        Hotel::where('id', $id)->first()->delete();
        return redirect(route('admin.hotels'))->with('status', 'Hôtel supprimer avec succés');
    }
}
