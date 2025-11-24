<?php $__env->startSection('title', 'Bookings'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-900">
        <i class="fas fa-calendar-check text-pink-600"></i> Bookings
    </h1>
    <a href="<?php echo e(route('bookings.create')); ?>" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-lg shadow transition duration-300">
        <i class="fas fa-calendar-plus mr-2"></i> New Booking
    </a>
</div>

<div class="bg-white rounded-lg shadow-xl overflow-hidden">
    <?php if($bookings->count() > 0): ?>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Guest</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apartment</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Check In</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Check Out</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="<?php echo e(route('guests.show', $booking->guest)); ?>" class="text-indigo-600 hover:text-indigo-900 font-medium">
                                <?php echo e($booking->guest->full_name); ?>

                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="<?php echo e(route('apartment-houses.show', $booking->apartmentHouse)); ?>" class="text-purple-600 hover:text-purple-900">
                                <?php echo e($booking->apartmentHouse->name); ?>

                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?php echo e($booking->check_in_date->format('M d, Y')); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?php echo e($booking->check_out_date->format('M d, Y')); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                <?php if($booking->status == 'confirmed'): ?> bg-green-100 text-green-800
                                <?php elseif($booking->status == 'pending'): ?> bg-yellow-100 text-yellow-800
                                <?php elseif($booking->status == 'cancelled'): ?> bg-red-100 text-red-800
                                <?php else: ?> bg-blue-100 text-blue-800
                                <?php endif; ?>">
                                <?php echo e(ucfirst($booking->status)); ?>

                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            $<?php echo e(number_format($booking->total_price, 2)); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="<?php echo e(route('bookings.show', $booking)); ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('bookings.edit', $booking)); ?>" class="text-yellow-600 hover:text-yellow-900 mr-3">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('bookings.destroy', $booking)); ?>" method="POST" class="inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
        <div class="px-6 py-4 bg-gray-50">
            <?php echo e($bookings->links()); ?>

        </div>
    <?php else: ?>
        <div class="p-8 text-center text-gray-500">
            <i class="fas fa-calendar-times text-4xl mb-4"></i>
            <p class="text-lg">No bookings found. Create your first booking!</p>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/work/php_laravel/php_laravel/resources/views/bookings/index.blade.php ENDPATH**/ ?>