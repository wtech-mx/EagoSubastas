<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">

            <div class="col-xs-12 form-group">
                <?php echo Form::label('receiver', 'Recipient', ['class' => 'control-label']); ?>


                <span class="text-red">*</span>

                <?php if(isset($users)): ?>

                    

                     <?php echo e(Form::select('receiver', $users,  old('receiver') , ['placeholder' => getPhrase('select_user'),'class'=>'form-control select2',

                        'ng-model'=>'receiver',

                        'required'=> 'true',

                        'ng-class'=>'{"has-error": formValidate.receiver.$touched && formValidate.receiver.$invalid}'

                    ])); ?>


                    <div class="validation-error" ng-messages="formValidate.receiver.$error" >

                        <?php echo getValidationMessage(); ?>


                    </div>


                <?php elseif(isset($user)): ?>
                    <?php echo Form::text('receiver', old('receiver', $user ? $user : ''), ['class' => 'form-control', 'disabled']); ?>

                <?php endif; ?>

            </div>

            <div class="col-xs-12 form-group">
                <?php echo Form::label('subject', 'Subject', ['class' => 'control-label']); ?>


                <span class="text-red">*</span>

                <?php if(isset($users)): ?>

                    


                    <?php echo e(Form::text('subject', old('subject'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Subject',

                    'ng-model' => 'subject', 

                    'required' => 'true',

                    'ng-minlength' => '2',

                    'ng-maxlength' => '200',

                    'ng-class'=>'{"has-error": formValidate.subject.$touched && formValidate.subject.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.subject.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('minlength'); ?>


                            <?php echo getValidationMessage('maxlength'); ?>


                    </div>

                <?php else: ?>
                    <?php echo Form::text('subject', old('subject', isset($topic) ? $topic->subject : ''), ['class' => 'form-control', 'disabled']); ?>

                <?php endif; ?>
                
            </div>

            <div class="col-xs-12 form-group">

                <?php echo Form::label('content', 'Message', ['class' => 'control-label']); ?>

                <span class="text-red">*</span>


                

                 <?php echo e(Form::textarea('content', old('content'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Message',

                    'ng-model' => 'content',

                    'required'=>'true', 

                    'ng-class'=>'{"has-error": formValidate.content.$touched && formValidate.content.$invalid}',

                    ))); ?>


                 <div class="validation-error" ng-messages="formValidate.content.$error" >
 
                        <?php echo getValidationMessage(); ?>


                 </div>
                        

                
            </div>

            <div class="col-xs-12">
            <div class="form-group pull-right">

                    <button class="btn btn-success" ng-disabled='!formValidate.$valid'><?php echo e(getPhrase('send')); ?></button>

            </div>
            </div>



        </div>
    </div>
</div>
<?php $__env->startSection('javascript'); ?>
    ##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##

<?php $__env->stopSection(); ?>