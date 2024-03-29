<?php $__env->startSection('content'); ?>

<?php echo $__env->make('bidder.leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!--Dashboard section -->
    <div class="col-lg-8 col-md-8 col-sm-12 au-onboard">
            


             <div class="au-left-side">

                 <div class="row">
                    <a href="<?php echo e(route('messenger.edit', [$topic->id])); ?>" class="btn btn-primary login-bttn"><?php echo e(getPhrase('reply')); ?></a>

                    <div class="col-md-12">
                        <div class="list-group" style="margin-top:8px;">
                            <?php $__currentLoopData = $topic->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row list-group-item">
                                    <div class="row">
                                        <div class="col col-xs-10 <?php echo e((in_array($message->id, $unreadMessages)?"unread":false)); ?>">
                                            <?php echo e($message->sender->email); ?>

                                        </div>
                                        <div class="col col-xs-2">
                                            <?php echo e($message->sent_at->diffForHumans()/*format('d F Y h:i')*/); ?>

                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                    <div class="row" style="padding-left:15px;">
                                        <div class="col col-xs-12">
                                            <?php echo e($message->content); ?>

                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                </div>
              </div>
    </div>


    </div>

    </div>
      </div>
    </section>
    <!--Dashboard section-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>