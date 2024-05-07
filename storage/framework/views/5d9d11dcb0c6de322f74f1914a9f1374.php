

<?php $__env->startSection('title', 'Shopping Lists'); ?>

<?php $__env->startSection('content'); ?>
<h1>Shopping Lists
    <form action="<?php echo e(route('shoppingList.create', ['id' => 1])); ?>" method="GET" style="display: inline;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('GET'); ?>
        <button type="submit" class="btn btn-danger">Add Shopping List</button>
    </form>
</h1>

<?php if($shoppingLists->isEmpty()): ?>
<p>No shopping lists found.</p>
<?php else: ?>
<ul>
    <?php $__currentLoopData = $shoppingLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
        <?php echo e($list->name); ?>

        <a href="<?php echo e(route('shoppingList.show', ['id' => $list->id])); ?>" class="btn btn-primary">View</a>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\INHA\3rd Year\Semester 2\IP\WhatToBuyDemo\resources\views/shoppingList/index.blade.php ENDPATH**/ ?>