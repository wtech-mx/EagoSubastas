				
			<div class="col-xs-6"> 	

				
                <div class="form-group">
                    <?php echo Form::label('title', getPhrase('title'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php echo e(Form::text('title', old('title'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Country Name',

                    'ng-model' => 'title', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("name"),

                    'ng-minlength' => '2',

                    'ng-maxlength' => '100',

                    'ng-class'=>'{"has-error": formValidate.title.$touched && formValidate.title.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.title.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('minlength'); ?>


                            <?php echo getValidationMessage('maxlength'); ?>


                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>


                <div class="form-group">
                    <?php echo Form::label('shortcode', getPhrase('shortcode'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php echo e(Form::text('shortcode', old('category'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Shortcode',

                    'ng-model' => 'shortcode', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("name"),

                    'ng-minlength' => '2',

                    'ng-maxlength' => '5',

                    'ng-class'=>'{"has-error": formValidate.shortcode.$touched && formValidate.shortcode.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.shortcode.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('minlength'); ?>


                            <?php echo getValidationMessage('maxlength'); ?>


                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>


               <div class="form-group pull-right">

					<button class="btn btn-success" ng-disabled='!formValidate.$valid'><?php echo e(getPhrase('save')); ?></button>

				</div>

			</div>



                