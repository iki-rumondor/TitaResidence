<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('houses.index', [
            'title' => 'Daftar Rumah',
            'houses' => House::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('houses.create', [
            'title' => 'Tambah Rumah',
            'houses' => House::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "model" => "required",
            "price" => "required|integer",
            "size" => "required|integer",
            "bedrooms" => "required|integer",
            "bathrooms" => "required|integer",
            "image" => "required|image|file",
        ]);

        $validatedData['image'] = $request->file('image')->store('house-image');
        $validatedData['status'] = 'Dijual';
        House::create($validatedData);

        return \redirect('/admin/houses')->with('success', 'Berhasil menambahkan data rumah baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(House $house)
    {
        return view('houses.edit', [
            'title' => 'Edit Rumah',
            'house' => $house
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, House $house)
    {
        $validatedData = $request->validate([
            "model" => "required",
            "price" => "required|integer",
            "size" => "required|integer",
            "bedrooms" => "required|integer",
            "bathrooms" => "required|integer",
            "image" => "image|file",
        ]);

        if ($request->file('image')) {
            if ($house->image) Storage::delete($house->image);
            $validatedData['image'] = $request->file('image')->store('house-image');
        }

        $house->update($validatedData);
        return \redirect('/admin/houses')->with('success', 'Berhasil mengubah data rumah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(House $house)
    {
        if ($house->image) {
            Storage::delete($house->image);
        }

        $house->destroy($house->id);
        return \back()->with('success', 'Berhasil menghapus data rumah');
    }
}
