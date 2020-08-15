<?php $__env->startSection('content'); ?>
	
	<h3 class="page-title">Empresas</h3>

     <div class="panel panel-default">
        <div class="panel-heading">
			
			Crear
        </div>

        

        <div class="panel-body form-auth-style" id="app">

        	<div class="row">
        		<?php if($record): ?>
				<?php echo e(Form::model($record, 
				array('url' => URL_SUB_CATEGORIES_EDIT.'/'.$record->slug, 
				'method'=>'PATCH', 'name'=>'formValidate', 'novalidate'=>''))); ?>

				<?php else: ?>
				<?php echo Form::open(array('url' => URL_SUB_CATEGORIES_ADD, 'method' => 'POST','name'=>'formValidate', 'novalidate'=>'')); ?>

				<?php endif; ?>

				<?php echo $__env->make('admin.sub_catogories.form_elements', array('record' => $record), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

				<?php echo Form::close(); ?>

			</div>

    	</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_scripts'); ?>
<?php echo $__env->make('common.validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('common.alertify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>    
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>