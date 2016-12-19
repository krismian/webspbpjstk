<h1>Upload a Photo </h1>


<hr/>

<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <strong>Whoops! </strong> There were some problems with your input. <br> <br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li><?php echo e($error); ?> </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        </ul>
    </div>

<?php endif; ?>


<!-- image name Form Input -->

<!-- form field for file -->
<div class="form-group">
    <?php echo Form::label('image', 'Primary Image'); ?>

    <?php echo Form::file('image', null, array('required', 'class'=>'form-control')); ?>

</div>

<!-- form field for file -->
<div class="form-group">
    <?php echo Form::label('mobile_image', 'Mobile Image'); ?>

    <?php echo Form::file('mobile_image', null, array('required', 'class'=>'form-control')); ?>

</div>

