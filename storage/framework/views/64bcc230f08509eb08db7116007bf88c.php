

<?php $__env->startSection('title', 'Edit Shopping List'); ?>

<?php $__env->startSection('content'); ?>
<h1>Edit Shopping List</h1>

<form action="<?php echo e(route('shoppingList.update', ['id' => $shoppingList->id])); ?>" method="POST" id="editForm">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo e($shoppingList->name); ?>">
        <span id="nameError" class="text-danger"></span>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<script>
    const form = document.getElementById('editForm');
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\INHA\3rd Year\Semester 2\IP\WhatToBuyDemo\resources\views/shoppingList/edit.blade.php ENDPATH**/ ?>