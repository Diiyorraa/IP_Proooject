

<?php $__env->startSection('title', 'Shopping List'); ?>

<?php $__env->startSection('content'); ?>
<h1>Shopping List: <?php echo e($shoppingList->name); ?></h1>
<div>
    <form action="<?php echo e(route('item.create', ['id' => $shoppingList->id])); ?>" method="GET" style="display: inline;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('GET'); ?>
        <button type="submit" class="btn btn-danger">Add Item</button>
    </form>
    <form action="<?php echo e(route('shoppingList.edit', ['id' => $shoppingList->id])); ?>" method="GET" style="display: inline;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('GET'); ?>
        <button type="submit" class="btn btn-danger">Edit</button>
    </form>
    <form action="<?php echo e(route('shoppingList.delete', ['id' => $shoppingList->id])); ?>" method="POST" style="display: inline;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this shopping list?')">Delete</button>
    </form>
</div>

<br>
<h2>Items:</h2>
<?php if($items->isEmpty()): ?>
<p>No items found.</p>
<?php else: ?>
<ul>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
        <?php echo e($item->name); ?> x <?php echo e($item->quantity); ?>

        <form action="<?php echo e(route('item.edit', ['id' => $item->id])); ?>" method="GET" style="display: inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('GET'); ?>
            <button type="submit" class="btn btn-danger">Edit</button>
        </form>
        <form action="<?php echo e(route('item.delete', ['id' => $item->id])); ?>" method="POST" style="display: inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this shopping list?')">Delete</button>
        </form>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\INHA\3rd Year\Semester 2\IP\WhatToBuyDemo\resources\views/shoppingList/show.blade.php ENDPATH**/ ?>