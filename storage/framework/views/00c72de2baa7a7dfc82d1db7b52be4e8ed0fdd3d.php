<?php $currency_code = getSetting('currency_code','site_settings');?>
<div class="col-xs-12">

			<div class="col-xs-6"> 	

				<div class="form-group">

                    
                    <?php echo Form::label('title', getPhrase('Titulo'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                     <?php
                        $val=old('title');
                        if ($record)
                         $val = $record->title;
    
                    ?>


                    <?php echo e(Form::text('title', old('title'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Titulo',

                    'ng-model' => 'title', 

                    'required' => 'true',

					'ng-minlength' => '2',

					'ng-maxlength' => '100',

                    'ng-init'=>'title="'.$val.'"',

					'ng-class'=>'{"has-error": formValidate.title.$touched && formValidate.title.$invalid}',



                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.title.$error" >

                            
                            Este campo es requerido

	    					<?php echo getValidationMessage('minlength'); ?>


	    					<?php echo getValidationMessage('maxlength'); ?>



					</div>

                </div>

                <?php if(checkRole(['admin'])): ?>
                <div class="form-group">

                    
                    <?php echo Form::label('user_id', getPhrase('Usuario'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('user_id');
                        if ($record)
                         $val = $record->user_id;

                        $selected = null;
                        if($record)
                        $selected = $record->user_id;      
                    ?>

                    

                    
                    <?php echo e(Form::select('user_id', $users , $selected, ['placeholder' => getPhrase('Seleccionar Usuario'),'class'=>'form-control select2',

                            'ng-model'=>'user_id',

                            'required'=> 'true',

                            'ng-init'=>'user_id="'.$val.'"',
                            
                            'ng-class'=>'{"has-error": formValidate.user_id.$touched && formValidate.user_id.$invalid}'

                         ])); ?>



                    
                        <div class="validation-error" ng-messages="formValidate.user_id.$error" >

                            
                            Este campo es requerido

                        </div>

                </div>
                <?php endif; ?>



                <div class="form-group">

                    
                    <?php echo Form::label('category', getPhrase('Lote'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('category_id');
                        if ($record)
                         $val = $record->category_id;

                        $selected = null;
                        if($record)
                        $selected = $record->category_id;      
                    ?>

                    

                    
                    <?php echo e(Form::select('category_id', $categories , $selected, ['placeholder' => getPhrase('Seleccionar'),'class'=>'form-control select2',

                            'ng-model'=>'category_id',

                            'required'=> 'true',

                            'ng-init'=>'category_id="'.$val.'"',

                            'ng-change'=> 'getSubCategories(category_id)', 

                            'ng-class'=>'{"has-error": formValidate.category_id.$touched && formValidate.category_id.$invalid}'

                         ])); ?>



                    
                        <div class="validation-error" ng-messages="formValidate.category_id.$error" >

                            
                            Este campo es requerido

                        </div>

                </div>


                <div class="form-group">


                     <label for="name">Empresa<span class="text-red">*</span></label>


                        <?php 

                        
                        $val=old('sub_category_id');
                        if ($record)
                          $val = $record->sub_category_id;

                        ?>

                        <select ng-init="sub_category_id={id:<?php echo e($val); ?> }" name="sub_category_id" ng-model="sub_category_id" class="form-control select2" ng-options="item.id as item.sub_category for item in sub_categories track by item.id" required="true">

                          <option value="">Seleccionar</option>  

                        </select>




                          <div class="validation-error" ng-messages="formValidate.sub_category_id.$error">

                                
                                Este campo es requerido

                            </div>

                 </div>




                <div class="form-group">
                    <?php echo Form::label('start_date', getPhrase('start_date'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php 

                        $val=old('start_date');
                        if (isset($record->start_date) && $record->start_date!='')
                          $val = date('m/d/Y H:i:s',strtotime($record->start_date));
                    ?>



                    <?php echo e(Form::text('start_date', $value = $val, $attributes = 

                    array('class' => 'form-control', 

                    'id' => 'datetimepicker6',

                    'placeholder'=>'Fecha y hora de inicio',

                    'ng-model' => 'start_date', 

                    'ng-init'=>'start_date="'.$val.'"',

                  
                    ))); ?>



                </div>


                <div class="form-group">
                    
                    <?php echo Form::label('end_date', getPhrase('fecha final'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php 

                        $val=old('end_date');
                        if (isset($record->end_date) && $record->end_date!='')
                          $val = date('m/d/Y H:i:s',strtotime($record->end_date));
                    ?>



                    <?php echo e(Form::text('end_date', $value = $val, $attributes = 

                    array('class' => 'form-control', 

                    'id' => 'datetimepicker7',

                    'placeholder'=>'Fecha y hora de finalización',

                    'ng-model' => 'end_date', 

                    'ng-init'=>'end_date="'.$val.'"',

                  
                    ))); ?>


                </div>







                 <div class="form-group">
                    <?php echo Form::label('live_auction_date', getPhrase('Dia subasta en vivio'), ['class' => 'control-label']); ?>


                    <?php 

                        $val=old('live_auction_date');
                        if (isset($record->live_auction_date) && $record->live_auction_date!='')
                          $val = date('m/d/Y',strtotime($record->live_auction_date));
                    ?>



                    <?php echo e(Form::text('live_auction_date', $value = $val, $attributes = 

                    array('class' => 'form-control', 

                    'id' => 'datepicker',

                    'placeholder'=>'Fecha Subasta en vivio',

                    'ng-model' => 'live_auction_date', 

                    'ng-init'=>'live_auction_date="'.$val.'"',

                  
                    ))); ?>


                </div>

                <div class="form-group">
                    <?php echo Form::label('live_auction_start_time', getPhrase('hora de inicio de la subasta en vivo'), ['class' => 'control-label']); ?>


                    <?php 

                        $val=old('live_auction_start_time');
                        if (isset($record->live_auction_start_time) && $record->live_auction_start_time!='')
                          $val = $record->live_auction_start_time;
                    ?>



                    <?php echo e(Form::text('live_auction_start_time', $value = $val, $attributes = 

                    array('class' => 'form-control', 

                    'id' => 'timepicker1',

                    'placeholder'=>'Hora de inicio de la subasta en vivo',

                    'ng-model' => 'live_auction_start_time', 

                    'ng-init'=>'live_auction_start_time="'.$val.'"',

                    ))); ?>


                </div>


                <div class="form-group">
                    <?php echo Form::label('live_auction_end_time', getPhrase('Hora de finalización de la subasta en vivo'), ['class' => 'control-label']); ?>


                    <?php 

                        $val=old('live_auction_end_time');
                        if (isset($record->live_auction_end_time) && $record->live_auction_end_time!='')
                          $val = $record->live_auction_end_time;
                    ?>



                    <?php echo e(Form::text('live_auction_end_time', $value = $val, $attributes = 

                    array('class' => 'form-control', 

                    'id' => 'timepicker2',

                    'placeholder'=>'Hora de finalización de la subasta en vivo',

                    'ng-model' => 'live_auction_end_time', 

                    'ng-init'=>'live_auction_end_time="'.$val.'"',

                  
                    ))); ?>


                </div>

                  <div class="form-group">

                    <?php echo Form::label('reserve_price', getPhrase('precio de reserva'), ['class' => 'control-label']); ?>

                    (<?php echo e($currency_code); ?>)
                    <span class="text-red">*</span>

                    <?php
                        $val=old('reserve_price');
                        if ($record)
                         $val = $record->reserve_price;
    
                    ?>

                    <?php echo e(Form::text('reserve_price', old('reserve_price'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'precio de reserva',

                    'ng-model' => 'reserve_price', 

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("price"),

                    'ng-init'=>'reserve_price="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.reserve_price.$touched && formValidate.reserve_price.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.reserve_price.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>

                  <div class="form-group">

                    <?php echo Form::label('tiros', getPhrase('tiros'), ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('tiros');
                        if ($record)
                         $val = $record->tiros;

                    ?>

                    <?php echo e(Form::text('tiros', old('tiros'), $attributes =

                    array('class' => 'form-control',

                    'placeholder' => 'Tiros',

                    'ng-model' => 'tiros',

                    'required' => 'true',

                    'ng-pattern' => getRegexPattern("price"),

                    'ng-init'=>'tiros="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.tiros.$touched && formValidate.tiros.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.tiros.$error" >

                            <?php echo getValidationMessage(); ?>


                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>
   

                <div class="form-group">

                    <?php echo Form::label('minimum_bid', getPhrase('oferta mínima'), ['class' => 'control-label']); ?>

                    (<?php echo e($currency_code); ?>)
                   
                    <?php
                        $val=old('minimum_bid');
                        if ($record)
                         $val = $record->minimum_bid;
    
                    ?>

                    <?php echo e(Form::text('minimum_bid', old('minimum_bid'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'Oferta mínima',

                    'ng-model' => 'minimum_bid', 

                    'ng-pattern' => getRegexPattern("price"),

                    'ng-init'=>'minimum_bid="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.minimum_bid.$touched && formValidate.minimum_bid.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.minimum_bid.$error" >

                           
                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>



                <div class="form-group">

                    <?php echo Form::label('is_it_bid_increment', getPhrase('es un incremento de la oferta'), ['class' => 'control-label']); ?>


                    <div class="form-group row">
                        <div class="col-md-6">
                        <?php echo e(Form::radio('is_bid_increment', 0, false, array('id'=>'bid_increment_no', 'name'=>'is_bid_increment'))); ?>

                            
                            <label for="bid_increment_no"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span>

                                NO
                            </label>
                        </div>
                        <div class="col-md-6">
                        <?php echo e(Form::radio('is_bid_increment', 1, true, array('id'=>'bid_increment_yes', 'name'=>'is_bid_increment'))); ?>

                            <label for="bid_increment_yes"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span>

                                SI
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">

                    <?php echo Form::label('bid_increment', getPhrase('incremento de ofertat'), ['class' => 'control-label']); ?>

                    (<?php echo e($currency_code); ?>)
                   
                    <?php
                        $val=old('bid_increment');
                        if ($record)
                         $val = $record->bid_increment;
    
                    ?>

                    <?php echo e(Form::text('bid_increment', old('bid_increment'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'incremento de oferta',

                    'ng-model' => 'bid_increment', 

                  
                    'ng-init'=>'bid_increment="'.$val.'"',

                    'ng-pattern' => getRegexPattern("price"),

                    'ng-class'=>'{"has-error": formValidate.bid_increment.$touched && formValidate.bid_increment.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.bid_increment.$error" >

                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>




               


                 <div class="form-group">

                    <?php echo Form::label('is_buynow', getPhrase('es comprar ahora artículo'), ['class' => 'control-label']); ?>


                    <div class="form-group row">
                        <div class="col-md-6">
                        <?php echo e(Form::radio('is_buynow', 0, false, array('id'=>'buynow_no', 'name'=>'is_buynow'))); ?>

                            
                            <label for="buynow_no"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span>

                                NO
                            </label>
                        </div>
                        <div class="col-md-6">
                        <?php echo e(Form::radio('is_buynow', 1, true, array('id'=>'buynow_yes', 'name'=>'is_buynow'))); ?>

                            <label for="buynow_yes"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span>

                                SI
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">

                    <?php echo Form::label('buy_now_price', getPhrase('comprar ahora precio'), ['class' => 'control-label']); ?>

                    (<?php echo e($currency_code); ?>)
                   
                    <?php
                        $val=old('buy_now_price');
                        if ($record)
                         $val = $record->buy_now_price;
    
                    ?>

                    <?php echo e(Form::text('buy_now_price', old('buy_now_price'), $attributes = 

                    array('class' => 'form-control', 

                    'placeholder' => 'comprar ahora precio',

                    'ng-model' => 'buy_now_price', 

                   
                    'ng-pattern' => getRegexPattern("price"),

                    'ng-init'=>'buy_now_price="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.buy_now_price.$touched && formValidate.buy_now_price.$invalid}',

                    ))); ?>


                    <div class="validation-error" ng-messages="formValidate.buy_now_price.$error" >

                            
                            <?php echo getValidationMessage('pattern'); ?>


                    </div>

                </div>


                <div class="form-group">

                    <?php echo Form::label('description', getPhrase('Descripcion'), ['class' => 'control-label']); ?>


                     <span class="text-red">*</span>

                      <?php
                        $val=old('description');
                        if ($record)
                         $val = $record->description;
    
                    ?>
                   
                    <?php echo e(Form::textarea('description', old('description'), $attributes = 

                    array('class' => 'form-control ckeditor', 

                    'placeholder' => 'Descripcion',

                    'ng-model' => 'description',

                    'required' => 'true',

                    'ng-init'=>'description="'.$val.'"',

                    'ng-class'=>'{"has-error": formValidate.description.$touched && formValidate.description.$invalid}',

                    ))); ?>



                    
                    <div class="validation-error" ng-messages="formValidate.description.$error" >

                        <?php echo getValidationMessage(); ?>


                    </div>

                </div>


            </div>



            <div class="col-xs-6">  

                <div class="form-group">

                    <?php echo Form::label('international_shipping', getPhrase('envío internacional'), ['class' => 'control-label']); ?>


                    <div class="form-group row">
                        <div class="col-md-6">
                        <?php echo e(Form::radio('international_shipping', 0, true, array('id'=>'yes', 'name'=>'international_shipping'))); ?>

                            
                            <label for="yes"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('No')); ?></label> 
                        </div>
                        <div class="col-md-6">
                        <?php echo e(Form::radio('international_shipping', 1, false, array('id'=>'no', 'name'=>'international_shipping'))); ?>

                            <label for="no"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> <?php echo e(getPhrase('Yes')); ?> 
                            </label>
                        </div>
                    </div>

                </div>


                <div class="form-group">

                    <?php echo Form::label('shipping_conditions', getPhrase('pago y envio'), ['class' => 'control-label']); ?>


                    <?php
                        $val=old('shipping_conditions');
                        if ($record)
                         $val = $record->shipping_conditions;
    
                    ?>

                     
                    <?php echo e(Form::textarea('shipping_conditions', old('condiciones de envío'), $attributes = 

                    array('class' => 'form-control ckeditor',

                    'ng-model' => 'shipping_conditions',

                     'id'=>'shipping',

                    'ng-init'=>'shipping_conditions="'.$val.'"',


                    ))); ?>



                </div>



                



                <div class="form-group">

                    <?php echo Form::label('shipping_terms', getPhrase('condiciones'), ['class' => 'control-label']); ?>


                      <?php
                        $val=old('shipping_terms');
                        if ($record)
                         $val = $record->shipping_terms;
    
                    ?>


                    <?php echo e(Form::textarea('shipping_terms', old('shipping_terms'), $attributes = 

                    array('class' => 'form-control ckeditor',

                    'placeholder' => 'Condiciones de envío',

                    'id'=>'terms',

                    'ng-model' => 'shipping_terms',


                    'ng-init'=>'shipping_terms="'.$val.'"',
                    
                    ))); ?>




                </div>



                 <div class="form-group">

                    <?php echo Form::label('make_featured', getPhrase('Se factura'), ['class' => 'control-label']); ?>


                    <div class="form-group row">
                        <div class="col-md-6">
                        <?php echo e(Form::radio('make_featured', 0, false, array('id'=>'featured_no', 'name'=>'make_featured'))); ?>

                            

                            <label for="featured_no"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> No</label>
                        </div>
                        <div class="col-md-6">
                        <?php echo e(Form::radio('make_featured', 1, true, array('id'=>'featured_yes', 'name'=>'make_featured'))); ?>


                            <label for="featured_yes"> <span class="fa-stack radio-button"> <i class="mdi mdi-check active"></i> </span> Si</label>
                        </div>
                    </div>
                </div>


                <?php if(checkRole(['admin'])): ?>
                <div class="form-group">


                         <?php echo Form::label('auction_status', 'Estado de Subasta', ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('auction_status');
                        if ($record)
                         $val = $record->auction_status;

                        $selected = null;
                        if($record)
                        $selected = $record->auction_status;
                    ?>




                    <?php echo e(Form::select('auction_status', auctionstatusoptions() , $selected, ['placeholder' => getPhrase('Seleccionar'),'class'=>'form-control select2',


                            'ng-model'=>'auction_status',

                            'required'=> 'true',

                            'ng-init'=>'auction_status="'.$val.'"',

                            'ng-class'=>'{"has-error": formValidate.auction_status.$touched && formValidate.auction_status.$invalid}'

                         ])); ?>


                        <div class="validation-error" ng-messages="formValidate.auction_status.$error" >

                            
                            Este campo es requerido

                        </div>

                </div>




                 <div class="form-group">


                          <?php echo Form::label('admin_status','Estado de administrador', ['class' => 'control-label']); ?>


                    <span class="text-red">*</span>

                    <?php
                        $val=old('admin_status');
                        if ($record)
                         $val = $record->admin_status;

                        $selected = null;
                        if($record)
                        $selected = $record->admin_status;      
                    ?>

                    <?php echo e(Form::select('admin_status', adminstatusoptions() , $selected, ['placeholder' => getPhrase('Seleccionar'),'class'=>'form-control select2',

                            'ng-model'=>'admin_status',

                            'required'=> 'true',

                            'ng-init'=>'admin_status="'.$val.'"',

                            'ng-class'=>'{"has-error": formValidate.admin_status.$touched && formValidate.admin_status.$invalid}'

                         ])); ?>



                    
                        <div class="validation-error" ng-messages="formValidate.admin_status.$error" >

                            
                            Este campo es requerido

                        </div>

                </div>
                <?php endif; ?>



                 <div class="form-group">

                     <?php echo Form::label('image', getPhrase('image'), ['class' => 'control-label']); ?> <b><small style="color:red;">(950x650 para una buena resolución)</small></b>

                    <div class="row"> 

                       <div class="col-md-6">

                        <?php echo Form::file('image', array('id'=>'image_input', 'accept'=>'.png,.jpg,.jpeg')); ?>


                        </div>

                        <?php if(isset($record) && $record) { 

                              if($record->image!='') {

                            ?>

                        <div class="col-md-6">

                            <img class="auction-create-img" src="<?php echo e(getAuctionImage($record->image,'auction')); ?>" alt="<?php echo e($record->title); ?>"/>

                        </div>

                        <?php } } ?>

                     </div>   

                </div>



               <div class="form-group pull-right">

					<button class="btn btn-success" ng-disabled='!formValidate.$valid'>Guardar</button>



				</div>

			</div>

</div>


                