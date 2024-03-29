@extends('layouts.home')

@section('header_scripts')
<link href="{{CSS}}bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
<link href="{{CSS}}checkbox.css" rel="stylesheet" type="text/css">
@endsection


@section('content')
<?php
$featured_enable = getSetting('enable_featured_items','auction_settings');
$currency_code = getSetting('currency_code','site_settings');
$auctin_url = URL_HOME_AUCTIONS;


$open_auctions_count   = \App\Auction::getHomeAuctionStatusAuctions('open')->count();
$new_auctions_count    = \App\Auction::getHomeAuctionStatusAuctions('new')->count();
$closed_auctions_count = \App\Auction::getHomeAuctionStatusAuctions('closed')->count();
?>


  <!--CATEGORY BODY SECTION-->
     <section class="au-categorys">
      <div class="container">
         <div class="row">
 

          <!--ASIDE BAR SECTION-->
          <div class="col-lg-3 col-md-4 col-sm-12">

              <!--Auction Date-->
              <div class="au-all-category">
{{--                <h6>{{getPhrase('auction_date')}}</h6>--}}
                  <h6>Dia Subasta</h6>
                <div class="form-group">
                  <div class="input-group date">
                      <input type="text" class="form-control datepicker" name="auction_date" id="auction_date">
                      <div class="input-group-addon">
                          <!-- <span class="glyphicon glyphicon-th"></span> -->
                          <span id="clear_date"><i class="fa fa-close"></i></span>
                      </div>
                  </div>
                    <!-- <input type="text" class="form-control datepicker" name="auction_date" id="auction_date">
                    <span id="clear_date"><i class="fa fa-close"></i></span> -->
                </div>
              </div>
              <!--Auction Date-->


              <!--Item Type-->
              {{-- <div class="au-all-category">
               <h6>{{getPhrase('item_type')}}</h6>
                   <h6>Tipo de artículo</h6>

                <div class="form-group">
                 {{ Form::radio('item_type','all_items',true,
                 array('id'=>'all_items',
                 'name'=>'item_type'

                 ))
               }}
                <label for="all_items"> {{getPhrase('all_items')}}  </label>
                    <label for="all_items"> Todos los artículos  </label>
                </div>

                <div class="form-group">
                 {{ Form::radio('item_type','auction_items',null,
                 array('id'=>'auction_items',
                 'name'=>'item_type'

                 )) }}
                <label for="auction_items"> {{getPhrase('auctions')}}  </label>
                     <label for="auction_items"> Subastas  </label>
                </div>

                 <div class="form-group">
                 {{ Form::radio('item_type','buynow_items',null,
                 array('id'=>'buynow_items',
                 'name'=>'item_type'

                  )) }}
                <label for="buynow_items"> {{getPhrase('buy_now')}}  </label>
                      <label for="buynow_items"> Compra ahora  </label>
                </div>

              </div> --}}
              <!--Item Type-->


              <!--Auction STATUS-->
              {{-- <div class="au-all-category">
                <h6>{{getPhrase('auction_status')}}</h6>

                <div class="form-group">

                 {{ Form::checkbox('auction_status','open', true , array('id'=>'open', 'name'=>'auction_status','class'=>'auction-status')) }}
                 <label for="open"> <span class="fa-stack radio-button"> <i class="fa fa-check active"></i> </span>
                    {{getPhrase('regular')}}
                     Regular
                     <span class="badge">{{$open_auctions_count}}</span>
                 </label>
                </div>


                <div class="form-group">
                 {{ Form::checkbox('auction_status','new', null , array('id'=>'new', 'name'=>'auction_status','class'=>'auction-status')) }}
                 <label for="new"> <span class="fa-stack radio-button"> <i class="fa fa-check active"></i> </span>
                    {{getPhrase('upcoming')}}
                     próxima
                     <span class="badge">{{$new_auctions_count}}</span>
                 </label>
                </div>


                 <div class="form-group">
                 {{ Form::checkbox('auction_status','closed', null , array('id'=>'closed', 'name'=>'auction_status','class'=>'auction-status')) }}
                 <label for="closed"> <span class="fa-stack radio-button"> <i class="fa fa-check active"></i> </span>
                    {{getPhrase('past')}}
                     Pasada
                     <span class="badge">{{$closed_auctions_count}}</span>
                 </label>
                </div>


              </div> --}}
              <!--Auction STATUS-->


              <!--Categories-->
              {{-- @if (count($categories))

              <div class="au-all-category">
               <h6>{{getPhrase('categories')}}</h6>
                  <h6>Categorias</h6>
                <div class="option-scroll">
                @foreach ($categories as $category)

            

              @if (count($sub_categories))
              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p>
                      <a data-toggle="collapse" href="#collapse{{$category->id}}">{{$category->category}}</a>
                    </p>
                  </div>
                  <div id="collapse{{$category->id}}" class="panel-collapse collapse {{$collapse_show}}">

                   <ul class="au-list-item">
                    @foreach ($sub_categories as $sub_category)
                   

                    <li>

                      {{ Form::checkbox('sub_categories',$sub_category->id,null, array('id'=>$sub_category->sub_category, 'name'=>'sub_categories','class'=>'auction-categories', $checked)) }}

                       <label for="{{$sub_category->sub_category}}"> <span class="fa-stack radio-button"> <i class="fa fa-check active"></i> </span> {{$sub_category->sub_category}} <span class="badge">{{$sub_category_auctions}}</span> </label>


                      <a href="javascript:void(0);"> {{$sub_category->sub_category}} <span class="badge"> {{$sub_category_auctions}} </span></a>

                    </li>
                    @endforeach
                  </ul>

                  </div>
                </div>
              </div>
               @else
                <ul class="no-accord">
                 <li>
                  <a href="javascript:void(0);"> {{$category->category}} <span class="badge">0</span></a>
                 </li>
                    </ul>
               @endif

              @endforeach
                </div>
             </div>
             @endif --}}
              <!--Categories-->


               <!--Seller Location-->
            {{-- <div class="au-all-category">
                <h6>{{getPhrase('location')}}</h6>

                <h6>Localizacion</h6>
                 <div class="option-scroll">
               
                @if (count($cities))
                @foreach ($cities as $city)


                <div class="form-group">
                     {{ Form::checkbox('city_id',$city->id,null,array('id'=>$city->id, 'name'=>'city_id','class'=>'auction-cities')) }}
                    <label for="{{$city->id}}"> <span class="fa-stack radio-button"> <i class="fa fa-check active"></i> </span> {{$city->city}} <span class="badge">{{$city_auctions}}</span> </label>
                </div>
                @endforeach
                @endif
              </div>

            </div> --}}
              <!--Seller Location-->


              <!--Sellers-->
               {{-- <div class="au-all-category">
                <h6>Vendedores</h6>

                @if (count($sellers))
                @foreach ($sellers as $seller)
                 <div class="form-group">
                     {{ Form::checkbox('user_id',$seller->id,null,array('id'=>$seller->id, 'name'=>'user_id','class'=>'auction-sellers')) }}
                    <label for="{{$seller->id}}"> <span class="fa-stack radio-button"> <i class="fa fa-check active"></i> </span> {{$seller->username}} <span class="badge">{{$seller_auctions}}</span> </label>
                </div>

                @endforeach
                @endif

              </div> --}}
              <!--Sellers-->

              <!--Featured-->
              {{-- @if ($featured_enable=='Yes')
              <div class="au-all-category">
                <h6>{{getPhrase('featured')}}</h6>
                   <h6>Destacados</h6>
                <div class="form-group">
                 {{ Form::checkbox('featured',null,null, array('id'=>'featured_yes', 'name'=>'featured')) }}
                 <label for="featured_yes"> <span class="fa-stack radio-button"> <i class="fa fa-check active"></i> </span>
                      {{getPhrase('featured_auctions')}}
                     Subastas destacadas
                 </label>
                </div>
              </div>
              @endif --}}
              <!--Featured-->

            </div>

            <!--PRODUCTS SECTION-->
             <div class="col-lg-9 col-md-8 col-sm-12 au-wrapper-main">

               <div class="row au-main-header">
                 <div class="col-lg-9 col-md-6 col-sm-12 au-body-header">
                   <h5>{{$auctions->total()}} AUCTIONS</h5>
                 </div>
                 <div class="col-lg-3 col-md-6 col-sm-12 au-items-listt clearfix">
                   <!--   <label>Show</label>
                       <select class="form-control form-control-sm au-form-dropdown">
                        <option>10</option>
                        <option>50</option>
                        <option>100</option>
                       </select>
                       <label>Entries</label> -->
                 </div>
               </div>


                <div id="load" style="position: relative;">

                  <section class="auctions">

                     @include('home.pages.auctions.ajax_auctions')

                  </section>

                </div>

            </div>
            <!--PRODUCTS SECTION-->
          

         </div>
      </div>
    </section>
    <!--CATEGORY BODY SECTION-->

@endsection


@section('footer_scripts')

@include('common.validations')
@include('common.alertify')


@include('home.pages.auctions.auctions-js-script')

<!-- <script src="{{JS}}moment.min.js"></script> -->
<script src="{{JS}}bootstrap-datepicker.min.js"></script>
<script>

  var selected_js_format = '<?php echo getSetting('date_format_js','site_settings');?>';

/*var dateformat = '<?php echo getSetting('date_format','site_settings');?>';
if (dateformat=='' || dateformat==null)
  dateformat = 'yyyy-mm-dd';*/


$('.datepicker').datepicker({
   // format: dateformat
   format: selected_js_format,
});

var anchors = $(".pagination li a").click(function() {
  //savesubcat()
  $(this).addClass("active")
  anchors.not(this).removeClass("active")
})

</script>


<script type="text/javascript">

/*function getItemTypeAuctions(item_type) {
  console.log(item_type.value);
  var item_type = item_type.value;
  var url = '<?php echo $auctin_url;?>';
  getAuctions(url,item_type);
}
*/
$("input[name='item_type']").change(function () {
    var url = '<?php echo $auctin_url;?>';
    var item_type=$(this).val();
    getAuctions(url,item_type);
});



var auctionStatus = [];
/* look for all checkboxes that have a class 'chk' attached to it and check if it was checked */
$(".auction-status").click(function() {
  var auctionStatus = [];
  $("input[name='auction_status']:checked").each(function() {
    auctionStatus.push($(this).val());
  });
 var url = '<?php echo $auctin_url;?>';
 getAuctions(url,'',auctionStatus);
});



$('#auction_date').datepicker()
    .on("input change", function (e) {
    $("#clear_date").fadeIn();
    var url = '<?php echo $auctin_url;?>';
    var auction_date = $("#auction_date").val();

    getAuctions(url,'','',auction_date);
});


$("#clear_date").click(function(){
  $('#auction_date').data('datepicker').setDate(null);
  $("#clear_date").fadeOut();

  var url = '<?php echo $auctin_url;?>';
  getAuctions(url,'','','');
});


$("input[name='featured']").change(function () {
    var url = '<?php echo $auctin_url;?>';

    var featured= $(this).is(':checked');
    getAuctions(url,'','','','',featured);
});


var subCategories = [];
/* look for all checkboxes that have a class 'chk' attached to it and check if it was checked */
$(".auction-categories").click(function() {
  var subCategories = [];
  $("input[name='sub_categories']:checked").each(function() {
    subCategories.push($(this).val());
  });
 var url = '<?php echo $auctin_url;?>';
 getAuctions(url,'','','',subCategories);
});




//Cities
var selected_cities = [];
/* look for all checkboxes that have a class 'chk' attached to it and check if it was checked */
$(".auction-cities").click(function() {
  var selected_cities = [];
  $("input[name='city_id']:checked").each(function() {
    selected_cities.push($(this).val());
  });
 var url = '<?php echo $auctin_url;?>';
 getAuctions(url,'','','','','',selected_cities);
});



//Selected Sellers
var auctionSellers = [];
/* look for all checkboxes that have a class 'chk' attached to it and check if it was checked */
$(".auction-sellers").click(function() {
  var auctionSellers = [];
  $("input[name='user_id']:checked").each(function() {
    auctionSellers.push($(this).val());
  });
 var url = '<?php echo $auctin_url;?>';
 getAuctions(url,'','','','','','',auctionSellers);
});




$(document).ready(function()
{
    $("#clear_date").fadeOut();
     $(document).on('click', '.pagination li a',function(event)
    {
        // $('li').removeClass('active');
        // $(this).parent('li').addClass('active');
        //
        event.preventDefault();
         $('#ajax_loader').fadeIn({{HOME_AJAXLOADER_FADEIN_TIME}});
        var url = $(this).attr('href');

       // var page=$(this).attr('href').split('page=')[1];

       getAuctions(url);
       $('#ajax_loader').fadeOut({{HOME_AJAXLOADER_FADEOUT_TIME}});
       // window.history.pushState("", "", url);
    });
});


 function getAuctions(url,item_type='',auctionstatus='',auction_date='',sub_categories='',featured='',selected_cities='',auction_sellers='') {

    //Item type
    if (item_type=='' || item_type==null) {
      item_type = $("input[name='item_type']:checked").val();

    }

    //Auction Status
    if (auctionstatus.length<=0) {
       auction_status=[];
       $("input[name='auction_status']:checked").each(function() {
        auction_status.push($(this).val());
      });

       auctionstatus = auction_status;

    }

    //Selected sub categories
    if (sub_categories.length<=0) {
       subCategories=[];
       $("input[name='sub_categories']:checked").each(function() {
        subCategories.push($(this).val());
      });

       sub_categories = subCategories;
    }

    //featured or normal auctions
    if (featured=='' || featured==null) {
      featured = $("input[name='featured']:checked").is(':checked');
    }


    //selected cities
    if (selected_cities.length<=0) {
       selectedCities=[];
       $("input[name='city_id']:checked").each(function() {
        selectedCities.push($(this).val());
      });

       selected_cities = selectedCities;
    }


    //selected sellers
    if (auction_sellers.length<=0) {

       auctionSellers=[];
       $("input[name='user_id']:checked").each(function() {
        auctionSellers.push($(this).val());
      });

       auction_sellers = auctionSellers;

    }

      $.ajax({
          url : url,
          data: {
            "_token": "{{ csrf_token() }}",
            "item_type":item_type,
            "auction_status":auctionstatus,
            "auction_date":auction_date,
            "sub_categories":sub_categories,
            "featured":featured,
            "selected_cities":selected_cities,
            "auction_sellers":auction_sellers
          }
      }).done(function (data) {
        // console.log('HLDFDS');
          $('.auctions').html(data);
      }).fail(function () {
          $('.auctions').html('<h4>No Auctions Available </h4> ');
      });


}




//favourite auctions
function auctionAddtoFavourites(auction_id)
{

      if (!auction_id) {
        return false;
      } else {

        $.ajax({
            url : '{{URL_ADD_FAVAUCTION}}',
            method: 'POST',
            data: {
              "_token": "{{ csrf_token() }}",
              "auction_id":auction_id,
            }
        }).done(function (data) {

          data = jQuery.parseJSON(data);

          if (data.status==1)
            alertify.success(data.message);
          else
            alertify.error(data.message);

           // alertify.success($scope.response.message);
        }).fail(function () {
            alertify.error('Invalid Operation');
        });
      }
}

</script>

@endsection

