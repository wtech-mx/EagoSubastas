<script>



	function deleteRecord(slug) {

	swal({

		//   title: "{{getPhrase('are_you_sure')}}?",
		  title: "Eliminar Registro",

		//   text: "{{getPhrase('you_will_not_be_able_to_recover_this_record')}}!",
		text: "Desea eliminar el Registro?",

		  type: "warning",

		  showCancelButton: true,

		  confirmButtonClass: "btn-danger",

		//   confirmButtonText: "{{getPhrase('yes').', '.getPhrase('delete_it')}}!",

		//   cancelButtonText: "{{getPhrase('no').', '.getPhrase('cancel_please')}}!",

		confirmButtonText: "Si, Eliminar!",

		cancelButtonText: "No, Cancelar!",

		  closeOnConfirm: false,

		  closeOnCancel: false

		},

		function(isConfirm) {

		  if (isConfirm) {

		  	  var token = '{{ csrf_token()}}';

		  	route = '{{$route}}/'+slug;  

		    $.ajax({

		        url:route,

		        type: 'post',

		        data: {_method: 'delete', _token :token},

		        success:function(msg){

		        	result = $.parseJSON(msg);
                    
		        	if(typeof result == 'object')

		        	{

		        		status_message = '{{getPhrase('deleted')}}';

		        		status_symbox = 'success';

		        		status_prefix_message = '';

		        		if(!result.status) {

		        			status_message = '{{getPhrase('sorry')}}';

		        			status_prefix_message = '{{getPhrase("cannot_delete_this_record_as")}}\n';

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