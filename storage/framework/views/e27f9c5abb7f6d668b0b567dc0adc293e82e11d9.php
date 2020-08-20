<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
<!--Panel 2-->

    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo e(route('email.import.excel')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                
                <h1>Correos de Invitación  </h1>
                <h3><?php echo e($sub->sub_category); ?></h3>
                <div class="form-group">
                        <input type="hidden" name="auction_id" value="<?php echo e($sub->id); ?>">
                        <div class="col-md-4">
                                <input  type="file" class="form-control"  name="file">
                        </div>
                    <div class="col-6">
                        <button class="btn btn-success">Importar Usuarios</button>
                    </div>

                    <div class="col-12 p-5">
                        <h3>El ID del lote es :  <?php echo e($sub->id); ?></h3>
                        <p>Porfavor ingresar en el exel </p>
                    </div>

                <table class="table table-bordered table-striped">

                    <thead>
                        <th>#</th>
                        <th>Id subasta</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Eliminar</th>
                    </thead>

                    <?php if(count($invitacion) > 0): ?>
                        <tbody>
                            <?php if(count($invitacion) > 0): ?>
                                <?php $i=0;?>
                                    <?php $__currentLoopData = $invitacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($sub->id == $item->auction_id): ?>
                                        <?php $i++;?>

                                            <tr>

                                                <td><?php echo e($item->id); ?></td>
                                                <td><?php echo e($item->auction_id); ?></td>
                                                <td><?php echo e($item->name); ?></td>
                                                <td><?php echo e($item->email); ?></td>

                                                <td>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invitacion_delete')): ?>

                                                        <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-<?php echo e($item->id); ?>">Eliminar</a>
                                                    <?php endif; ?>
                                                </td>

                                            </tr>

                                        <?php else: ?>
                                        <?php endif; ?>

                                                        <div class="modal fade" id="modal-<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                            <form method="POST" action="<?php echo e(route('destroy.invitacion',$item->id)); ?>">

                                                                <?php echo e(csrf_field()); ?>

                                                                <input type="hidden" name="_method" value="DELETE">

                                                              <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro  </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    Desea eliminar el Registro?
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                                                  </div>
                                                                </div>

                                                              </div>
                                                            </form>

                                                        </div>

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
    
     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_delete')): ?> 
            <?php echo $__env->make('common.deletescript', array('route'=>URL_item_CATEGORIES_DELETE), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
    
        
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>