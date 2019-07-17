$(document).ready(function(){
	$(".shopping").click(function(){
		$("div#slidepanel").slideDown("slow");
	});
	var out = $("#out").val();
	if (out == 1) {$("div#slidepanel").slideDown("slow");}
	else{
		$("div#slidepanel").slideUp("slow");
	};
	$("#login").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		//alert(username);
		$.post('login.php',
			{uname:username,pass:password},
			function(login){
					if (login == 1) {
							window.location = "oncart.php";
					}else{
							alert(login);
					};
					
			});
	});
});