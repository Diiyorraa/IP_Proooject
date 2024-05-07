

<?php $__env->startSection('title', 'Add Item'); ?>

<?php $__env->startSection('content'); ?>
<h1>Add Item</h1>

<form action="<?php echo e(route('item.store', ['id' => $id])); ?>" method="POST" id="addItemForm">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control">
        <span id="nameError" class="text-danger"></span>
    </div>

    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" class="form-control">
        <span id="quantityError" class="text-danger"></span>
    </div>

    <button type="submit" class="btn btn-primary">Add</button>
</form>

<script>
    const form = document.getElementById('addItemForm');
    const nameInput = document.getElementById('name');
    const quantityInput = document.getElementById('quantity');
    const nameError = document.getElementById('nameError');
    const quantityError = document.getElementById('quantityError');

    form.addEventListener('submit', function(event) {
        const nameValue = nameInput.value.trim();
        const quantityValue = quantityInput.value.trim();

        if (!preg_match(!'/^[a-zA-Z0-9 ]{1,50}$/', $nameValue)) {
            nameError.textContent = 'Name is should only contain alphanumeric symbols and spaces. Names longer than 50 characters are not allowed';
            event.preventDefault();
        } else {
            nameError.textContent = '';
        }

        if (!preg_match('/^[0-9]{1,2}$/', $quantityValue) && $quantityValue < 0 && quantityValue > 50) {
            quantityError.textContent = 'Quantity should be between 1 and 50.';
            event.preventDefault();
        } else {
            quantityError.textContent = '';
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\INHA\3rd Year\Semester 2\IP\WhatToBuyDemo\resources\views/item/create.blade.php ENDPATH**/ ?>