<?php
// if (@$_SESSION['user_login'] == 1) {
    // $user_id = $_SESSION['user_id'];
    // $select = mysql_query("SELECT *FROM `customer` WHERE `user_id` = '$user_id' ")or die(mysql_error());
    // #var_dump($user_id);
  // $fetch = mysql_fetch_assoc($select);
?>
<link href="style/style.css" rel="stylesheet" type="text/css">
<div id="products-wrapper">
    <div class="products">
    <?php
    $conn=mysqli_connect("localhost","root","","editionbakame");
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	$per_page =3;
    $page_query = $conn->query("SELECT COUNT(inventory_id) FROM(`books`)");
    $pages = ceil($page_query->num_rows/$per_page);


	if(!isset($_GET['page']))
        {
            //header("LOCATION:oncart.php?page=1");
            echo "<script>";
              echo "window.location='oncart.php?page=1'";
            echo "</script>";
        }
    else{
    $page = @$_GET['page'];
    }
	$start = ((@$page - 1)*$per_page);
    //$p = 1;


	$results =$conn->query("SELECT * FROM books ORDER BY inventory_id ASC LIMIT $start,$per_page");
	//$results=mysql_fetch_assoc($all_books);
    if ($results) { 
	
        //fetch results set as object and output HTML
        while($obj = $results->fetch_assoc())
        {
			echo '<div class="product">'; 
            echo '<form method="POST" action="cart_update.php">';
			echo '<div class="product-thumb"><img src="admin/books/covers/'.$obj['cover'].'" style="width:80px; height:100px;" /></div>';
            echo '<div class="product-content"><h3>'.$obj['book_title'].'</h3>';
            echo '<div class="product-desc">'.substr($obj['description'],0,130).'... </div>';
            echo '<div class="product-info">';
			echo 'Price Rwf '.$obj['price'].' | ';
            echo 'Qty <input style="width:50px;" type="text" name="product_qty" value="1" />';
			echo '<button class="add_to_cart">Add To Cart</button>';
			echo '</div></div>';
            echo '<input type="hidden" name="product_code" value="'.$obj['inventory_id'].'" />';
			echo '<input type="hidden" name="limit_qty" value="'.$obj['copy'].'" />';
            echo '<input type="hidden" name="name" value="'.$obj['book_title'].'" />';
            echo '<input type="hidden" name="price" value="'.$obj['price'].'" />';
            echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '</form>';
            echo '</div>';
        }
    
    }
echo "<div id='pagination'> ";
for($numb=1;$numb<=$pages;$numb++){
   if (@$page == $numb) {
    echo "<label>";
    echo "<a href='oncart.php?page=$numb' style='color: #000;' >$numb </a>";
    echo "</label>";
    }
    else{
    echo "<label class=''>";
    echo "<a href='oncart.php?page=$numb'>$numb </a>";
    echo "</label>";
    }
    }
echo "</div>";
    ?>
    </div>
    
	<div class="shopping-cart">
	<h2>Your Shopping Cart</h2>
	<?php
	if(isset($_SESSION["products"]))
	{
		$total = 0;
		echo '<ol>';
		foreach ($_SESSION["products"] as $cart_itm)
		{
			echo '<li class="cart-itm">';
			echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
			echo '<h3>'.$cart_itm["name"].'</h3>';
			$code=$cart_itm['code'];
			//echo '<div class="p-code">P code : '.$cart_itm["code"].'</div>';
			echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
			echo '<div class="p-price">Price : Rwf '.$cart_itm["price"].'</div>';
			echo '</li>';
			$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
			$total = ($total + $subtotal);
		}
		echo '</ol>';
		echo '<span class="check-out-txt"><strong>Total : Rwf '.$total.'</strong> <a href="view_cart.php">Check-out!</a></span>';
		echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';
	}
	else{
		echo 'Your Cart is empty';
	}
	?>
	</div>
</div>

