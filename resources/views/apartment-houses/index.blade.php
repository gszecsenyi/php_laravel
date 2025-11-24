@extends('layouts.app')

@section('title', 'Apartment Houses')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-900">
        <i class="fas fa-hotel text-purple-600"></i> Apartment Houses
    </h1>
    <a href="{{ route('apartment-houses.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg shadow transition duration-300">
        <i class="fas fa-plus mr-2"></i> Add New Apartment
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($apartmentHouses as $apartment)
        <div class="bg-white rounded-lg shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-900">{{ $apartment->name }}</h3>
                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $apartment->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $apartment->is_available ? 'Available' : 'Unavailable' }}
                    </span>
                </div>
                
                <div class="text-gray-600 mb-4">
                    <p class="mb-2"><i class="fas fa-map-marker-alt mr-2"></i>{{ $apartment->address }}</p>
                    <p class="mb-2"><i class="fas fa-door-open mr-2"></i>{{ $apartment->number_of_rooms }} rooms</p>
                    <p class="mb-2"><i class="fas fa-users mr-2"></i>Max {{ $apartment->max_guests }} guests</p>
                </div>

                @if($apartment->description)
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $apartment->description }}</p>
                @endif

                <div class="border-t pt-4 mt-4">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-2xl font-bold text-purple-600">${{ number_format($apartment->price_per_night, 2) }}</span>
                        <span class="text-sm text-gray-500">per night</span>
                    </div>

                    <div class="flex space-x-2">
                        <a href="{{ route('apartment-houses.show', $apartment) }}" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white text-center py-2 rounded-lg transition duration-300">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('apartment-houses.edit', $apartment) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white text-center py-2 rounded-lg transition duration-300">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('apartment-houses.destroy', $apartment) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg transition duration-300" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full bg-white rounded-lg shadow-xl p-8 text-center text-gray-500">
            <i class="fas fa-hotel text-4xl mb-4"></i>
            <p class="text-lg">No apartment houses found. Add your first apartment!</p>
        </div>
    @endforelse
</div>

@if($apartmentHouses->hasPages())
    <div class="mt-6">
        {{ $apartmentHouses->links() }}
    </div>
@endif
@endsection
