<?php $__env->startSection('head'); ?>

    <link rel="stylesheet" href="/assets/css/signin.css">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <?php echo Form::open(['url' => url('#'), 'class' => 'form-signin'] ); ?>



    <?php echo $__env->make('includes.status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <h2 class="form-signin-heading">Please sign in</h2>

    <label for="inputEmail" class="sr-only">Email address</label>
    <?php echo Form::email('email', null, [
        'class'                         => 'form-control',
        'placeholder'                   => 'Email address',
        'required',
        'id'                            => 'inputEmail'
    ]); ?>


    <label for="inputPassword" class="sr-only">Password</label>
    <?php echo Form::password('password', [
        'class'                         => 'form-control',
        'placeholder'                   => 'Password',
        'required',
        'id'                            => 'inputPassword'
    ]); ?>


    <div style="height:15px;"></div>
    <div class="row">
        <div class="col-md-12">
            <fieldset class="form-group">
                <?php echo Form::checkbox('remember', 1, null, ['id' => 'remember-me']); ?>

                <label for="remember-me">Remember me</label>
            </fieldset>
        </div>
    </div>

    <button class="btn btn-lg btn-primary btn-block login-btn" type="submit">Sign in</button>
    <p><a href="<?php echo e(url('#')); ?>">Forgot password?</a></p>

    <p class="or-social">Or Use Social Login</p>

    <?php echo $__env->make('partials.socials', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>