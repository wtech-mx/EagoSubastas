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
                        <div class="col-md-4">
                                <input  type="file" class="form-control"  name="file">
                        </div>
                    <div class="col-6">
                        <button class="btn btn-success">Importar Usuarios</button>
                    </div>

                    <div class="col-12 p-5">
                        <h3>El ID de la subasta es :  <?php echo e($record->id); ?></h3>
                    <p>Porfavor ingresar en el campo "auction_id" del exel </p>
                    </div>

                <table class="table table-bordered table-striped">

                    <thead>
                        <th>#</th>
                        <th>Id Subasta</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Eliminar</th>
                    </thead>

                    <?php if(count($invitacion) > 0): ?>
                        <tbody>
                            <?php if(count($invitacion) > 0): ?>
                                <?php $i=0;?>
                                    <?php $__currentLoopData = $invitacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($record->id == $item->auction_id): ?>
                                        <?php $i++;?>
                                            <tr>
                                                <td><?php echo e($item->id); ?></td>
                                                <td><?php echo e($item->auction_id); ?></td>
                                                <td><?php echo e($item->name); ?></td>
                                                <td><?php echo e($item->email); ?></td>
                                                <td>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invitacion_delete')): ?>
                                                        <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="deleteRecord('<?php echo e($item->id); ?>')"> Borrar </a>
                                                    <?php endif; ?>
                                                </td>

                                            </tr>
                                        <?php else: ?>
                                        <?php endif; ?>

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

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invitacion_delete')): ?> 
        <?php echo $__env->make('common.deletescript', array('route'=>URL_INVITACIONES_DELETE), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

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