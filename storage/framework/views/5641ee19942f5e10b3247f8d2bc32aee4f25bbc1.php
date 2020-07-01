<?php $__env->startSection('content'); ?>
    <h3 class="page-title"> <?php echo e(getPhrase('categories')); ?> </h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo e(getPhrase('view')); ?>

        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th> <?php echo e(getPhrase('category')); ?> </th>
                            <td field-key='title'><?php echo e($faq_category->title); ?></td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#faqquestions" aria-controls="faqquestions" role="tab" data-toggle="tab">Questions</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="faqquestions">
<table class="table table-bordered table-striped <?php echo e(count($faq_questions) > 0 ? 'datatable' : ''); ?>">
    <thead>
        <tr>
            <th> <?php echo e(getPhrase('category')); ?> </th>
            <th> <?php echo e(getPhrase('question')); ?> </th>
            <th> <?php echo e(getPhrase('answer')); ?> </th>
            <th>&nbsp;</th>

        </tr>
    </thead>
    <?php if(count($faq_questions) > 0): ?>
    <tbody>
        <?php if(count($faq_questions) > 0): ?>
            <?php $__currentLoopData = $faq_questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq_question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-entry-id="<?php echo e($faq_question->id); ?>">
                    <td field-key='category'><?php echo e(isset($faq_question->category->title) ? $faq_question->category->title : ''); ?></td>
                                <td field-key='question_text'><?php echo $faq_question->question_text; ?></td>
                                <td field-key='answer_text'><?php echo $faq_question->answer_text; ?></td>
                                                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view')): ?>
                                    <a href="<?php echo e(URL_FAQ_QUESTIONS_VIEW); ?>/<?php echo e($faq_question->slug); ?>" class="btn btn-xs btn-primary"> <?php echo e(getPhrase('view')); ?> </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit')): ?>
                                    <a href="<?php echo e(URL_FAQ_QUESTIONS_EDIT); ?>/<?php echo e($faq_question->slug); ?>" class="btn btn-xs btn-info"> <?php echo e(getPhrase('edit')); ?> </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete')): ?>
                                    
                                    <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="deleteRecord('<?php echo e($faq_question->id); ?>')"> <?php echo e(getPhrase('delete')); ?> </a>
                                    <?php endif; ?>
                                </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="8"><?php echo e(getPhrase('no_entries_in_table')); ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
    <?php endif; ?>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="<?php echo e(URL_FAQ_CATEGORIES); ?>" class="btn btn-default"><?php echo e(getPhrase('back_to_list')); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_scripts'); ?> 
   
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq_question_delete')): ?> 
        <?php echo $__env->make('common.deletescript', array('route'=>URL_FAQ_QUESTIONS_DELETE), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>