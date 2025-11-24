<?php $__env->startSection('title', 'Welcome - Booking Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="text-center">
    <h1 class="text-5xl font-bold text-gray-900 mb-4">
        Welcome to <span class="text-indigo-600">BookingHub</span>
    </h1>
    <p class="text-xl text-gray-600 mb-12">
        Manage your apartment bookings with ease
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
        <!-- Guests Card -->
        <a href="<?php echo e(route('guests.index')); ?>" class="bg-white rounded-lg shadow-xl p-8 hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-1">
            <div class="text-indigo-600 mb-4">
                <i class="fas fa-users text-6xl"></i>
            </div>
            <h3 class="text-2xl font-semibold text-gray-900 mb-2">Guests</h3>
            <p class="text-gray-600">Manage guest information and contact details</p>
            <div class="mt-4">
                <span class="inline-flex items-center text-indigo-600 font-semibold">
                    View Guests <i class="fas fa-arrow-right ml-2"></i>
                </span>
            </div>
        </a>

        <!-- Apartments Card -->
        <a href="<?php echo e(route('apartment-houses.index')); ?>" class="bg-white rounded-lg shadow-xl p-8 hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-1">
            <div class="text-purple-600 mb-4">
                <i class="fas fa-hotel text-6xl"></i>
            </div>
            <h3 class="text-2xl font-semibold text-gray-900 mb-2">Apartments</h3>
            <p class="text-gray-600">Browse and manage apartment properties</p>
            <div class="mt-4">
                <span class="inline-flex items-center text-purple-600 font-semibold">
                    View Apartments <i class="fas fa-arrow-right ml-2"></i>
                </span>
            </div>
        </a>

        <!-- Bookings Card -->
        <a href="<?php echo e(route('bookings.index')); ?>" class="bg-white rounded-lg shadow-xl p-8 hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-1">
            <div class="text-pink-600 mb-4">
                <i class="fas fa-calendar-check text-6xl"></i>
            </div>
            <h3 class="text-2xl font-semibold text-gray-900 mb-2">Bookings</h3>
            <p class="text-gray-600">Track and manage all reservations</p>
            <div class="mt-4">
                <span class="inline-flex items-center text-pink-600 font-semibold">
                    View Bookings <i class="fas fa-arrow-right ml-2"></i>
                </span>
            </div>
        </a>
    </div>

    <!-- Quick Actions -->
    <div class="mt-16">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Quick Actions</h2>
        <div class="flex justify-center space-x-4">
            <a href="<?php echo e(route('guests.create')); ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300">
                <i class="fas fa-user-plus mr-2"></i> Add Guest
            </a>
            <a href="<?php echo e(route('apartment-houses.create')); ?>" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300">
                <i class="fas fa-plus mr-2"></i> Add Apartment
            </a>
            <a href="<?php echo e(route('bookings.create')); ?>" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300">
                <i class="fas fa-calendar-plus mr-2"></i> New Booking
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/work/php_laravel/php_laravel/resources/views/welcome.blade.php ENDPATH**/ ?>