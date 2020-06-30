<?php $__env->startSection('content'); ?>

<?php echo $__env->make('bidder.leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--Dashboard section -->


    <div class="col-lg-9 col-md-8 col-sm-12 au-onboard">
            <a href="<?php echo e(URL_HOME); ?>" class="au-middles justify-content-start"> <?php echo e(getPhrase('home')); ?> &nbsp;<span> / <?php echo e($title); ?> </span></a>

            <div class="au-left-side form-auth-style">


              

                <div class="row">

                    <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        
                        <th>#</th>
                       
                        <th><?php echo e(getPhrase('title')); ?></th>
                        <!-- <th><?php echo e(getPhrase('description')); ?></th> -->
                        <th><?php echo e(getPhrase('created_at')); ?></th>
                        <th><?php echo e(getPhrase('action')); ?></th>

                    </tr>
                </thead>
                <?php if(count($notifications) > 0): ?>
                <tbody>
                    <?php if(count($notifications) > 0): ?>
                    <?php $i=0; ?>
                        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                       <?php 
                       $i++;
                                    $title = $notification->data['title'];
                                    $url = $notification->data['url'];
                                    $description='';
                                    if (isset($notification->data['description']))
                                    $description = $notification->data['description'];

                                    $notification->markAsRead();
                                ?>

                            <tr>
                              
                                <td><?php echo e($i); ?></td>
                               
                                <td><?php echo e($title); ?></td>

                                <!-- <td><?php echo e($description); ?></td> -->

                                <td>  <?php if($notification->updated_at): ?> <?php echo date(getSetting('date_format','site_settings').' H:i:s', strtotime($notification->updated_at));?> <?php endif; ?> </td>
                                <td><a href="<?php echo e(URL_USER_NOTIFICATIONS_VIEW.$notification->id); ?>" title="View Details" class="btn btn-primary btn-sm login-bttn"><?php echo e(getPhrase('view')); ?></a></td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5"> <?php echo e(getPhrase('no_entries_in_table')); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <?php endif; ?>
            </table>
        </div>

                </div> 


            </div> 
    </div> 




        </div>
      </div>   
    </section>
    <!--Dashboard section-->

<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer_scripts'); ?>

<?php echo $__env->make('common.validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('common.alertify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('home.pages.auctions.auctions-js-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>