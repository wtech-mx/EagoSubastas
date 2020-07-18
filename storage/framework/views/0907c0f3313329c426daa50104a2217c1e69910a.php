<?php $request = app('Illuminate\Http\Request'); ?>


<?php

if (isset($active_class))
$active_class = $active_class;
else
$active_class='';

$user = Auth::user();

?>

 <section class="au-dashboard">
      <div class="container">
         <div class="row">

            <div class="col-lg-3 col-md-4 col-sm-12 au-aside-dashboard">



                <div class="media au-media-profile">
                  <img class="mr-3" src="<?php echo e(getProfilePath($user->image)); ?>" alt="Profile Image" class="img-fluid">
                 <div class="media-body">
                   <h5 class="mt-0"><?php echo e($user->name); ?></h5>
                   <!-- <p>User Login: 28/02/2018 16:50:55</p> -->
                  </div>
                 </div>





              <ul id="accordion" class="accordion">

                <!--Dashboard-->
                  <li class="<?php echo e(isActive($active_class,'dashboard')); ?>">
                    <a href="<?php echo e(URL_DASHBOARD); ?>" title="Dashboard">
                     <div class="link"><i class="fa fa-tachometer"></i>

                            Dashboard
                     </div>
                    </a>
                  </li>



                  <!--Account-->
                  <li class="<?php echo e(bidderActive($active_class,'user_management')); ?>">

                    <div class="link"><i class="fa fa-globe"></i>

                            Cuenta
                        <i class="fa fa-chevron-down"></i>
                    </div>
                    <ul class="submenu">

                      <li class="<?php echo e($request->segment(2) == 'edit' ? 'active active-sub' : ''); ?>">

                          <a href="<?php echo e(URL_USERS_EDIT); ?>/<?php echo e($user->slug); ?>" title="Profile">Perfil</a>
                      </li>


                      <li class="<?php echo e($request->segment(1) == 'billing-address' ? 'active active-sub' : ''); ?>">

                          <a href="<?php echo e(URL_USER_BILLING_ADDRESS); ?>" title="Billing Address">Direccion de facturación</a>
                      </li>

                      <li class="<?php echo e($request->segment(1) == 'shipping-address' ? 'active active-sub' : ''); ?>">

                          <a href="<?php echo e(URL_USER_SHIPPING_ADDRESS); ?>" title="Shipping Address">Direccion de Envio</a>
                      </li>

                      <li class="<?php echo e($request->segment(2) == 'change-password' ? 'active active-sub' : ''); ?>">

                          <a href="<?php echo e(URL_USERS_CHANGE_PASSWORD); ?><?php echo e($user->slug); ?>" title="Change Password">Cambiar Clave</a>

                      </li>
                    </ul>
                  </li>




                  <!--Auctions-->
                  <li class="<?php echo e(bidderActive($active_class,'auctions')); ?>">


                      <div class="link"><i class="fa fa-database"></i>Subastas<i class="fa fa-chevron-down"></i></div>

                    <ul class="submenu">

                      <li class="<?php echo e($request->segment(2) == 'fav-auctions' ? 'active active-sub' : ''); ?>">

                          <a href="<?php echo e(URL_USERS_FAV_AUCTIONS); ?>" title="Favourite Auctions">Subastas favoritas</a>
                      </li>

                      <li class="<?php echo e($request->segment(2) == 'my-auctions' ? 'active active-sub' : ''); ?>">

                          <a href="<?php echo e(URL_BIDDER_AUCTIONS); ?>" title="My Auctions">Mis subastas</a>
                      </li>

                      <li class="<?php echo e($request->segment(2) == 'bought-auctions' ? 'active active-sub' : ''); ?>">

                          <a href="<?php echo e(URL_BIDDER_BOUGHT_AUCTIONS); ?>" title="Bought Auctions">Subastas compradas </a>
                      </li>

                    </ul>
                  </li>




                  <li class="<?php echo e(isActive($active_class,'payments')); ?>">
                   <a href="<?php echo e(URL_BIDDER_PAYMENTS); ?>" title="Payments">

                        <div class="link"><i class="fa fa-money"></i>Pagps</div>
                   </a>
                  </li>


                  <li class="<?php echo e(isActive($active_class,'notifications')); ?>">
                   <a href="<?php echo e(URL_USER_NOTIFICATIONS); ?>" title="Notifications">

                       <div class="link"><i class="fa fa-briefcase"></i>Notificaciones</div>
                   </a>
                  </li>




                  <li class="<?php echo e($request->segment(1) == 'messenger' ? 'active isactive' : ''); ?>">
                     <?php ($unread = App\MessengerTopic::countUnread()); ?>
                   <!--  <div class="link"><i class="fa fa-database"></i><?php echo e(getPhrase('messages')); ?><i class="fa fa-chevron-down"></i>
                      <?php if($unread > 0): ?>
                          <?php echo e(($unread > 0 ? '('.$unread.')' : '')); ?>

                        <?php endif; ?>  <i class="fa fa-envelope"></i>
                    </div> -->


                     <div class="link">
                         <i class="fa fa-envelope"></i>

                          Mensajes
                         <i class="fa fa-chevron-down"></i>
                      <?php if($unread > 0): ?>
                          <?php echo e(($unread > 0 ? '('.$unread.')' : '')); ?>

                        <?php endif; ?>
                     </div>


                    <ul class="submenu">

                      <li class="<?php echo e(isActive($active_class,'all_messages')); ?>">

                          <a href="<?php echo e(URL_MESSENGER); ?>" title="Messages">Todos los Mensajes</a>
                      </li>

                      <?php ($unread_inbox = App\MessengerTopic::unreadInboxCount()); ?>
                      <li class="<?php echo e(isActive($active_class,'inbox')); ?>">

                          <a href="<?php echo e(URL_MESSENGER_INBOX); ?>" title="Inbox">Bandeja de entrada <?php echo e(($unread > 0 ? '('.$unread.')' : '')); ?> </a>
                      </li>

                      <li class="<?php echo e(isActive($active_class,'outbox')); ?>">

                          <a href="<?php echo e(URL_MESSENGER_OUTBOX); ?>" title="Outbox">Bandeja de salida</a>
                      </li>

                      <li class="<?php echo e(isActive($active_class,'create_message')); ?>">

                          <a href="<?php echo e(URL_MESSENGER_ADD); ?>" title="Send Message">Ccrear</a>
                      </li>

                    </ul>
                  </li>



                  <li>
                    <a href="<?php echo e(URL_LOGOUT); ?>" title="Logout">

                         <div class="link"><i class="fa fa-sign-out"></i>logout</div>
                    </a>
                  </li>

                </ul>
            </div>





