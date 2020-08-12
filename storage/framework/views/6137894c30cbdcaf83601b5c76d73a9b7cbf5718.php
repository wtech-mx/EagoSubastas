<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('messenger-content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="list-group">
                <?php $__empty_1 = true; $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="row list-group-item">
                        <div class="col-xs-4 col-md-4">
                            <a href="<?php echo e(route('messenger.show', [$topic->id])); ?>" class="<?php echo e($topic->unread()?'unread':false); ?>">
                                <?php echo e($topic->otherPerson()->email); ?>

                            </a>
                        </div>
                        <div class="col-xs-5 col-md-5">
                            <a href="<?php echo e(route('messenger.show', [$topic->id])); ?>" class="<?php echo e($topic->unread()?'unread':false); ?>">
                                <?php echo e($topic->subject); ?>

                            </a>
                        </div>
                        <div class="col-xs-2 text-right"><?php echo e($topic->sent_at->diffForHumans()); ?></div>
                        <div class="col-xs-1 text-center">
                            
                            <?php if(checkRole(['admin'])): ?>
                            <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="deleteRecord('<?php echo e($topic->id); ?>')"> <?php echo e(getPhrase('delete')); ?> </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="row list-group-item">
                        You have no messages.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <style>
        .messenger-table tr:first-child td {
            border-top: 0 !important;
        }
        .unread {
            font-weight: bold;
            color:black;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?> 
    <?php echo $__env->make('common.deletescript', array('route'=>URL_MESSENGER_DELETE), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.messenger.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>