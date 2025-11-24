# BookingHub - Apartment Booking Management System

A modern, feature-rich booking management application built with Laravel 11, designed to manage guests, apartment houses, and bookings with an elegant and responsive UI.

## Features

- **Guest Management**: Add, edit, view, and delete guest information including contact details and addresses
- **Apartment Houses**: Manage apartment properties with details like rooms, capacity, pricing, and availability
- **Bookings**: Create and track bookings with status management (pending, confirmed, cancelled, completed)
- **Fancy UI**: Modern interface using Tailwind CSS with gradient backgrounds and smooth transitions
- **Relationships**: Full support for guest-booking and apartment-booking relationships
- **Validation**: Comprehensive form validation for all inputs
- **Sample Data**: Pre-seeded with realistic sample data for immediate testing

## Technology Stack

- **Backend**: Laravel 11 (PHP 8.3)
- **Database**: SQLite (easily switchable to MySQL/PostgreSQL)
- **Frontend**: Blade Templates with Tailwind CSS
- **Icons**: Font Awesome 6
- **Typography**: Inter font family

## Installation

1. Clone the repository:
```bash
git clone https://github.com/gszecsenyi/php_laravel.git
cd php_laravel
```

2. Install dependencies:
```bash
composer install
```

3. Set up environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Create database and run migrations:
```bash
touch database/database.sqlite
php artisan migrate
```

5. Seed the database with sample data:
```bash
php artisan db:seed
```

6. Start the development server:
```bash
php artisan serve
```

7. Visit `http://localhost:8000` in your browser

## Usage

### Managing Guests
- Navigate to "Guests" to view all registered guests
- Click "Add New Guest" to register a new guest
- View guest details and booking history by clicking on a guest name
- Edit or delete guests using the action buttons

### Managing Apartments
- Browse all apartment houses under "Apartments"
- Add new properties with details like rooms, capacity, and pricing
- Mark apartments as available or unavailable for booking
- View booking history for each apartment

### Creating Bookings
- Go to "Bookings" and click "New Booking"
- Select a guest and apartment
- Choose check-in and check-out dates
- The system automatically calculates the total price based on nightly rates
- Set booking status (pending, confirmed, cancelled, completed)

## Database Schema

### Guests Table
- first_name, last_name, email, phone, id_number, address

### Apartment Houses Table
- name, address, description, number_of_rooms, max_guests, price_per_night, is_available

### Bookings Table
- guest_id, apartment_house_id, check_in_date, check_out_date, number_of_guests, total_price, status, notes

## Screenshots

### Welcome Page
![Welcome Page](https://github.com/user-attachments/assets/cf0a79e2-83e0-46c4-a3b9-167a6c61244b)

### Guests Management
![Guests List](https://github.com/user-attachments/assets/423906b3-30ec-4a40-a001-b1a2e08535d2)

### Apartment Houses
![Apartments List](https://github.com/user-attachments/assets/aa695c8e-1432-49f1-816b-d4b4e870f4a1)

### Bookings
![Bookings List](https://github.com/user-attachments/assets/794e8adc-86a7-4ca6-a6e0-5639374d70e4)

## License

This project is open-source software licensed under the MIT license.