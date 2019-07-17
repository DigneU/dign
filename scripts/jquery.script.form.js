$(document).ready(function(){
	$(".msg").hide(0);
	/*$("#container #div div  input").click(function(el){
		var id = $(el.target).index();
		alert(id);

	});*/
/*-----------------------------------------------------------*/
	$("#password").mouseover(function(){
		$(".pss").fadeIn(111);
	});
		$("#password").mouseout(function(){
		$(".pss").fadeOut(111);
	});
	$("#username").mouseover(function(){
		$(".uname").fadeIn(111);
	});
		$("#username").mouseout(function(){
		$(".uname").fadeOut(111);
	});
//end
/*reset button*/
$("#reset").click(function(){
	window.location ="./registration.html" ;
});
//end
	$("#sub").click(function(){
		var pss = $("#passwords").val().length;
		var unm = $("#usernames").val();
		var fnm = $("#firstname").val();
		var lnm = $("#lastname").val();
		var idnu = $("#idn").val();
		var rps = $("#confirm").val();
		var psss = $("#passwords").val();
		var city = $("#city").val();
		var address = $("#address").val();
		var phone = $("#phone").val();
		var email = $("#email").val();
		if (psss != rps) {
			$(".confirm").html("Your Password Not Match ");
			$("#confirm").css({
				'border' : 'solid 1px red',
			});
			$(".rps").fadeIn(111,function(){
				$(this).fadeOut(10000);});
			var just = "1";
		};
		if (pss < 8) {
			$(".password").html("Your password is Less Than 8 Characters");
			$("#password").css({
				'border' : 'solid 1px red',
			});
			$(".pss").fadeIn(111,function(){
				$(this).fadeOut(10000);});
			var just = "1";
		};
		if (fnm == unm || lnm == unm) {
			$(".username").html("Your Username is The Same as Your Names");
			$("#username").css({
				'border' : 'solid 1px red',
			});
			$(".uname").fadeIn(111,function(){
				$(this).fadeOut(10000);});
			var just = "1";
		};
		if (just == "1") {

		}else{
			//if ($() {};
			$.post(
				'getin.php',
				{username:unm,password:psss,firstname:fnm,lastname:lnm,idn:idnu,address:address,city:city,phone:phone,email:email},
				function(f){
					if (f == 1) {
							window.location = "oncart.php";
					}else{
							$(".result").html("<h6>"+f+"</h6>").css({
								'margin-left' : '180px',
								'padding' : '2px',
								'background' : 'transparent',
								'width' : '290px',
								'text-shadow' : '0px 0px 1px rgba(255,0,0,.4)',
								'color' : 'rgba(255,0,0,1)'
							});
					};
				}
				);
		};

	});

});