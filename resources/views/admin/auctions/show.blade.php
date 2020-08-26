@extends($layout)

 @section('header_scripts')
<link href="{{CSS}}dropzone/basic.css" rel="stylesheet">

<script src="{{JS}}dropzone.js"></script>
@stop

@section('custom_div')
<div ng-controller="prepareAuctionData">
@stop

@section('content')
    <h3 class="page-title"> {{getPhrase('auctions')}} </h3>

    <div class="panel panel-default">
        <div class="panel-heading">
           {{ getPhrase('view') }}
        </div>


<?php $currency = getSetting('currency_code','site_settings');?>

<div class="panel-body">


         <!-- Nav tabs -->
<ul class="nav nav-tabs nav-justified">
    <li class="nav-item">
{{--        <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab"><i class="fa fa-list"></i> {{getPhrase('auction_details')}} </a>--}}
        <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab"><i class="fa fa-list"></i> Detalles de subasta </a>
    </li>

    <li class="nav-item">
{{--        <a class="nav-link" data-toggle="tab" href="#panel2" role="tab"><i class="far fa-image"></i> {{getPhrase('images')}} </a>--}}
         <a class="nav-link" data-toggle="tab" href="#panel2" role="tab"><i class="fa fa-image"></i>Imagenes </a>
    </li>

    <li class="nav-item">
{{--        <a class="nav-link" data-toggle="tab" href="#panel3" role="tab"><i class="fa fa-user"></i> {{getPhrase('auction_bidders')}} </a>--}}
        <a class="nav-link" data-toggle="tab" href="#panel3" role="tab"><i class="fa fa-user"></i> Licitadores de subasta </a>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel4" role="tab"><i class="fa fa-send"></i> Invitacion </a>
    </li> --}}

</ul>




<!-- Tab panels -->
<div class="tab-content">


    <!--Panel 1-->
    <div class="tab-pane fade in active" id="panel1" role="tabpanel">

        <br>
            <div class="row">

                <div class="col-md-12">

                    <div class="table-responsive">

                    <table class="table table-bordered table-striped">
                        <tr>
                           <!-- <th> {{getPhrase('title')}} </th> -->
                            <td field-key='title'>{{ $record->title }}</td>
                        </tr>

                        <tr>
                           <!-- <th> {{getPhrase('image')}} </th> -->
                            <td field-key='image'> <a href="{{getAuctionImage($record->image,'auction')}}" target="_blank"> <img src="{{getAuctionImage($record->image)}}" alt="{{$record->title}}" width="50"> </a> </td>
                        </tr>


                        <tr>
                           <!-- <th> {{getPhrase('category')}}  </th> -->
                            <td field-key='category'> {{ $record->category }} </td>
                        </tr>


                        <tr>
                            <!--<th> {{getPhrase('sub_category')}}  </th> -->
                            <td field-key='sub_category'> {{ $record->sub_category }} </td>
                        </tr>


                        <tr>
                            <!--<th> {{getPhrase('seller')}}  </th> -->
                            <td field-key='seller'> {{ $record->username }} </td>
                        </tr>


                        <tr>
                          <!--  <th> {{getPhrase('start_date')}}  </th> -->
                            <td field-key='start_date'>  @if ($record->start_date) <?php echo date(getSetting('date_format','site_settings').' H:i:s', strtotime($record->start_date));?> @endif </td>
                        </tr>

                        <tr>
                          <!--  <th> {{getPhrase('end_date')}}  </th> -->
                            <td field-key='end_date'>  @if ($record->end_date) <?php echo date(getSetting('date_format','site_settings').' H:i:s', strtotime($record->end_date));?> @endif </td>
                        </tr>


                        <tr>
                         <!--  <th> {{getPhrase('live_auction_date')}}  </th>-->
                            <td>  @if ($record->live_auction_date) <?php echo date(getSetting('date_format','site_settings'), strtotime($record->live_auction_date));?> @endif </td>
                        </tr>

                        <tr>
                          <!--  <th> {{getPhrase('live_auction_start_time')}}  </th>-->
                            <td>  {{ $record->live_auction_start_time }} </td>
                        </tr>


                         <tr>
                           <!-- <th> {{getPhrase('live_auction_end_time')}}  </th>-->
                            <td>  {{ $record->live_auction_end_time }} </td>
                        </tr>

                        <tr>
                           <!-- <th> {{getPhrase('minimum_bid')}}  </th>-->
                            <td field-key='minimum_bid'> {{$currency}}{{ $record->minimum_bid }} </td>
                        </tr>

                        <tr>
                          <!--  <th> {{getPhrase('reserve_price')}}  </th>-->
                            <td field-key='reserve_price'> {{$currency}}{{ $record->reserve_price }} </td>
                        </tr>

                        <tr>
                          <!--  <th> {{getPhrase('buy_now_price')}}  </th>-->
                            <td field-key='buy_now_price'> {{$currency}}{{ $record->buy_now_price }} </td>
                        </tr>

                         <tr>
                           <!-- <th> {{getPhrase('bid_increment')}}  </th>-->
                            <td field-key='bid_increment'> {{$currency}}{{ $record->bid_increment }} </td>
                        </tr>

                        <tr>
                          <!--  <th> {{getPhrase('description')}}  </th>-->
                            <td field-key='description'> {!! $record->description !!} </td>
                        </tr>

                        <tr>
                          <!-- <th> {{getPhrase('shipping_conditions')}}  </th>-->
                            <td field-key='shipping_conditions'> {!! $record->shipping_conditions !!} </td>
                        </tr>

                        <tr>
                          <!--  <th> {{getPhrase('international_shipping')}}  </th>-->
                            <td field-key='international_shipping'>
                                @if ($record->international_shipping==1)
                                {{ getPhrase('yes') }}
                                @else
                                {{ getPhrase('no') }}
                                @endif
                            </td>
                        </tr>


                        <tr>
                          <!--  <th> {{getPhrase('shipping_terms')}}  </th>-->
                            <td field-key='shipping_terms'> {!! $record->shipping_terms !!} </td>
                        </tr>


                        <tr>
                         <!-- <th> {{getPhrase('featured')}}  </th>-->
                            <td field-key='make_featured'>
                                @if ($record->make_featured==1)
                                {{ getPhrase('yes') }}
                                @else
                                {{ getPhrase('no') }}
                                @endif
                            </td>
                        </tr>


                        <tr>
                          <!-- <th> {{getPhrase('auction_status')}}  </th>-->
                            <td field-key='auction_status'> {{ ucfirst($record->auction_status) }} </td>
                        </tr>

                        <tr>
                           <!-- <th> {{getPhrase('admin_status')}}  </th>-->
                            <td field-key='admin_status'> {{ ucfirst($record->admin_status) }} </td>
                        </tr>


                        <tr>
                          <!--  <th> {{getPhrase('created_by')}}  </th>-->
                            <td field-key='created_by'> {{ $record->created_by }} </td>
                        </tr>

                         <tr>
                          <!--  <th> {{getPhrase('last_updated_by')}}  </th>-->
                            <td field-key='updated_by_name'> {{ $record->updated_by_name }} </td>
                        </tr>







                        <tr>
                          <!--  <th> {{getPhrase('admin_commission_type')}}  </th> -->
                            <td field-key='admin_commission_type'>
                                @if ($record->admin_commission_type=='auction')
                                {{ getPhrase('per_auction')}}
                                @else
                                {{ ucfirst($record->admin_commission_type) }}
                                @endif
                                 </td>
                        </tr>



                        <tr>
                          <!--  <th> {{getPhrase('commission_value')}}  </th> -->
                            <td field-key='commission_value'> @if ($record->commission_value>0) {{$currency}}{{ $record->commission_value }} @endif </td>
                        </tr>



                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/.Panel 1-->







    <!--Panel 2-->
    <div class="tab-pane fade" id="panel2" role="tabpanel">

        <br>
        <div class="row">

        <div class="col-md-12">
{{--                <h4>{{getPhrase('upload_images')}}</h4>--}}
                     <h4>Subir imagenes </h4>

                    {!! Form::open(array('url' => URL_AUCTIONS_UPLOAD_IMAGES.$record->slug, 'method' => 'POST', 'novalidate'=>'','name'=>'formUsers',
                        'files'=>'true','class'=>"dropzone", 'id'=>"real-dropzone",'multiple'=>true))
                    !!}

                    <div class="row">

                        <div class="col-lg-4">
                            <div class="dragble-area">
                                 <div class="dz-message">
                                    <h4 style="text-align: center;color:#428bca;">Soltar archivos en esta área<span class="glyphicon glyphicon-hand-down"></span></h4>
                                </div>
                            </div>

                             <div class="instuctions-block mt-3">
                                <ul>
{{--                                    <li>{{getPhrase('only_image_files_are_accepted')}}</li>--}}
                                    <li>solo se aceptan archivos de imagen</li>

{{--                                    <li>{{getPhrase('files_are_uploaded_as_soon_as_you_drop_them')}}</li>--}}
                                    <li>los archivos se cargan para que puedas soltarlos</li>

{{--                                    <li>{{getPhrase('maximum_allowed_size_is_5MB')}}</li>--}}
                                    <li>{{getPhrase('tamaño máximo permitido de 5 MB')}}</li>

{{--                                    <li style="color:red;">{{getPhrase('for_good_resolution_image_width_height_950x650')}}</li>--}}
                                      <li style="color:red;">para una buena resolución ancho de imagen altura 950x650</li>
                                </ul>

                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="scroll-height">
                            <h3 class="files-title">{{getPhrase('total_uploaded_files')}} <span id="photoCounter"></span></h3>
                            <div class="dropzone-previews" id="dropzonePreview"></div>
                            </div>
                         </div>

                    </div>


                     <div class="fallback">
                         <input type="file" name="file" multiple />
                    </div>


                    {!! Form::close() !!}

            </div>

        </div>


            <!-- Dropzone Preview Template -->
    <div id="preview-template" style="display: none;">

        <div class="dz-preview dz-file-preview">
            <div class="dz-image pdf-overlay" >  <img data-dz-thumbnail="">  </div>

            <div class="dz-details">
                <div class="dz-size"><span data-dz-size=""></span></div>
                <div class="dz-filename"><span data-dz-name=""></span></div>
            </div>
            {{-- <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div> --}}
            <div class="dz-error-message"><span data-dz-errormessage=""></span></div>

            <div class="dz-success-mark">
                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                    <title>Check</title>
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                    </g>
                </svg>
            </div>

            <div class="dz-error-mark">
                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                    <title>error</title>
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                            <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                        </g>
                    </g>
                </svg>
            </div>

        </div>
    </div>
    <!-- End Dropzone Preview Template -->

    </div>
    <!--/.Panel 2-->


    <!--/.Panel 2-->


    <!--Panel 3-->
    <div class="tab-pane fade" id="panel3" role="tabpanel">
        <br>
        <div class="row">

            <div class="col-md-12">

                <div class="table-responsive">

                <table class="table table-bordered table-striped datatable">

                <thead>

                    <tr>
                        <th>#</th>

{{--                        <th> {{getPhrase('username')}} </th>--}}
                         <th> User </th>

{{--                        <th> {{getPhrase('email')}} </th>--}}
                        <th> Email</th>


{{--                        <th> {{getPhrase('image')}} </th>--}}
                        <th> Imagen </th>

{{--                        <th> {{getPhrase('no_of_times')}} </th>--}}
                        <th> no de veces </th>

{{--                        <th> {{getPhrase('highest_bid')}} </th>--}}
                         <th> apuesta más alta </th>



                        <th>&nbsp;Acciones</th>

                    </tr>
                </thead>
               @if (isset($bidders) && count($bidders))
                <tbody>
                   @if (count($bidders))
                       @foreach ($bidders as $user)

                       <?php
                       $highest_bid='';
                       $highestbid = $user->getHighestBid();

                       if (!empty($highestbid))
                        $highest_bid = $highestbid->bid_amount;



                       ?>
                            <tr>
                                <td>#</td>
                                <td field-key='name'>
                                @if (checkRole(getUserGrade(1)))
                                <a href="{{URL_USERS_VIEW}}/{{$user->slug}}">{{$user->username}}</a>
                                @else
                                {{$user->username}}
                                @endif
                                </td>

                                <td field-key='email'> {{ $user->email }} </td>

                                <td field-key='image'> <img style="width:30px;" src="{{getProfilePath($user->image)}}"  />  </td>

                                <td> {{$user->no_of_times}} </td>

                                <td> @if ($highest_bid) {{$currency}}{{$highest_bid}} @endif </td>


                                <td>
{{--                                    <a href="#" ng-click="getBidHistory({{$user->id}})" data-toggle="modal" data-target="#bidHistoryModal" title="view total bid history of {{$user->username}}" class="btn btn-xs btn-primary"> {{getPhrase('bid_history')}} </a>--}}
                                    <a href="#" ng-click="getBidHistory({{$user->id}})" data-toggle="modal" data-target="#bidHistoryModal" title="view total bid history of {{$user->username}}" class="btn btn-xs btn-primary"> historial de ofertas </a>


                                    @if (checkRole(['admin']))

                                    @if ($send_email)
{{--                                    <a href="#" onclick="auctionBidder({{$user->id}})" data-toggle="tooltip" data-placement="bottom" class="btn btn-xs btn-info" title="send email to {{$user->username}} regarding bidding payment"> {{getPhrase('send_email')}} </a>--}}
                                         <a href="#" onclick="auctionBidder({{$user->id}})" data-toggle="tooltip" data-placement="bottom" class="btn btn-xs btn-info" title="send email to {{$user->username}} regarding bidding payment"> enviar correo electrónico </a>
                                    @endif

                                        {{-- <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-{{$user->id}}">Ganador</a> --}}

                                    @endif

                                </td>
                            </tr>
                        @endforeach

                        @else
                            <tr>
{{--                                <td colspan="6"> {{ getPhrase('no_entries_in_table') }}</td>--}}
                                <td colspan="6"> no hay entradas en la tabla</td>
                            </tr>
                        @endif
                </tbody>
                @endif
            </table>


                 </div>

            </div>

        </div>


    </div>
    <!--/.Panel 3-->

</div>


        <p>&nbsp;</p>

{{--        <a href="{{ URL_LIST_AUCTIONS }}" class="btn btn-default"> {{ getPhrase('back_to_list') }} </a>--}}
            <a href="{{ URL_LIST_AUCTIONS }}" class="btn btn-default"> volver a la lista </a>

        </div>







<!-- Bid history Modal -->
<div class="modal fade right" id="bidHistoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-full-height modal-right" role="document">


    <div class="modal-content">
      <div class="modal-header">
{{--        <h5 class="modal-title" id="exampleModalLabel">{{getPhrase('bid_history')}}</h5>--}}
          <h5 class="modal-title" id="exampleModalLabel">Historial de ofertas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


        <ul class="list-group z-depth-0">

            <li class="list-group-item justify-content-between">
{{--                <span><b>{{getPhrase('bid_amount')}}</b></span>--}}
                <span><b>monto de la oferta</b></span>
{{--                <span style="float:right;"><b>{{getPhrase('datetime')}}</b></span> --}}
                <span style="float:right;"><b>fecha y hora</b></span>
            </li>

            <li ng-repeat="bid in bid_history" class="list-group-item justify-content-between">
                <span>{{$currency}} @{{bid.bid_amount}}</span>
                <span style="float:right;">@{{bid.created_at}}</span>
            </li>
        </ul>

    </div>

      <div class="modal-footer">
{{--        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{getPhrase('close')}}</button>--}}
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
<!--Bid history modal end-->


{{-- Modal Ganador --}}
{{-- @foreach ($bidders as $user)
    <div class="modal fade" id="modal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <form method="POST" action="{{route('ganador.auctions',$user->id)}}">

            {{csrf_field() }}

            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                Desea ponerlo como ganador?
                </div>

                <div class="row">
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-check-input" type="radio" name="is_bidder_won" value="No" checked>
                                <label>
                                    NO
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-check-input" type="radio" name="is_bidder_won" value="Yes">
                                <label>
                                    SI
                                </label>
                            </div>
                        </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </div>

            </div>
        </form>

    </div>
@endforeach --}}





<!--send Email modal-->
<div class="modal fade" id="sendEmailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{getPhrase('send_invoice_email_to_bidder_regarding_payment')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>



      <div class="modal-body form-auth-style">

        {!! Form::open(array('url' => URL_BID_EMAIL_NOTIFICATION, 'method' => 'POST','name'=>'formValidate','novalidate'=>'')) !!}

        <input type="hidden" name="ab_id" id="ab_id" value="">
        <input type="hidden" name="auction_id" value="{{$record->id}}">

        <p>Enviar notificación por correo electrónico al usuario sobre el pago de la subasta</p>

         <div class="form-group">

            {{ Form::textarea('message', old('message'), $attributes =

                array('class' => 'form-control ckeditor',

                'placeholder' => 'Enter Email Content/Message to Bidder',

                'ng-model' => 'message',

                'required' => 'true',

                'rows'=>3,

                'ng-class'=>'{"has-error": formValidate.message.$touched && formValidate.message.$invalid}',

                )) }}

            <div class="validation-error" ng-messages="formValidate.message.$error" >

                {!! getValidationMessage()!!}

            </div>

          </div>

           <div class="form-group">

            {!! Form::label('sent_at', getPhrase('start_date'), ['class' => 'control-label']) !!}

                <span class="text-red">*</span>

                {{ Form::text('sent_at', old('sent_at') , $attributes =

                array('class' => 'form-control',

                'id' => 'datetimepicker6',

                'placeholder'=>'Payment Start Date and Time',

                'ng-model' => 'sent_at',

                )) }}


            </div>


            <div class="form-group">

                {!! Form::label('end_date', getPhrase('end_date'), ['class' => 'control-label']) !!}

                <span class="text-red">*</span>



                {{ Form::text('ended_at', old('ended_at') , $attributes =

                array('class' => 'form-control',

                'id' => 'datetimepicker7',

                'placeholder'=>'Payment End Date and Time',

                'ng-model' => 'ended_at',


                )) }}


            </div>



        <div class="modal-footer">

{{--        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{getPhrase('close')}}</button>--}}
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

{{--        <button type="submit" name="send_email" class="btn btn-primary" ng-disabled="!formValidate.$valid">{{getPhrase('send')}}</button>--}}
             <button type="submit" name="send_email" class="btn btn-primary" ng-disabled="!formValidate.$valid">Enviar</button>

      </div>



        {!! Form::close() !!}



      </div>







    </div>
  </div>
</div>
<!--send Email modal-->





    </div>
@stop






@section('footer_scripts')
@include('common.validations')
@include('common.alertify')
@include('admin.auctions.scripts.auction-js-scripts')
<script>



var photo_counter = 0;
Dropzone.options.realDropzone = {

    uploadMultiple: true,
    parallelUploads: 100,
    maxFile: 15,
    maxFilesize: 8,
    previewsContainer: '#dropzonePreview',
    previewTemplate: document.querySelector('#preview-template').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'Remove',
    dictFileTooBig: 'File size is bigger than 8MB',
    acceptedFiles: "application/pdf,image/*",
    autoProcessQueue: true,

    // The setting up of the dropzone
    init:function() {
        var previous_uploads = <?php print_r($previous_uploads); ?>;

        photo_counter = previous_uploads.length;
        for(i=0; i<previous_uploads.length; i++){

         var mockFile = previous_uploads[i];

          this.options.addedfile.call(this, mockFile);

           dataUrl = "<?php echo UPLOADS;?>auctions/"+mockFile.filename;

           if (!mockFile.type.match(/image.*/)) {
            dataUrl = "<?php echo IMAGES;?>img-example.jpg";
           }
           this.options.thumbnail.call(this, mockFile, dataUrl);

           // mockFile.previewElement.classList.add('dz-success');
           // mockFile.previewElement.classList.add('dz-complete');

        }
            // $('.dz-image').css('background-image', 'url({{AUCTION_IMAGES_PATH_URL}})'+mockFile.filename);

         $("#photoCounter").text( "(" + photo_counter + ")");

        this.on("removedfile", function(file) {
            $.ajax({
                type: 'POST',
                url: '{{URL_AUCTIONS_DELETE_IMAGES}}'+ file.id,
                data: {id: file.id, _token: $('[name="_token"]').val()},
                dataType: 'html',
                success: function(data){
                     photo_counter--;
                        $("#photoCounter").text( "(" + photo_counter + ")");

                }
            });

        } );
    },
    error: function(file, response) {
        if($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        return _results;
    },
    success: function(file,done) {

        file.id=done[photo_counter];
        photo_counter++;
        $("#photoCounter").text( "(" + photo_counter + ")");
    },
    accept: function(file, done) {

    var thumbnail = $('.dropzone .dz-preview.dz-file-preview .dz-image:last ');


    switch (file.type) {
      case 'application/pdf':

        thumbnail.css('background-image', 'url({{IMAGES}}pdf.png)');
        break;
      case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
        thumbnail.css('background', 'url(img/doc.png)');
        break;
    }

    done();
  },
}
 </script>

<script src="{{JS}}moment.min.js"></script>
<script src="{{JS}}bootstrap-datetimepicker.min.js"></script>

<script>
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });


    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>


<script>
function auctionBidder(id)
{
    var id = id;
    if (id) {
        $("#ab_id").val(id);
        $("#sendEmailModal").modal('show');
    }
}
</script>

@stop



@section('custom_div_end')
</div>
@stop
