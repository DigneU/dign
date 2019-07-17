<?php
session_start();
require_once('connect.php');
$account=$_POST['account'];
$password=$_POST['password'];
$total  = $_POST['total_a'];
if(isset($_POST['check_out'])){
	if(!empty($account) OR !empty($password)){
		$sql = mysql_query(" SELECT client.amount,client.password FROM equity_bank.client WHERE client.account_number = '$account' ");
	if (mysql_num_rows($sql) == 1) {
		$my  = mysql_fetch_assoc($sql);
		if ($my['password'] == $password ) {
			if ($my['amount'] >= $total) {
				$rest = $my['amount'] - $total;
			if (mysql_query("UPDATE equity_bank.client SET client.amount = '$rest' WHERE client.account_number = '$account'")) {
					$edition = "12-3542-36";
					$sqle = mysql_query(" SELECT client.amount FROM equity_bank.client WHERE client.account_number = '$edition' ");
					$mye  = mysql_fetch_assoc($sqle);
					$ttt = $mye['amount'] + $total;
					if (mysql_query("UPDATE equity_bank.client SET client.amount = '$ttt' WHERE client.account_number = '$edition'")){
								$number_of_booked_books=(int)$_POST['cart_items'];
								$count=1;
								while($count<=$number_of_booked_books){
									foreach ($_SESSION["products"] as $cart_itm){
										$customer=(int)$_POST['customer'];
										$book=(int)$cart_itm["code"];
										$qty=(int)$cart_itm['qty'];
										$store_qty=mysql_query('SELECT copy FROM books WHERE inventory_id='.$book);
										$store=mysql_fetch_array($store_qty);
										$book_qty=(int)$store['copy'];
										$remaining_copies=$book_qty-$qty;
										$date=time();
										$check_out=mysql_query('INSERT INTO sold_books SET book='.$book.', qty='.$qty.', customer='.$customer.', date='.$date) OR die('ERROR SAVING THE SOLD BOOKS'.mysql_error());
										var_dump($check_out);
										if($check_out){
											mysql_query('UPDATE books SET copy='.$remaining_copies.' WHERE inventory_id='.$book) OR die('ERROR UPDATING THE BOOK STORE QUANTITY'.mysql_error());
										}
										else{
											exit('There was an error checking out the chosen books');
										}
									}	
									$count++;
								}
								unset($_SESSION['products']);	
								header("LOCATION:mybook.php");
					}
					else echo "edition update";

				}
				else{
					echo "Account update";
				}	
			}
			else echo "amount";
		}
		else{echo "Password";}
	}
		else{
			echo "Network error !";
		}		
	}
	else{
		echo "please fill the account number and password to proceed the buying!!!!";
	}
}
else{
	
}
?>
