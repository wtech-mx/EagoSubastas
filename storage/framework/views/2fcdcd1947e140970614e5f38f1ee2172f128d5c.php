 					
		<div class="col-xs-6"> 	

				<div class="form-group">
                    <?php echo Form::label('language', getPhrase('language'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php echo e(Form::text('language', old('language'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Language',

                    'ng-model' => 'shortcode', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("name"),

					'ng-minlength' => '4',

					'ng-maxlength' => '40',

					'ng-class'=>'{"has-error": formValidate.language.$touched && formValidate.language.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.language.$error" >

	    					<?php echo getValidationMessage(); ?>

	    					<?php echo getValidationMessage('minlength'); ?>

	    					<?php echo getValidationMessage('maxlength'); ?>


					</div>

                </div>






                <div class="form-group">
                    <?php echo Form::label('code', getPhrase('code'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php echo e(Form::text('code', old('code'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Language Code',

                    'ng-model' => 'code', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("name"),

					'ng-minlength' => '2',

					'ng-maxlength' => '4',

					'ng-class'=>'{"has-error": formValidate.code.$touched && formValidate.code.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.code.$error" >

	    					<?php echo getValidationMessage(); ?>

	    					<?php echo getValidationMessage('minlength'); ?>

	    					<?php echo getValidationMessage('maxlength'); ?>


					</div>


					<a class="pull-right btn btn-success" style="margin-top:10px;" href="<?php echo e(GOOGLE_TRANSLATE_LANGUAGES_LINK); ?>" target="_blank">
						<?php echo e(getPhrase('supported_language_codes')); ?>

						</a>

                </div>



                <br>
                
                <div class="form-group">


                    <?php echo Form::label('is_rtl', getPhrase('is_rtl'), ['class' => 'control-label']); ?>


                   	<div class="form-group row">
						<div class="col-md-6">
						<?php echo e(Form::radio('is_rtl', 0, true, array('id'=>'free', 'name'=>'is_rtl'))); ?>

							
							<label for="free"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('No')); ?></label> 
						</div>
						<div class="col-md-6">
						<?php echo e(Form::radio('is_rtl', 1, false, array('id'=>'paid', 'name'=>'is_rtl'))); ?>

							<label for="paid"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('Yes')); ?> 
							</label>
						</div>
					</div>


                </div>


                <div class="buttons pull-right">
					<button class="btn btn-success" 
					ng-disabled='!formValidate.$valid'><?php echo e(getPhrase('save')); ?></button>
				</div>


            </div>

