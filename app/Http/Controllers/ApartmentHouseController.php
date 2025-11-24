<?php

namespace App\Http\Controllers;

use App\Models\ApartmentHouse;
use Illuminate\Http\Request;

class ApartmentHouseController extends Controller
{
    public function index()
    {
        $apartmentHouses = ApartmentHouse::latest()->paginate(10);
        return view('apartment-houses.index', compact('apartmentHouses'));
    }

    public function create()
    {
        return view('apartment-houses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'number_of_rooms' => 'required|integer|min:1',
            'max_guests' => 'required|integer|min:1',
            'price_per_night' => 'required|numeric|min:0',
            'is_available' => 'boolean',
        ]);

        ApartmentHouse::create($validated);

        return redirect()->route('apartment-houses.index')
            ->with('success', 'Apartment house created successfully!');
    }

    public function show(ApartmentHouse $apartmentHouse)
    {
        $apartmentHouse->load('bookings.guest');
        return view('apartment-houses.show', compact('apartmentHouse'));
    }

    public function edit(ApartmentHouse $apartmentHouse)
    {
        return view('apartment-houses.edit', compact('apartmentHouse'));
    }

    public function update(Request $request, ApartmentHouse $apartmentHouse)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'number_of_rooms' => 'required|integer|min:1',
            'max_guests' => 'required|integer|min:1',
            'price_per_night' => 'required|numeric|min:0',
            'is_available' => 'boolean',
        ]);

        $apartmentHouse->update($validated);

        return redirect()->route('apartment-houses.index')
            ->with('success', 'Apartment house updated successfully!');
    }

    public function destroy(ApartmentHouse $apartmentHouse)
    {
        $apartmentHouse->delete();

        return redirect()->route('apartment-houses.index')
            ->with('success', 'Apartment house deleted successfully!');
    }
}
