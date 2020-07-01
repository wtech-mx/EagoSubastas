<?php $__env->startSection('custom_div'); ?>
<div ng-controller="auctionsController" ng-init="initFunctions()">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--FAQ BODY SECTION-->
    
     <section class="au-categorys">
      <div class="container">
        <?php if($faqs): ?>
         <div class="row"> 
           
           <!--ASIDE BAR SECTION-->
            <div class="col-lg-3 col-md-3 col-sm-12">
            
            <!--All Category Section-->
             <div class="au-all-category">
                <ul class="au-list-item">
                  <?php $c=0;?>
                  <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php 
                  $class='';
                  $c=$c+1;
                  
                  if ($c==1)
                    $class='active';

                  ?>

                
                  <input id="first_fc_id" type="hidden" value="<?php echo e($faq->id); ?>">

                  <li id="<?php echo e($faq->id); ?>" class="<?php echo e($class); ?>"><a href="javascript:void(0);" ng-click="getCategoryFaqs(<?php echo e($faq->id); ?>)"> <?php echo e($faq->title); ?> </a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>               
             </div>

            </div> 
            


            <!--PRODUCTS SECTION-->
             <div class="col-lg-9 col-md-9 col-sm-12  ">
             <div class=" au-wrapper-main">
                
                <div class="cs-card cart-card card-show">

                 <div class="cas-card-header">
                   
                   <?php echo e($title); ?>

                   
                </div>

               <div class="row">


                <div id="faqs_block" class="col-sm-12">

                  <div class="cs-card-content card-items-list" ng-show="faq_length>0">


 

                    <div class="panel panel-default faq-panel" ng-repeat="question in category_faqs">


                      <div class="panel-heading">
                        <h5 class="panel-title ">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{question.id}}" class="faq-ques faq-panel-title">
                            {{question.question_text}}
                          </a>
                        </h5>
                      </div>
                      <div id="collapse{{question.id}}" class="panel-collapse collapse">
                        <div class="panel-body faq-panel-body">
                            
                          {{question.answer_text}}
              
                        </div>
                      </div>


                    </div>
                 </div>

                 <h4 ng-if = "faq_length <= 0 " class="text-center"> 
                  <div class="empty-data">
                    No FAQs Available
                  </div>
                 </h4>

               </div>
               
             
            </div>  
          </div>

          </div>
          </div>

         </div>
         <?php else: ?>
         <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <h4 class="text-center"> <?php echo e(getPhrase('no_faqs_available')); ?> </h4>
              </div>
          </div>
         <?php endif; ?>
      </div>    
    </section>
    

    <!--FAQ BODY SECTION-->


    <!--RECENT WINNERS SECTION-->
    <?php echo $__env->make('home.pages.auctions.recent-winners', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--RECENT WINNERS SECTION-->

    <?php echo $__env->make('home/testimonials', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('home/partners', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_scripts'); ?>

<?php echo $__env->make('common.validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('common.alertify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('home.pages.auctions.auctions-js-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>