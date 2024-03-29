<?php	$loggedInUser = Auth::user();
					$unread_notifications_count = $loggedInUser->unreadNotifications()->count();
					$unread_notifications = $loggedInUser->unreadNotifications;
					  // dd($unread_notifications[0]->data['title']);

			?>
			
				<li class="dropdown"> 
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-bell-o f-bell"></i>
						<?php if($unread_notifications_count): ?>
						<span class="count-mt active"><?php echo e($unread_notifications_count); ?></span> 
						<?php endif; ?>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-notif notification-dropdown" aria-labelledby="dd-notification">
					<div class="dropdown-menu-notif-list" id="latestUsers">
						<?php if($unread_notifications_count): ?>
					<?php $__currentLoopData = $unread_notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php 
							$title = $notification->data['title'];
							$url = $notification->data['url'];
							// $description = setDescriptionLimit($notification->data['description']);
							$single_notification_url = URL_USER_NOTIFICATIONS_VIEW.$notification->id;
					 ?>
							<div class="dropdown-menu-notif-item dropdown-list ">
								
								 <a href="<?php echo e($single_notification_url); ?>" class="note-menu">
									<h4><?php echo e($title); ?></h4>
									
									<p><?php echo e($notification->updated_at->diffForHumans()); ?></p>
								</a>
							</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>

						<div class="dropdown-menu-notif-more">
							<a href="<?php echo e(URL_USER_NOTIFICATIONS); ?>"><?php echo e(getPhrase('see_all')); ?></a>
						</div>
						<?php else: ?>
						<div class="dropdown-menu-notif-list" >
							<div class="dropdown-menu-notif-item dropdown-list"><span class="no-notification-text">No Notifications available</span>
							</div>
						</div>
						<?php endif; ?>

					</div>
				</li>
