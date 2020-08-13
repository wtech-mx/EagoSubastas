<?php $__env->startSection('content'); ?>

<?php echo $__env->make('bidder.leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <!--Dashboard section -->


    <div class="col-lg-8 col-md-8 col-sm-12 au-onboard">



            
             <div class="row au-left-side">
               <div class="col-lg-4 col-md-4 col-sm-4 au-primary">
                 <div class="au-card-franky">
                   <h4 class="text-center"><?php echo e(\Auth::User()->getBidderParicipatedAuctions()->count()); ?></h4> 

                     <p class="text-center">Subastas</p>

                     <a href="<?php echo e(URL_BIDDER_AUCTIONS); ?>" title="My Auctions">Ver</a>
                 </div>     
                </div> 
                
                 <div class="col-lg-4 col-md-4 col-sm-4 au-primary au-secondary">
                 <div class="au-card-franky">
                   <h4 class="text-center"><?php echo e(\Auth::User()->getBidderFavAuctions()->count()); ?></h4> 

                     <p class="text-center">Subastas favoritas</p>

                     <a href="<?php echo e(URL_USERS_FAV_AUCTIONS); ?>" title="Favourite Auctions">Ver</a>
                 </div>     
                </div>  

                 <div class="col-lg-4 col-md-4 col-sm-4 au-primary au-quinary">
                 <div class="au-card-franky">
                   <h4 class="text-center"><?php echo e(\Auth::User()->getBidderWonAuctions()->count()); ?></h4> 

                     <p class="text-center">subastas ganadas</p>

                      <a href="<?php echo e(URL_BIDDER_AUCTIONS); ?>" title="View Auctions">Ver</a>
                 </div>     
                </div>  

                 <div class="col-lg-4 col-md-4 col-sm-4 au-primary au-senary">
                 <div class="au-card-franky">
                   <h4 class="text-center"><?php echo e(\Auth::User()->getBidderPayments()->count()); ?></h4> 

                      <p class="text-center">pagos</p>

                     <a href="<?php echo e(URL_BIDDER_PAYMENTS); ?>" title="payments">Ver</a>
                 </div>     
                </div> 


                 <div class="col-lg-4 col-md-4 col-sm-4 au-primary au-ternary">
                 <div class="au-card-franky">
                   <h4 class="text-center"><?php echo e(\Auth::User()->unreadNotifications()->count()); ?></h4> 

                     <p class="text-center">notificaciones</p>

                     <a href="<?php echo e(URL_USER_NOTIFICATIONS); ?>" title="Notifications">Ver</a>
                 </div>     
                </div>  
                
                 <div class="col-lg-4 col-md-4 col-sm-4 au-primary au-quaternary">
                 <div class="au-card-franky">
                  <?php ($unread = App\MessengerTopic::countUnread()); ?>
                   <h4 class="text-center"><?php echo e($unread); ?></h4> 

                     <p class="text-center">Mensajes</p>

                      <a href="<?php echo e(URL_MESSENGER); ?>" title="Messages">Ver</a>
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