<?php $__env->startSection('content'); ?>

    <h2 style="margin-top:0px;"><?php echo $__env->yieldContent('title'); ?></h2>

    <div class="row" style="margin-top:15px;">

        
        <div class="col-xs-3">
            <a href="<?php echo e(URL_MESSENGER_ADD); ?>" class="btn btn-primary btn-group-justified"><?php echo e(getPhrase('new_message')); ?></a>

            <div class="list-group" style="margin-top:8px;">
                <a href="<?php echo e(URL_MESSENGER); ?>" class="list-group-item"><?php echo e(getPhrase('all_messages')); ?></a>
                <?php ($unread = App\MessengerTopic::unreadInboxCount()); ?>
                <a href="<?php echo e(URL_MESSENGER_INBOX); ?>" class="list-group-item <?php echo e(($unread > 0 ? 'unread' : '')); ?>">
                    Inbox
                    <?php echo e(($unread > 0 ? '('.$unread.')' : '')); ?>

                </a>
                <a href="<?php echo e(URL_MESSENGER_OUTBOX); ?>" class="list-group-item"><?php echo e(getPhrase('outbox')); ?></a>
            </div>
        </div>


        
        <div class="col-xs-9">
            <?php echo $__env->yieldContent('messenger-content'); ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>