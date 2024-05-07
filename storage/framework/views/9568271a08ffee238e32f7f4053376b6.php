

<?php $__env->startSection('title', 'Add Shopping List'); ?>

<?php $__env->startSection('content'); ?>
<h1>Add Shopping List</h1>

<form action="<?php echo e(route('shoppingList.store')); ?>" method="POST" id="addShoppingListForm">
    <?php echo csrf_field(); ?>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control">
        <span id="nameError" class="text-danger"></span>
    </div>

    <button type="submit" class="btn btn-primary">Add</button>
</form>

<script>
    const form = document.getElementById('addShoppingListForm');
    const nameInput = document.getElementById('name');
    const nameError = document.getElementById('nameError');

    form.addEventListener('submit', function(event) {
        const nameValue = nameInput.value.trim();

        if (!preg_match('/^[a-zA-Z0-9 ]{1,50}$/', $nameValue)) {
            nameError.textContent = 'Name should only contain alphanumeric characters and spaces. Names longer than 50 characters are not allowed.';
            event.preventDefault();
        } else {
            nameError.textContent = '';
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\INHA\3rd Year\Semester 2\IP\WhatToBuyDemo\resources\views/shoppingList/create.blade.php ENDPATH**/ ?>