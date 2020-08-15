<?php $__env->startSection('content'); ?>
    
    <h3 class="page-title"> Empresa </h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            
                    Ver
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            
                            <th>Lote</th>
                            <td field-key='category'><?php echo e($sub_catogory->category); ?></td>
                        </tr>
                        <tr>
                            
                            <th>Empresa</th>
                            <td field-key='sub_category'><?php echo e($sub_catogory->sub_category); ?></td>
                        </tr>
                        
                    </table>
                </div>
            </div>


        

            <p>&nbsp;</p>

            
            <a href="<?php echo e(URL_SUB_CATEGORIES); ?>" class="btn btn-default">Regresar a la lista</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>