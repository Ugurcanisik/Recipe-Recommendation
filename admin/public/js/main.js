$(document).ready(function(){


	$.del= function(page,id){

		if(page && id){



			swal({
				title: "Are you sure?",
				text: " to recover this imaginary file!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {


					$.get("delete.php?page="+page,{"id":id}, function(data){
						
						if(data=="succesfull"){

							$("#"+id).remove();

							swal("Poof! Your  has been deleted!", {
								icon: "success",
							});

						}else if(data=="unsuccesfull"){

								// hata gelicek
							}
						});


				} else {


					swal("Your imaginary file is safe!");


				}
			});


		}else{
			alert("hata");
		}



	}


});