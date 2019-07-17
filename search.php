<?php
require 'connect.php';
$gg = @$_POST['gg'];
?>
<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
<link href="style/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
	$(function(){
		$("*#pagination #divN").click(function(numb){
			var onDiv = $(numb.target).val();
			var key = $("#keY").val();
			var url = $("#url").val();
			$.post('search.php',
				{key:key,gg:onDiv,url:url},
				function(back){
					$('#container').html(back);
				}
			);
		});
	});
</script>
<div id="products-wrapper">
    <div class="products">
    <?php
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_POST['url']);
    $conn=mysqli_connect("localhost","root","","editionbakame");
    $key = @$_POST['key'];
    echo "<input type='hidden' id='keY' value='$key'>";
    echo "<input type='hidden' id='url' value='".$_POST['url']."'>";
   if (empty($key)) {
        require 'index2.php';
    }
    else{
	$per_div =3;
    $div_query = $conn->query("SELECT COUNT(inventory_id) FROM(`books`) WHERE  book_title LIKE '%$key%' ");
    $re =$div_query->num_rows;
    $divs = ceil($re/$per_div);

    if (!isset($_POST['gg'])) {
    	$gg = 1;
    }
    else{
    	$gg = $_POST['gg'];
    }
    $start = ($gg - 1)* $per_div;


	$results =$conn->query("SELECT * FROM books WHERE book_title LIKE '%$key%' ORDER BY inventory_id ASC LIMIT $start,$per_div ");
    echo "<div>Result Find ($re)</div>";
    if ($results) { 

        while($obj = $results->fetch_assoc())
        {	
			echo '<div class="product">'; 
            echo '<form method="POST" action="cart_update.php">';
			echo '<div class="product-thumb"><img src="../EDITIONBAKAME/admin/books/covers/'.$obj['cover'].'" style="width:80px; height:100px;" /></div>';
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
	for($numb=1;$numb<=$divs;$numb++){
		if ($numb == $gg) {
			$border = "solid 1px red";
		}
		else{
			$border = "solid 0px red";	
		}
    echo "<button id='divN' value='$numb' style='background:#333;color:#999;cursor:pointer;padding: 3px;border-radius:0.2em;border:".$border.";'>";
    echo "$numb";
    echo "</button> &nbsp;";
    }
echo "</div>";
	}
    ?>
    </div>

</div>