@extends('layouts.app')

@section('title', 'Edit Booking')

@section('content')
<div class="mb-6">
    <a href="{{ route('bookings.index') }}" class="text-pink-600 hover:text-pink-900">
        <i class="fas fa-arrow-left mr-2"></i> Back to Bookings
    </a>
</div>

<div class="bg-white rounded-lg shadow-xl p-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">
        <i class="fas fa-edit text-pink-600"></i> Edit Booking #{{ $booking->id }}
    </h1>

    <form action="{{ route('bookings.update', $booking) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label for="guest_id" class="block text-sm font-medium text-gray-700 mb-2">Guest *</label>
                <select name="guest_id" id="guest_id" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 @error('guest_id') border-red-500 @enderror" required>
                    @foreach($guests as $guest)
                        <option value="{{ $guest->id }}" {{ old('guest_id', $booking->guest_id) == $guest->id ? 'selected' : '' }}>
                            {{ $guest->full_name }} ({{ $guest->email }})
                        </option>
                    @endforeach
                </select>
                @error('guest_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label for="apartment_house_id" class="block text-sm font-medium text-gray-700 mb-2">Apartment House *</label>
                <select name="apartment_house_id" id="apartment_house_id" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 @error('apartment_house_id') border-red-500 @enderror" required>
                    @foreach($apartmentHouses as $apartment)
                        <option value="{{ $apartment->id }}" data-price="{{ $apartment->price_per_night }}" {{ old('apartment_house_id', $booking->apartment_house_id) == $apartment->id ? 'selected' : '' }}>
                            {{ $apartment->name }} - ${{ number_format($apartment->price_per_night, 2) }}/night (Max: {{ $apartment->max_guests }} guests)
                        </option>
                    @endforeach
                </select>
                @error('apartment_house_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="check_in_date" class="block text-sm font-medium text-gray-700 mb-2">Check-in Date *</label>
                <input type="date" name="check_in_date" id="check_in_date" value="{{ old('check_in_date', $booking->check_in_date->format('Y-m-d')) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 @error('check_in_date') border-red-500 @enderror" required>
                @error('check_in_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="check_out_date" class="block text-sm font-medium text-gray-700 mb-2">Check-out Date *</label>
                <input type="date" name="check_out_date" id="check_out_date" value="{{ old('check_out_date', $booking->check_out_date->format('Y-m-d')) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 @error('check_out_date') border-red-500 @enderror" required>
                @error('check_out_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="number_of_guests" class="block text-sm font-medium text-gray-700 mb-2">Number of Guests *</label>
                <input type="number" name="number_of_guests" id="number_of_guests" value="{{ old('number_of_guests', $booking->number_of_guests) }}" min="1"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 @error('number_of_guests') border-red-500 @enderror" required>
                @error('number_of_guests')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="total_price" class="block text-sm font-medium text-gray-700 mb-2">Total Price ($) *</label>
                <input type="number" name="total_price" id="total_price" value="{{ old('total_price', $booking->total_price) }}" step="0.01" min="0"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 @error('total_price') border-red-500 @enderror" required>
                @error('total_price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                <select name="status" id="status" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 @error('status') border-red-500 @enderror" required>
                    <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ old('status', $booking->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ old('status', $booking->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    <option value="completed" {{ old('status', $booking->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                <textarea name="notes" id="notes" rows="3" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 @error('notes') border-red-500 @enderror">{{ old('notes', $booking->notes) }}</textarea>
                @error('notes')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('bookings.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-lg transition duration-300">
                Cancel
            </a>
            <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">
                <i class="fas fa-save mr-2"></i> Update Booking
            </button>
        </div>
    </form>
</div>

<script>
    // Auto-calculate total price based on dates and apartment selection
    document.addEventListener('DOMContentLoaded', function() {
        const checkInInput = document.getElementById('check_in_date');
        const checkOutInput = document.getElementById('check_out_date');
        const apartmentSelect = document.getElementById('apartment_house_id');
        const totalPriceInput = document.getElementById('total_price');

        function calculatePrice() {
            const checkIn = new Date(checkInInput.value);
            const checkOut = new Date(checkOutInput.value);
            const selectedOption = apartmentSelect.options[apartmentSelect.selectedIndex];
            
            if (checkInInput.value && checkOutInput.value && selectedOption.dataset.price) {
                const nights = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
                const pricePerNight = parseFloat(selectedOption.dataset.price);
                
                if (nights > 0) {
                    totalPriceInput.value = (nights * pricePerNight).toFixed(2);
                }
            }
        }

        checkInInput.addEventListener('change', calculatePrice);
        checkOutInput.addEventListener('change', calculatePrice);
        apartmentSelect.addEventListener('change', calculatePrice);
    });
</script>
@endsection
