@extends('layouts.app')

@section('title', 'Booking Details')

@section('content')
<div class="mb-6">
    <a href="{{ route('bookings.index') }}" class="text-pink-600 hover:text-pink-900">
        <i class="fas fa-arrow-left mr-2"></i> Back to Bookings
    </a>
</div>

<div class="bg-white rounded-lg shadow-xl p-6">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 mb-2">
                <i class="fas fa-calendar-check text-pink-600"></i> Booking #{{ $booking->id }}
            </h1>
            <span class="px-3 py-1 text-sm font-semibold rounded-full 
                @if($booking->status == 'confirmed') bg-green-100 text-green-800
                @elseif($booking->status == 'pending') bg-yellow-100 text-yellow-800
                @elseif($booking->status == 'cancelled') bg-red-100 text-red-800
                @else bg-blue-100 text-blue-800
                @endif">
                {{ ucfirst($booking->status) }}
            </span>
        </div>
        <div class="space-x-2">
            <a href="{{ route('bookings.edit', $booking) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300" onclick="return confirm('Are you sure?')">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Guest Information -->
        <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-user text-indigo-600 mr-2"></i> Guest Information
            </h2>
            <div class="space-y-3">
                <div>
                    <p class="text-sm text-gray-500">Name</p>
                    <a href="{{ route('guests.show', $booking->guest) }}" class="text-lg font-medium text-indigo-600 hover:text-indigo-900">
                        {{ $booking->guest->full_name }}
                    </a>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="text-lg text-gray-900">{{ $booking->guest->email }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Phone</p>
                    <p class="text-lg text-gray-900">{{ $booking->guest->phone ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Apartment Information -->
        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-hotel text-purple-600 mr-2"></i> Apartment Information
            </h2>
            <div class="space-y-3">
                <div>
                    <p class="text-sm text-gray-500">Name</p>
                    <a href="{{ route('apartment-houses.show', $booking->apartmentHouse) }}" class="text-lg font-medium text-purple-600 hover:text-purple-900">
                        {{ $booking->apartmentHouse->name }}
                    </a>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Address</p>
                    <p class="text-lg text-gray-900">{{ $booking->apartmentHouse->address }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Price per Night</p>
                    <p class="text-lg font-bold text-purple-600">${{ number_format($booking->apartmentHouse->price_per_night, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Booking Details -->
        <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-lg p-6 md:col-span-2">
            <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-info-circle text-pink-600 mr-2"></i> Booking Details
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <p class="text-sm text-gray-500">Check-in Date</p>
                    <p class="text-lg font-medium text-gray-900">
                        <i class="fas fa-calendar-alt text-pink-600 mr-2"></i>
                        {{ $booking->check_in_date->format('M d, Y') }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Check-out Date</p>
                    <p class="text-lg font-medium text-gray-900">
                        <i class="fas fa-calendar-alt text-pink-600 mr-2"></i>
                        {{ $booking->check_out_date->format('M d, Y') }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Number of Nights</p>
                    <p class="text-lg font-medium text-gray-900">
                        <i class="fas fa-moon text-pink-600 mr-2"></i>
                        {{ $booking->check_in_date->diffInDays($booking->check_out_date) }} nights
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Number of Guests</p>
                    <p class="text-lg font-medium text-gray-900">
                        <i class="fas fa-users text-pink-600 mr-2"></i>
                        {{ $booking->number_of_guests }} guest{{ $booking->number_of_guests > 1 ? 's' : '' }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Price</p>
                    <p class="text-2xl font-bold text-pink-600">
                        ${{ number_format($booking->total_price, 2) }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Booked On</p>
                    <p class="text-lg text-gray-900">{{ $booking->created_at->format('M d, Y') }}</p>
                </div>
            </div>

            @if($booking->notes)
                <div class="mt-6 pt-6 border-t border-pink-200">
                    <p class="text-sm text-gray-500 mb-2">Notes</p>
                    <p class="text-gray-900">{{ $booking->notes }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
