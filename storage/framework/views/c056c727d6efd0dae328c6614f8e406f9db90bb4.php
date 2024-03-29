<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title"> <?php echo e($title); ?> </h3>
    

   
    

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo e(getPhrase('list')); ?>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('state_create')): ?>

                 <a href="<?php echo e(URL_STATES_ADD); ?>" class="btn btn-success btn-add pull-right"> Agregar </a>
            <?php endif; ?>

        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                       <th style="text-align:center;">S.no.</th>


                        <th> Estado </th>


                         <th> Ciudad </th>

                        
                        <th>&nbsp;Acciones</th>
                       
                    </tr>
                </thead>
                <?php if(count($states) > 0): ?>
                <tbody>
                    <?php if(count($states) > 0): ?>
                     <?php $i=0;?>
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php $i++;?>
                            <tr data-entry-id="<?php echo e($state->id); ?>">

                                <td style="text-align:center;"><?php echo e($i); ?></td>

                                <td field-key='state'><?php echo e($state->state); ?></td>
                                <td field-key='country'><?php echo e($state->title); ?></td>
                               
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('state_view')): ?>

                                        <a href="<?php echo e(URL_STATES_VIEW); ?>/<?php echo e($state->slug); ?>" class="btn btn-xs btn-primary"> Ver </a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('state_edit')): ?>

                                        <a href="<?php echo e(URL_STATES_EDIT); ?>/<?php echo e($state->slug); ?>" class="btn btn-xs btn-info"> Editar </a>
                                    <?php endif; ?>


                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('state_delete')): ?>

                                        <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="deleteRecord('<?php echo e($state->id); ?>')"> Eliminar</a>
                                    <?php endif; ?>
                                </td>
                               
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7"> <?php echo e(getPhrase('no_entries_in_table')); ?> </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <?php endif; ?>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?> 
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('state_delete')): ?> 
     <?php echo $__env->make('common.deletescript', array('route'=>URL_STATES_DELETE), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>