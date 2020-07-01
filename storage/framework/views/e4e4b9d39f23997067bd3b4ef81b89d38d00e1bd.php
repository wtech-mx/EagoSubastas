<?php $__env->startSection('title', 'New message'); ?>

<?php $__env->startSection('messenger-content'); ?>

    <div class="form-auth-style">

    <div class="row">

        <div class="col-md-12">
        	

            <?php if($user): ?>
			<?php echo e(Form::model($user, 
			array('url' => URL_MESSENGER_EDIT, 
			'method'=>'POST', 'name'=>'formValidate', 'novalidate'=>'', 'class'=>'stepperForm validate' ))); ?>

			<?php else: ?>
			<?php echo Form::open(array('url' => URL_MESSENGER_ADD, 'method' => 'POST','name'=>'formValidate', 'novalidate'=>'', 'class'=>'stepperForm validate')); ?>

			<?php endif; ?>

			<?php echo $__env->make('admin.messenger.form-partials.fields',array('user' => $user), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<?php echo Form::close(); ?>


        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_scripts'); ?>
<?php echo $__env->make('common.validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.messenger.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>