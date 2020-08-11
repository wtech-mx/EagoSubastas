<?php $request = app('Illuminate\Http\Request'); ?>



<?php $__env->startSection('header_scripts'); ?>
<link href="<?php echo e(CSS); ?>bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="<?php echo e(CSS); ?>checkbox.css" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom_div'); ?>

<?php if(isset($record) && count($record)): ?>
    <div ng-controller="prepareAuctionData" ng-init="initFunctions()">
<?php else: ?>
     <div ng-controller="prepareAuctionData">
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--Panel 2-->
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo e(route('email.import.excel')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <h1>Correos de Invitación  </h1>
                <div class="form-group">
                        <input type="hidden" name="auction_id" value="<?php echo e($record->id); ?>">
                        <div class="col-md-6">
                                <input  type="file" class="form-control"  name="file">
                        </div>
                    <div class="col-4">
                        <button class="btn btn-success">Importar Usuarios</button>
                    </div>

        <table class="table table-bordered table-striped">
            
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
            </thead>

            <?php if(count($invitacion) > 0): ?>
                <tbody>
                    <?php if(count($invitacion) > 0): ?>
                        <?php $i=0;?>
                            <?php $__currentLoopData = $invitacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $i++;?>
                                
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td><?php echo e($item->name); ?></td> 
                                        <td><?php echo e($item->email); ?></td>
                                        
                                    </tr>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="12"> <?php echo e(getPhrase('no_entries_in_table')); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            <?php endif; ?>                 

        </table>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_scripts'); ?>
<?php echo $__env->make('common.validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('common.alertify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php echo $__env->make('admin.auctions.scripts.auction-js-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<script src="<?php echo e(PREFIX1); ?>ckeditor/ckeditor.js"></script>
<script src="<?php echo e(PREFIX1); ?>ckeditor/adapters/jquery.js"></script>

<script src="<?php echo e(JS); ?>moment.min.js"></script>
<script src="<?php echo e(JS); ?>bootstrap-datetimepicker.min.js"></script>


<script src="<?php echo e(JS); ?>bootstrap-datepicker.min.js"></script>
<script>
     $(function () {
        $('#datepicker').datepicker({
            autoclose:true
        });
    });
</script>


<script src="<?php echo e(PREFIX1); ?>adminlte/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>