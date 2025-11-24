<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Guest;
use App\Models\ApartmentHouse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['guest', 'apartmentHouse'])->latest()->paginate(10);
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $guests = Guest::orderBy('first_name')->get();
        $apartmentHouses = ApartmentHouse::where('is_available', true)->orderBy('name')->get();
        return view('bookings.create', compact('guests', 'apartmentHouses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'apartment_house_id' => 'required|exists:apartment_houses,id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'number_of_guests' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'notes' => 'nullable|string',
        ]);

        Booking::create($validated);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking created successfully!');
    }

    public function show(Booking $booking)
    {
        $booking->load(['guest', 'apartmentHouse']);
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $guests = Guest::orderBy('first_name')->get();
        $apartmentHouses = ApartmentHouse::orderBy('name')->get();
        return view('bookings.edit', compact('booking', 'guests', 'apartmentHouses'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'apartment_house_id' => 'required|exists:apartment_houses,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'number_of_guests' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'notes' => 'nullable|string',
        ]);

        $booking->update($validated);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking deleted successfully!');
    }
}
