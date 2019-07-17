<?php
session_start();
include_once("connect.php");
$conn=mysqli_connect("localhost","root","","editionbakame");
$selectNB = $conn->query("SELECT `phone`,`id_number` FROM `customer` WHERE `user_id` = '".$_SESSION['user_id']."' ");
$getNB = $selectNB->fetch_assoc();
$NB = $getNB['id_number'];
$PN = $getNB['phone'];
echo "<input type='hidden' id='idNB' value='$NB'>";
echo "<input type='hidden' id='phoNe' value='$PN'>";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<link href="style/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="images/demo/download.png" width='100%' height='100%'/>
<script type="text/javascript">
$(function(){
	$(".h3").text("add your account number and password to proceed buying!!!!");
	$(".proceed").hide();
	var time = 1;
	$("#account_check").click(function(){
		if (time == 3)window.location='oncart.php';
		var account_input = $("#account_number_input").val();
		var password_input = $("#password_input").val();
		var idN = $("#idNB").val();
		var phone = $("#phoNe").val();
		var tot = $("#total_a").val();
		//alert(account_input+'\n'+password_input);
		$.post('quit.php',{pN:phone,idN:idN,account:account_input,password:password_input,total:tot},
			function(output){
				//alert(tot);
				if (output == '0') var msg = "Account is not exit !"; time++;
				if (output == '3') var msg = "Password is not correct !"; time++;
				if (output == '10') var msg = "No enough money on your VISA card !";time++;
				if (output == '25') {alert("It seems you're trying to use account of another person ");window.location='oncart.php';}
				$(".h3").text(msg);
				if (output == account_input ) {
					$(".table").fadeOut(555);
					$(".proceed").fadeIn(555);
					$(".h3").text("You are allowed to proceed the action you requested")
					.css({
						'color' : 'rgba(0,255,0,.8)', 
						'font-size' : '20px'
					});
				};
				
			}
		);

	});
});

</script>
</head>
<body>
<div id="products-wrapper">
 <h1>View Cart</h1>
 <div class="view-cart">
 	<?php
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["products"]))
    {
	    $total = 0;
		echo '<form method="post" action="checkout.php">';
		echo '<ul>';
		$cart_items = 0;
		foreach ($_SESSION["products"] as $cart_itm)
        {
           $product_code = $cart_itm["code"];
		   $results = $conn->query('SELECT * FROM books WHERE inventory_id='.$product_code.' LIMIT 1');
		   $obj = $results->fetch_assoc();
		    echo '<li class="cart-itm">';
			echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
			echo '<div class="p-price"> Rwf '.$obj['price'].'</div>';
            echo '<div class="product-info">';
			echo '<h3>'.$cart_itm["name"].' (Code :'.$product_code.')</h3> ';
            echo '<div class="p-qty" style="font-size:16px;">Qty : '.$cart_itm["qty"].'</div>';
            echo '<div>'.$obj['description'].'</div>';
			echo '</div>';
            echo '</li>';
			$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
			$total = ($total + $subtotal);
			echo '<input type="hidden" name="book_id" value="'.$product_code.'" />';
			echo '<input type="hidden" name="book_qty" value="'.$cart_itm['qty'].'" />';
			echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj['book_title'].'" />';
			echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
			echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj['description'].'" />';
			echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
			$cart_items ++;
        }
    	echo '</ul>';
    	echo '<div>';
		echo '<span class="check-out-txt">';
		echo '<input type="hidden" id="total_a" name="total_a" value="'.$total.'" >';
		echo '<strong>Total : Rwf '.$total.'</strong>  ';
		echo '<input type="hidden" value="'.$_SESSION['user_id'].'" name="customer" />';
		echo '<input type="hidden" value="'.$cart_items.'" name="cart_items" />';
		echo '</span>';
		echo "</div>";
		echo "<div>";
		echo '<h3 style="color:red;" class="h3"><h3>';
		echo '<table border="0" class="table">';
		echo '<tr><td>PAYMENT METHOD:</td>';
		echo '<td><select>';
		echo '<option>paypal</option>';
		echo '<option>VISA </option>';
		echo '<option>CASH</option>';
		echo '<option>OTHER</option></td>';
		echo '<tr><td>PIN:</td><td><input type="password" id="password_input"  name="password" style="width:230px;padding:5px 5px 5px 5px;font-size:16px;"></td></tr>';
		echo '<tr><td>AMOUNT:</td><td><input type="password" id="password_input"  name="password" style="width:230px;padding:5px 5px 5px 5px;font-size:16px;"></td></tr>';
		echo '<tr><td colspan="3"><div id="account_check" style="padding:10px;background:#02ACEE;width:30%;text-align:center;cursor:pointer;border-radius:0.2em;"><input type="submit" name="pay" value="pay"></div></td></td></tr>';
		//echo '<script>alert("pay success");</script>';
		echo '</table>';
		echo "</div>";
		echo '<br/><br/><br/><div><input type="submit" class="proceed" value="Proceed" name="check_out" style="cursor:pointer;float:right;margin-top:0px;width:80px;padding:10px;background:#02ACEE;border:none;font-weight:bold;border-radius:5px;" /></div>';
		echo '</form>';
		
	}
	
	else{
		echo 'Your Cart is empty';
	}
    ?>
    <style type="text/css">
    	#account_check button{
    		background-color: #fff;
    		padding: 5;
    		border: none;
    	}
    </style> 
	</div>
</body>
</html>
