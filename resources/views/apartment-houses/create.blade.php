@extends('layouts.app')

@section('title', 'Add New Apartment')

@section('content')
<div class="mb-6">
    <a href="{{ route('apartment-houses.index') }}" class="text-purple-600 hover:text-purple-900">
        <i class="fas fa-arrow-left mr-2"></i> Back to Apartments
    </a>
</div>

<div class="bg-white rounded-lg shadow-xl p-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">
        <i class="fas fa-plus text-purple-600"></i> Add New Apartment House
    </h1>

    <form action="{{ route('apartment-houses.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 @error('name') border-red-500 @enderror" required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                <textarea name="address" id="address" rows="2" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 @error('address') border-red-500 @enderror" required>{{ old('address') }}</textarea>
                @error('address')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="3" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="number_of_rooms" class="block text-sm font-medium text-gray-700 mb-2">Number of Rooms *</label>
                <input type="number" name="number_of_rooms" id="number_of_rooms" value="{{ old('number_of_rooms', 1) }}" min="1"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 @error('number_of_rooms') border-red-500 @enderror" required>
                @error('number_of_rooms')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="max_guests" class="block text-sm font-medium text-gray-700 mb-2">Max Guests *</label>
                <input type="number" name="max_guests" id="max_guests" value="{{ old('max_guests', 1) }}" min="1"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 @error('max_guests') border-red-500 @enderror" required>
                @error('max_guests')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="price_per_night" class="block text-sm font-medium text-gray-700 mb-2">Price per Night ($) *</label>
                <input type="number" name="price_per_night" id="price_per_night" value="{{ old('price_per_night') }}" step="0.01" min="0"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 @error('price_per_night') border-red-500 @enderror" required>
                @error('price_per_night')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available', true) ? 'checked' : '' }}
                    class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                <label for="is_available" class="ml-2 block text-sm text-gray-900">
                    Available for Booking
                </label>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('apartment-houses.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-lg transition duration-300">
                Cancel
            </a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">
                <i class="fas fa-save mr-2"></i> Save Apartment
            </button>
        </div>
    </form>
</div>
@endsection
