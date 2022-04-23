$(document).ready(function(){

	// $("#likebuton").click(function(){

	// 	alert("asdd")

	// 	$('#likebuton').removeClass("fa fa-star-o").addClass("fa fa-star");

	// });


	$.like= function(usersalt,recipeid,value){






		if(recipeid && usersalt && value){



			$.get("likes.php",{"usersalt":usersalt,"value":value, "recipeid": recipeid}, function(result){



				if(result=="succesfull"){

					if(value=="add"){
						$('#likebuton').removeClass("fa fa-star-o").addClass("fa fa-star");
					}else if(value=="del"){
						$('#likebuton').removeClass("fa fa-star").addClass("fa fa-star-o");
					}

				}else if(result=="unsuccesfull"){

								// hata gelicek
							}
						});
			


		}else{
			alert("hata");
		}



	}


});