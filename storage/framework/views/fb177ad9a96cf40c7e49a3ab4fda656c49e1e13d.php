<?php $__env->startSection('content'); ?>
    
    <h3 class="page-title"> Lotes </h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            
                    Ver
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            
                            <th> Lote</th>
                            <td field-key='category'><?php echo e($category->category); ?></td>
                        </tr>
                        <tr>
                            
                            <th> Descripcion </th>
                            <td field-key='question_text'><?php echo $category->description; ?></td>
                        </tr>
                       
                    </table>
                </div>
            </div>

            <!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#faqquestions" aria-controls="faqquestions" role="tab" data-toggle="tab">Empresas</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="faqquestions">
<table class="table table-bordered table-striped <?php echo e(count($sub_catogories) > 0 ? 'datatable' : ''); ?>">
    <thead>
        <tr>
            
            
            <th>Empresas</th>
            <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        <?php if(count($sub_catogories) > 0): ?>
            <?php $__currentLoopData = $sub_catogories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-entry-id="<?php echo e($sub_category->id); ?>">
                    <td field-key='category'><?php echo e($sub_category->sub_category); ?></td>

                                
                <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sub_catogory_view')): ?>
                    
                    <a href="<?php echo e(URL_SUB_CATEGORIES_VIEW); ?>/<?php echo e($sub_category->slug); ?>" class="btn btn-xs btn-primary">Ver</a>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sub_catogory_edit')): ?>
                    
                    <a href="<?php echo e(URL_SUB_CATEGORIES_EDIT); ?>/<?php echo e($sub_category->slug); ?>" class="btn btn-xs btn-info"> Editar </a>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sub_catogory_delete')): ?>
                    
                    <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="deleteRecord('<?php echo e($sub_category->id); ?>')"> Eliminar </a>
                    <?php endif; ?>
                </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                
                <td colspan="8"> no hay entradas en la tabla</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>
</div>


            <p>&nbsp;</p>

            <a href="<?php echo e(URL_CATEGORIES); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('global.app_back_to_list'); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?> 
   
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq_question_delete')): ?> 
        <?php echo $__env->make('common.deletescript', array('route'=>URL_SUB_CATEGORIES_DELETE), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>