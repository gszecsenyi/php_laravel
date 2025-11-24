<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::latest()->paginate(10);
        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        return view('guests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:guests,email',
            'phone' => 'nullable|string|max:20',
            'id_number' => 'nullable|string|max:50',
            'address' => 'nullable|string',
        ]);

        Guest::create($validated);

        return redirect()->route('guests.index')
            ->with('success', 'Guest created successfully!');
    }

    public function show(Guest $guest)
    {
        $guest->load('bookings.apartmentHouse');
        return view('guests.show', compact('guest'));
    }

    public function edit(Guest $guest)
    {
        return view('guests.edit', compact('guest'));
    }

    public function update(Request $request, Guest $guest)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:guests,email,' . $guest->id,
            'phone' => 'nullable|string|max:20',
            'id_number' => 'nullable|string|max:50',
            'address' => 'nullable|string',
        ]);

        $guest->update($validated);

        return redirect()->route('guests.index')
            ->with('success', 'Guest updated successfully!');
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();

        return redirect()->route('guests.index')
            ->with('success', 'Guest deleted successfully!');
    }
}
