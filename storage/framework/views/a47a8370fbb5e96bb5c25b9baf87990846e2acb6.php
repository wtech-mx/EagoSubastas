<?php $__env->startSection('custom_div'); ?>

<?php if(isset($record) && count($record)): ?>
    <div ng-controller="auctionsController" ng-init="initFunctions()">
<?php else: ?>
    <div ng-controller="auctionsController">
<?php endif; ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php echo $__env->make('bidder.leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--Dashboard section -->


    <div class="col-lg-9 col-md-8 col-sm-12 au-onboard">
            <a href="<?php echo e(URL_HOME); ?>" class="au-middles justify-content-start"> <?php echo e(getPhrase('home')); ?> &nbsp;<span> / <?php echo e($title); ?> </span></a>

            <div class="au-left-side form-auth-style">


            	<?php echo e(Form::model($record, 
				array('url' => URL_USER_SHIPPING_ADDRESS, 
				'method'=>'PATCH', 'name'=>'formValidate' , 'novalidate'=>''))); ?>


                <div class="row">

                	<div class="col-lg-6">

                	<div class="form-group">

                    <?php echo Form::label('shipping_name', getPhrase('shipping_name'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('shipping_name');
                        if ($record)
                         $val = $record->shipping_name;     
                    ?>

                    <?php echo e(Form::text('shipping_name', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Shipping Name',

                    'ng-model' => 'shipping_name', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("name"),

					'ng-minlength' => '2',

					'ng-maxlength' => '20',

                    'ng-init'=>'shipping_name="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.shipping_name.$touched && formValidate.shipping_name.$invalid}',

                    ))); ?>



                    <div class="validation-error" ng-messages="formValidate.shipping_name.$error" >

	    					<?php echo getValidationMessage(); ?>


	    					<?php echo getValidationMessage('minlength'); ?>


	    					<?php echo getValidationMessage('maxlength'); ?>


	    					<?php echo getValidationMessage('pattern'); ?>


					</div>

                </div>



                <div class="form-group">

                    <?php echo Form::label('shipping_phone', getPhrase('shipping_phone'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('shipping_phone');
                        if ($record)
                         $val = $record->shipping_phone;     
                    ?>

                    <?php echo e(Form::text('shipping_phone', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Shipping Phone',

                    'ng-model' => 'shipping_phone', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("phone"),

                    'ng-maxlength' => '20',

                    'ng-init'=>'shipping_phone="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.shipping_phone.$touched && formValidate.shipping_phone.$invalid}',



                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.shipping_phone.$error" >

                            <?php echo getValidationMessage('phone'); ?>


                            <?php echo getValidationMessage('maxlength'); ?>


                    </div>

                </div>
                


                
                 <div class="form-group">

                        <label for="name"> <?php echo e(getPhrase('state')); ?> <span class="text-red">*</span></label>


                        <?php 

                        
                        $val=old('shipping_state');
                        if ($record)
                          $val = $record->shipping_state;

                        ?>

                        <select ng-init="shipping_state={id:<?php echo e($val); ?> }" name="shipping_state" ng-model="shipping_state" class="form-control select2" ng-options="item.id as item.state for item in states track by item.id" ng-change="getCities(shipping_state)" required="true">

                          <option value="">Select</option>  

                        </select>

                         <div class="validation-error" ng-messages="formValidate.shipping_state.$error">

                                <?php echo getValidationMessage(); ?>

                        </div>
                 </div>


                



                  <div class="form-group">

                    <?php echo Form::label('shipping_address', getPhrase('shipping_address'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                   <?php
                        $val=old('shipping_address');
                        if ($record)
                         $val = $record->shipping_address;     
                    ?>

                    <?php echo e(Form::textarea('shipping_address', $val, $attributes = 

                    array('class' => 'form-control', 'rows'=>3, 

                    'placeholder' => 'Shipping Address',

                    'ng-model' => 'shipping_address', 

                    'ng-maxlength' => '100',

                    'required'=>'true',

                    'ng-init'=>'shipping_address="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.shipping_address.$touched && formValidate.shipping_address.$invalid}',


                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.shipping_address.$error" >

                            <?php echo getValidationMessage(); ?>

                           
                            <?php echo getValidationMessage('maxlength'); ?>


                    </div>

                </div>
                 


                </div>



                <div class="col-lg-6">


                     <div class="form-group">

                    <?php 

                    $readonly = '';
                    $val=old('email');
                    if ($record) {
                        $readonly = 'readonly="true"';
                        $val = $record->email;
                    }



                    ?>

                    <?php echo Form::label('shipping_email', getPhrase('shipping_email'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php echo e(Form::email('shipping_email', $val, $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Shipping Email',

                    'ng-model' => 'shipping_email', 

                    'required' => 'true',

                    $readonly,

                    'ng-init'=>'shipping_email="'.$val.'"',
                    
                    'ng-class'=>'{"has-error": formValidate.shipping_email.$touched && formValidate.shipping_email.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.shipping_email.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('email'); ?>


                    </div>

                </div>

                

                <div class="form-group">

                    <?php echo Form::label('shipping_country', getPhrase('shipping_country'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('shipping_country');
                        if ($record)
                         $val = $record->shipping_country;
     
                    ?>

                    <?php echo e(Form::select('shipping_country', $countries, $val, ['placeholder' => getPhrase('select_country'),'class'=>'form-control select2',

                            'ng-model'=>'shipping_country',

                            'required'=> 'true',

                            'ng-init'=>'shipping_country="'.$val.'"',

                            'ng-change'=>'getStates(shipping_country)', 

                            'ng-class'=>'{"has-error": formValidate.shipping_country.$touched && formValidate.shipping_country.$invalid}'

                         ])); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.shipping_country.$error" >

                        <?php echo getValidationMessage(); ?>


                    </div>

                </div>


                

                <div class="form-group">

                       <label for="name"> <?php echo e(getPhrase('city')); ?> <span class="text-red">*</span></label>

                        <?php 

                        $val=old('shipping_city');
                        if ($record)
                          $val = $record->shipping_city;

                        ?>

                        <select ng-init="shipping_city={id:<?php echo e($val); ?> }" name="shipping_city" ng-model="shipping_city" class="form-control select2" ng-options="item.id as item.city for item in cities track by item.id" required="true">

                          <option value="">Select</option>  

                        </select>

                         <div class="validation-error" ng-messages="formValidate.shipping_city.$error">

                                <?php echo getValidationMessage(); ?>

                        </div>
                 </div>



                 <div class="form-group">

					<button class="btn btn-primary login-bttn" ng-disabled='!formValidate.$valid'><?php echo e(getPhrase('save')); ?></button>

				</div>



                </div>

               

            </div> 

            <?php echo Form::close(); ?>


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