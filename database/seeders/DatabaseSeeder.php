<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guest;
use App\Models\ApartmentHouse;
use App\Models\Booking;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Guests
        $guests = [
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '+1-555-0101',
                'id_number' => 'ID001',
                'address' => '123 Main St, New York, NY 10001',
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '+1-555-0102',
                'id_number' => 'ID002',
                'address' => '456 Oak Ave, Los Angeles, CA 90001',
            ],
            [
                'first_name' => 'Robert',
                'last_name' => 'Johnson',
                'email' => 'robert.j@example.com',
                'phone' => '+1-555-0103',
                'id_number' => 'ID003',
                'address' => '789 Pine Rd, Chicago, IL 60601',
            ],
            [
                'first_name' => 'Emily',
                'last_name' => 'Williams',
                'email' => 'emily.w@example.com',
                'phone' => '+1-555-0104',
                'id_number' => 'ID004',
                'address' => '321 Elm St, Houston, TX 77001',
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Brown',
                'email' => 'michael.b@example.com',
                'phone' => '+1-555-0105',
                'id_number' => 'ID005',
                'address' => '654 Maple Dr, Phoenix, AZ 85001',
            ],
        ];

        foreach ($guests as $guestData) {
            Guest::create($guestData);
        }

        // Create Apartment Houses
        $apartments = [
            [
                'name' => 'Sunset Paradise',
                'address' => '100 Beach Blvd, Miami, FL 33139',
                'description' => 'Luxurious beachfront apartment with stunning ocean views. Modern amenities and close to all attractions.',
                'number_of_rooms' => 3,
                'max_guests' => 6,
                'price_per_night' => 250.00,
                'is_available' => true,
            ],
            [
                'name' => 'Mountain View Retreat',
                'address' => '200 Alpine Way, Aspen, CO 81611',
                'description' => 'Cozy mountain cabin with breathtaking views. Perfect for ski lovers and nature enthusiasts.',
                'number_of_rooms' => 2,
                'max_guests' => 4,
                'price_per_night' => 180.00,
                'is_available' => true,
            ],
            [
                'name' => 'Downtown Deluxe Suite',
                'address' => '300 City Center, Seattle, WA 98101',
                'description' => 'Modern downtown apartment in the heart of the city. Walking distance to restaurants and shopping.',
                'number_of_rooms' => 2,
                'max_guests' => 4,
                'price_per_night' => 200.00,
                'is_available' => true,
            ],
            [
                'name' => 'Garden Oasis',
                'address' => '400 Park Lane, Portland, OR 97201',
                'description' => 'Peaceful garden apartment with private patio. Ideal for families and relaxation.',
                'number_of_rooms' => 4,
                'max_guests' => 8,
                'price_per_night' => 300.00,
                'is_available' => true,
            ],
            [
                'name' => 'Historic Townhouse',
                'address' => '500 Heritage St, Boston, MA 02108',
                'description' => 'Charming historic townhouse in a prestigious neighborhood. Classic architecture with modern comfort.',
                'number_of_rooms' => 3,
                'max_guests' => 5,
                'price_per_night' => 220.00,
                'is_available' => false,
            ],
        ];

        foreach ($apartments as $apartmentData) {
            ApartmentHouse::create($apartmentData);
        }

        // Create Bookings
        $bookings = [
            [
                'guest_id' => 1,
                'apartment_house_id' => 1,
                'check_in_date' => now()->addDays(5),
                'check_out_date' => now()->addDays(10),
                'number_of_guests' => 4,
                'total_price' => 1250.00,
                'status' => 'confirmed',
                'notes' => 'Late check-in requested.',
            ],
            [
                'guest_id' => 2,
                'apartment_house_id' => 2,
                'check_in_date' => now()->addDays(15),
                'check_out_date' => now()->addDays(18),
                'number_of_guests' => 2,
                'total_price' => 540.00,
                'status' => 'pending',
                'notes' => null,
            ],
            [
                'guest_id' => 3,
                'apartment_house_id' => 3,
                'check_in_date' => now()->subDays(5),
                'check_out_date' => now()->addDays(2),
                'number_of_guests' => 3,
                'total_price' => 1400.00,
                'status' => 'confirmed',
                'notes' => 'Business trip. Requires parking space.',
            ],
            [
                'guest_id' => 4,
                'apartment_house_id' => 4,
                'check_in_date' => now()->addDays(30),
                'check_out_date' => now()->addDays(37),
                'number_of_guests' => 6,
                'total_price' => 2100.00,
                'status' => 'confirmed',
                'notes' => 'Family vacation with children.',
            ],
            [
                'guest_id' => 5,
                'apartment_house_id' => 1,
                'check_in_date' => now()->subDays(20),
                'check_out_date' => now()->subDays(15),
                'number_of_guests' => 2,
                'total_price' => 1250.00,
                'status' => 'completed',
                'notes' => 'Honeymoon trip. Excellent stay!',
            ],
        ];

        foreach ($bookings as $bookingData) {
            Booking::create($bookingData);
        }
    }
}
