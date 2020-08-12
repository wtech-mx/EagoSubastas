<script>



	function deleteRecord(slug) {

	swal({

		//   title: "<?php echo e(getPhrase('are_you_sure')); ?>?",
		  title: "Eliminar Registro",

		//   text: "<?php echo e(getPhrase('you_will_not_be_able_to_recover_this_record')); ?>!",
		text: "Desea eliminar el Registro?",

		  type: "warning",

		  showCancelButton: true,

		  confirmButtonClass: "btn-danger",

		//   confirmButtonText: "<?php echo e(getPhrase('yes').', '.getPhrase('delete_it')); ?>!",

		//   cancelButtonText: "<?php echo e(getPhrase('no').', '.getPhrase('cancel_please')); ?>!",

		confirmButtonText: "Si, Eliminar!",

		cancelButtonText: "No, Cancelar!",

		  closeOnConfirm: false,

		  closeOnCancel: false

		},

		function(isConfirm) {

		  if (isConfirm) {

		  	  var token = '<?php echo e(csrf_token()); ?>';

		  	route = '<?php echo e($route); ?>/'+slug;  

		    $.ajax({

		        url:route,

		        type: 'post',

		        data: {_method: 'delete', _token :token},

		        success:function(msg){

		        	result = $.parseJSON(msg);
                    
		        	if(typeof result == 'object')

		        	{

		        		status_message = '<?php echo e(getPhrase('deleted')); ?>';

		        		status_symbox = 'success';

		        		status_prefix_message = '';

		        		if(!result.status) {

		        			status_message = '<?php echo e(getPhrase('sorry')); ?>';

		        			status_prefix_message = '<?php echo e(getPhrase("cannot_delete_this_record_as")); ?>\n';

		        			status_symbox = 'info';

		        		}

		        		swal(status_message+"!", status_prefix_message+result.message, status_symbox);

		        		location.reload();
		        	}

		        	else {

						swal("Borrado!", "Su registro ha sido eliminado", "success");

		        	}

		        	


		        	// tableObj.ajax.reload();

		        }

		    });



		  } else {

		    swal("Cancelado", "Su expediente está seguro :)", "error");

		  }

	});

	}

</script>