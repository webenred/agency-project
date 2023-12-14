<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination\Paginator;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\User;
class HotelController extends Controller
{
    public function index(Request $request)
    {
        $limit = 10;
        if ($request->query('limit')) $limit = $request->limit;

        return view('admin.manage-hotels', [
            'hotels' => Hotel::paginate($limit)
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
