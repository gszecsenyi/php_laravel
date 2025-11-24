<?php $__env->startSection('title', 'Apartment Houses'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-900">
        <i class="fas fa-hotel text-purple-600"></i> Apartment Houses
    </h1>
    <a href="<?php echo e(route('apartment-houses.create')); ?>" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg shadow transition duration-300">
        <i class="fas fa-plus mr-2"></i> Add New Apartment
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php $__empty_1 = true; $__currentLoopData = $apartmentHouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="bg-white rounded-lg shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-900"><?php echo e($apartment->name); ?></h3>
                    <span class="px-3 py-1 text-xs font-semibold rounded-full <?php echo e($apartment->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                        <?php echo e($apartment->is_available ? 'Available' : 'Unavailable'); ?>

                    </span>
                </div>
                
                <div class="text-gray-600 mb-4">
                    <p class="mb-2"><i class="fas fa-map-marker-alt mr-2"></i><?php echo e($apartment->address); ?></p>
                    <p class="mb-2"><i class="fas fa-door-open mr-2"></i><?php echo e($apartment->number_of_rooms); ?> rooms</p>
                    <p class="mb-2"><i class="fas fa-users mr-2"></i>Max <?php echo e($apartment->max_guests); ?> guests</p>
                </div>

                <?php if($apartment->description): ?>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2"><?php echo e($apartment->description); ?></p>
                <?php endif; ?>

                <div class="border-t pt-4 mt-4">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-2xl font-bold text-purple-600">$<?php echo e(number_format($apartment->price_per_night, 2)); ?></span>
                        <span class="text-sm text-gray-500">per night</span>
                    </div>

                    <div class="flex space-x-2">
                        <a href="<?php echo e(route('apartment-houses.show', $apartment)); ?>" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white text-center py-2 rounded-lg transition duration-300">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?php echo e(route('apartment-houses.edit', $apartment)); ?>" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white text-center py-2 rounded-lg transition duration-300">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="<?php echo e(route('apartment-houses.destroy', $apartment)); ?>" method="POST" class="flex-1">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg transition duration-300" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-span-full bg-white rounded-lg shadow-xl p-8 text-center text-gray-500">
            <i class="fas fa-hotel text-4xl mb-4"></i>
            <p class="text-lg">No apartment houses found. Add your first apartment!</p>
        </div>
    <?php endif; ?>
</div>

<?php if($apartmentHouses->hasPages()): ?>
    <div class="mt-6">
        <?php echo e($apartmentHouses->links()); ?>

    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/work/php_laravel/php_laravel/resources/views/apartment-houses/index.blade.php ENDPATH**/ ?>