@extends('layouts.app')

@section('title', 'Guest Details')

@section('content')
<div class="mb-6">
    <a href="{{ route('guests.index') }}" class="text-indigo-600 hover:text-indigo-900">
        <i class="fas fa-arrow-left mr-2"></i> Back to Guests
    </a>
</div>

<div class="bg-white rounded-lg shadow-xl p-6 mb-6">
    <div class="flex justify-between items-start mb-6">
        <h1 class="text-2xl font-bold text-gray-900">
            <i class="fas fa-user text-indigo-600"></i> {{ $guest->full_name }}
        </h1>
        <div class="space-x-2">
            <a href="{{ route('guests.edit', $guest) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('guests.destroy', $guest) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300" onclick="return confirm('Are you sure?')">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="text-sm font-medium text-gray-500 mb-1">Email</h3>
            <p class="text-lg text-gray-900">{{ $guest->email }}</p>
        </div>
        <div>
            <h3 class="text-sm font-medium text-gray-500 mb-1">Phone</h3>
            <p class="text-lg text-gray-900">{{ $guest->phone ?? 'N/A' }}</p>
        </div>
        <div>
            <h3 class="text-sm font-medium text-gray-500 mb-1">ID Number</h3>
            <p class="text-lg text-gray-900">{{ $guest->id_number ?? 'N/A' }}</p>
        </div>
        <div>
            <h3 class="text-sm font-medium text-gray-500 mb-1">Registered</h3>
            <p class="text-lg text-gray-900">{{ $guest->created_at->format('M d, Y') }}</p>
        </div>
        @if($guest->address)
        <div class="md:col-span-2">
            <h3 class="text-sm font-medium text-gray-500 mb-1">Address</h3>
            <p class="text-lg text-gray-900">{{ $guest->address }}</p>
        </div>
        @endif
    </div>
</div>

<!-- Bookings Section -->
<div class="bg-white rounded-lg shadow-xl p-6">
    <h2 class="text-xl font-bold text-gray-900 mb-4">
        <i class="fas fa-calendar-check text-indigo-600"></i> Booking History
    </h2>

    @if($guest->bookings->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Apartment</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check In</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check Out</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($guest->bookings as $booking)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $booking->apartmentHouse->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $booking->check_in_date->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $booking->check_out_date->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    @if($booking->status == 'confirmed') bg-green-100 text-green-800
                                    @elseif($booking->status == 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($booking->status == 'cancelled') bg-red-100 text-red-800
                                    @else bg-blue-100 text-blue-800
                                    @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                ${{ number_format($booking->total_price, 2) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500 text-center py-8">No bookings found for this guest.</p>
    @endif
</div>
@endsection
