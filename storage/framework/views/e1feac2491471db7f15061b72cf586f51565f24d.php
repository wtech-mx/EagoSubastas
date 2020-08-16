<?php 
$user = Auth::user();
use App\AuctionBidder;
use App\Auction;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Subasta en Vivo :: <?php echo e($auction->title); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="<?php echo e(IMAGE_PATH_SETTINGS.getSetting('site_favicon', 'site_settings')); ?>" type="image/x-icon" />


 <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo e(LIVE_AUCTION); ?>bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
 -->


  <link rel="stylesheet" href="<?php echo e(LIVE_AUCTION); ?>bootstrap.min.css">

  <script src="<?php echo e(LIVE_AUCTION); ?>jquery.min.js"></script>
  <script src="<?php echo e(LIVE_AUCTION); ?>bootstrap.min.js"></script>
  <script src="<?php echo e(LIVE_AUCTION); ?>socket.io.js"></script>


<!--alertify-->
<link rel="stylesheet" href="<?php echo e(ALERTIFY); ?>css/themes/bootstrap.css">
<link rel="stylesheet" href="<?php echo e(ALERTIFY); ?>css/alertify.min.css">
<link rel="stylesheet" href="<?php echo e(ALERTIFY); ?>css/themes/default.css">
<link rel="stylesheet" href="<?php echo e(ALERTIFY); ?>css/themes/alertify.core.css">


<!-- include alertify script -->
<script src="<?php echo e(ALERTIFY); ?>/alertify.min.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo e(CSS_HOME); ?>style.css">
</head>
<body class="bidding-page">

<?php $__currentLoopData = $invitacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($user->email == $item->email): ?>
		<?php if($auction->id == $item->auction_id): ?>
			<div class="container">
					<?php

					$currency_code = getSetting('currency_code','site_settings');

					$date_format = getSetting('date_format','site_settings');

					$live_auction_date = date($date_format, strtotime($auction->live_auction_date));


					/*	$enter_amount = 'Enter amount ';
					if (isset($last_bid) && !empty($last_bid->bid_amount))
					$enter_amount .= '> '.$last_bid->bid_amount;
					elseif ($auction->minimum_bid>0)
					$enter_amount .= '> '.$auction->minimum_bid;*/


					//placeholder
					$enter_amount = 'Ingrese el monto';
					if ($auction->is_bid_increment && $auction->bid_increment>0) {
					//if increment = add incremental cost +current one=show to user

					if (isset($bidding) && !empty($bidding->bid_amount)) {
						$amnt = $bidding->bid_amount+$auction->bid_increment;
						$enter_amount .= ' = '.$amnt;
					}
					elseif ($auction->minimum_bid>0)
						$enter_amount .= ' > '.$auction->minimum_bid;

					} else {
					//if not incremental
					if (isset($bidding) && !empty($bidding->bid_amount))
						$enter_amount .= '> '.$bidding->bid_amount;
					elseif ($auction->minimum_bid>0)
						$enter_amount .= '> '.$auction->minimum_bid;
					}




					?>

				<div class="row">
						<h1 class="text-center" style="color: #fff;padding: 5px;"><strong>Estas en una Subasta en vivo</strong></h1>
						<div class="col-md-12">

								<div class="col-md-6 bid-data" style="background-color: #05123F">
										<h1 class="text-center" style="color: #fff;">Detalles de Subasta</h1>
									<div class="form-group bid-form-group">
										<div class="col-6" >
											<p  class="text-center" style="color: #05123F;background: white;padding: 16px;border-radius: 10px;font-size: 15px">Precio de reserva <?php echo e($currency_code); ?><?php echo e($auction->reserve_price); ?></p>
										</div>
										<div class="col-6">
											<p class="text-center" style="color: #05123F;background: white;padding: 16px;border-radius: 10px;font-size: 15px">Termina en <?php echo e($live_auction_date); ?> <?php echo e($auction->live_auction_end_time); ?></p>
										</div>


										<p class="text-center" style="font-size: 20px" id="demo"></p>
									</div>
									<?php if(AuctionBidder::where('auction_id', '=', $auction->id)->exists()): ?> 
            
									<?php $__currentLoopData = $auctionbidders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									  <?php if($auction->id == $item->auction_id): ?>
										<?php $__currentLoopData = $auctionbidders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										  <?php if(AuctionBidder::where('bidder_id', '=', $user->id)->exists()): ?> 
											<?php if($user->id == $bid->bidder_id): ?>
											  <?php if($bid->no_of_times < $auction->tiros): ?>
							
											  <div class="form-group bid-form-group">
												<input type="number" class="form-control form-control-sm" id="bid_amount" placeholder="<?php echo e($enter_amount); ?>" style="color: #fff">
											
												<?php if($bid_options): ?>
													<small>+<?php echo e($auction->bid_increment); ?></small>
												<?php endif; ?>
											</div>
											
											<div class="form-group" align="right">
												<button type="submit" id="au_submit" class="btn btn-success bid-submit-btn" style="padding:3px 16px;">Hacer oferta</button>
											</div>
							
												<?php else: ?>
												<br>
												<p class="text-center" style="color: #fbfcff;">Usos todos sus tiros disponibles</p>
												
											  <?php endif; ?>
											<?php endif; ?>
										  <?php else: ?>
										  <div class="form-group bid-form-group">
											<input type="number" class="form-control form-control-sm" id="bid_amount" placeholder="<?php echo e($enter_amount); ?>" style="color: #fff">
										
											<?php if($bid_options): ?>
												<small>+<?php echo e($auction->bid_increment); ?></small>
											<?php endif; ?>
										</div>
										
										<div class="form-group" align="right">
											<button type="submit" id="au_submit" class="btn btn-success bid-submit-btn" style="padding:3px 16px;">Hacer oferta</button>
										</div>
										  <?php endif; ?>
							
										  
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
							
									  <?php break; ?>
									  <?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
							
								  <?php else: ?>
							
								<div class="form-group bid-form-group">
									<input type="number" class="form-control form-control-sm" id="bid_amount" placeholder="<?php echo e($enter_amount); ?>" style="color: #fff">
								
									<?php if($bid_options): ?>
										<small>+<?php echo e($auction->bid_increment); ?></small>
									<?php endif; ?>
								</div>
								
								<div class="form-group" align="right">
									<button type="submit" id="au_submit" class="btn btn-success bid-submit-btn" style="padding:3px 16px;">Hacer oferta</button>
								</div>
							
								  <?php endif; ?>


									<div class="bid-loader" style="display:none;" id="bid_loader"><img src="<?php echo e(AJAXLOADER); ?>"> <?php echo e(trans('please_wait')); ?>...</div>

								</div>

								<div class="col-md-6" style="padding: 10px">
									<div id="latest_bids" style="background-color: #05123F" style="padding: 10px">
										<h1 class="text-center" style="color: #fff;">Pujas</h1>
										<?php if(count($live_biddings)): ?>


										<ul class="list-group" style="padding: 10px">
										<?php $__currentLoopData = $live_biddings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 15px;">
												<?php echo e($bid->name); ?>

												<span class="badge badge-primary badge-pill" style="font-size: 15px;padding: 10px"> <?php echo e($currency_code); ?> <?php echo e($bid->bid_amount); ?></span>
											</li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>


										<?php endif; ?>
									</div>
								</div>
						</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<script>

$(document).ready(function() {


alertify.set('notifier','position', 'top-right');

//get placeholder = how much amount should be enter - starting || if participate during

/* $.ajax({
    "url" : "<?php echo e(URL_LIVE_AUCTION_INFO); ?>",
    "type" : "POST",
    "data" : {
        "auction_id" : "<?php echo e($auction->id); ?>",
        "_token" : "<?php echo e(csrf_token()); ?>"
    },
    "dataType":"json",
    'success' : function(response) {  

        console.log('Data: '+JSON.stringify(response));
    },
    'error' : function(request,error)
    {
        console.log("Request: "+JSON.stringify(request));
    }
});
*/

	var socket = io.connect('http://localhost:3000');

	socket.on('au_bid', function(content) {
		//conten = placeholder, latest 5 bids
	  	// console.log('On socket live kdjfd');
	   	// $('#latest_bids').append(content + "");
	   	
	   	// console.log("HELLOdsfsdfds");
	   	//bid successfully placed
		/*$("#latest_bids").html('');
		$("#latest_bids").append(content["latest_bids"]);
		*/
		//placeholder
		/*$('input').val('');
		$('input').attr('placeholder',content["placeholder"]);*/

	});


	socket.on('place', function(content) {
		$('input').val('');
		$('input').attr('placeholder',content["placeholder"]);
	});


	socket.on('lts_bids', function(content) {
		$("#latest_bids").html('');
		$("#latest_bids").append(content["latest_bids"]);
	});



	$('#au_submit').click(function(){



		
	  	// console.log('hey submit');

	  	var current_bid = $('#bid_amount').val();
	  	var auction_id = '<?php echo e($auction->id); ?>';

	  	var ajax_status=false;
	  		
	  	var ltst_bids='';
	  	var plchlder='';	
	  		
	  	if (auction_id>0 && current_bid>0) {

	  		//loader 
	  		$('#bid_loader').fadeIn(<?php echo e(AJAXLOADER_FADEIN_TIME); ?>);
	  			

		  	$.ajax({
			    "url" : "<?php echo e(URL_SAVE_LIVE_AUCTION_BID); ?>",
			    "type" : "POST",
			    "data" : {
			        "bid_auction_id" : '<?php echo e($auction->id); ?>',
			        "bid_amount" : current_bid,
			        "_token" : "<?php echo e(csrf_token()); ?>"
			    },
			    "dataType":"json",
			    'success' : function(response) {  


			    	$('#bid_loader').fadeOut(<?php echo e(AJAXLOADER_FADEOUT_TIME); ?>);

			        // console.log('Data: '+JSON.stringify(response));
			        // dta = JSON.stringify(response);
			        // console.log("STATUS OF BID "+response.status);


			        var bid_status = response.status;
			        var msg = response.msg;

			        if (bid_status==999) {
			        	// alert("Please Login to continue..or User is not authorized");
			        	alertify.error("Please Login to continue..or User is not authorized");
	  					return;
		        	} else if (bid_status==99) {
		        		// alert("Bid amount is not valid");
		        		alertify.error("Bid amount is not valid");
	  					return;
		        	} else if (bid_status==555) {
		        		// won auction, time is over, reached/>Precio de reserva
		        		// alertify.log(msg);
		        		alertify.warning(msg);
	  					return;
	  				} else if (bid_status==9999) {
		        		// alert("Bidding time is not valid..can not place bid now");
		        		alertify.error("Bidding time is not valid..can not place bid now");
	  					return;
		        	} else if (bid_status==0) {
		        		// alert("Auction record not found");
		        		alertify.error("Auction record not found");
	  					return;
		        	} else if (bid_status==11) {
		        		// alert("Bidding time is not valid..can not place bid now");
		        		alertify.error("Bidding time is not valid..can not place bid now");
	  					return;
		        	} else if (bid_status==1111) {
		        		// alert("Someone has already won/bought auction..can not place bid now");
		        		alertify.error("Someone has already won/bought auction..can not place bid now");
	  					return;
		        	} else if (bid_status==111) {

		        		ajax_status = true;

		        		ltst_bids 	= response.latest_bids;
		        		plchlder 	= response.placeholder;

		        		//bid successfully placed
		        		$("#latest_bids").html('');
		        		$("#latest_bids").append(response.latest_bids);

		        		//placeholder
		        		$('input').val('');
		        		$('input').attr('placeholder',response.placeholder);

		        		socket.emit('au_bid', { 
						    	"amount" : current_bid,
						    	"auction_id" : '<?php echo e($auction->id); ?>',
						    	"latest_bids": ltst_bids,
						    	"placeholder": plchlder
						    	
						});


		        	}
					location.reload();
				},
				'error' : function(request,error)
				{
				    // console.log("Request: "+JSON.stringify(request));
				}
				
			});


		  	/*if (ajax_status) {
			    socket.emit('au_bid', { 
			    	"amount" : current_bid,
			    	"auction_id" : '<?php echo e($auction->id); ?>'

			    	// "latest_bids": ltst_bids,
			    	// "placeholder": plchlder
			    	
			    });
			    console.log('after emit');
			}*/

		} else {

			alertify.error("Please enter valid bid");
			return;

			/*alert("Please enter valid bid");
	  		return;*/
		}


	});

});
</script>


<script>
 
// Set the date we're counting down to
var countDownDate = new Date('<?php echo $end_time;?>');//new Date("Jun 26, 2018 15:37:25").getTime();



// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
   /* document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";*/

    document.getElementById("demo").innerHTML = hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EL TIEMPO DE OFERTA HA TERMINADO";
    }
}, 1000);
</script>


</body>
</html>
 


