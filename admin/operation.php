<?php
session_start();
if(!$_SESSION['login_admin'])
{
  header("location:logout.php");
  exit();
}
else{
    if (@$_GET['sizecerror'] == 1) {
      echo "<script>
        alert('Cover Size Must Not Be More Than 1 MB');
      </script>";
    }
    elseif (@$_GET['sizederror'] == 1) {
      echo "<script>
        alert('Details Size Must Not Be More Than 10 MB');
      </script>";
    }
    elseif (@$_GET['typecerror'] == 1) {
      echo "<script>
        alert('Cover Type Must Be In JPG Or PNG Format');
      </script>";
    }
    elseif (@$_GET['titleerror'] == 1) {
      echo "<script>
        alert('Title Already Exist!');
      </script>";
    }
    else{ 
    }
    include 'connect.php';
    $sub = "submit";
    $value = "Save";
    $url = "upload.php"; 
    $conn=mysqli_connect("localhost","root","","editionbakame");
    $per_page =5;
    $page_query = $conn->query("SELECT COUNT(inventory_id) FROM(`books`)");
    $pages = $page_query->num_rows/$per_page;
    
    if(!isset($_GET['page']))
            {
                //header("LOCATION:oncart.php?page=1");
                echo "<script>";
                  echo "window.location='operation.php?page=1'";
                echo "</script>";
            }
        else{
        $page = $_GET['page'];
        }
    $start = (($page - 1)*$per_page);

    $sel=$conn->query("SELECT *FROM `books` ORDER BY   inventory_id DESC limit $start,$per_page ");
    $bk_id  = @$_GET['bkid'];
    if (isset($_GET['edit'])) {
      $bt  = @$_GET['bt'];
      $at  = @$_GET['at'];
      $nc  = @$_GET['nc'];
      $tm  = @$_GET['tm'];
      $pb  = @$_GET['pb'];
      if (@$_GET['u'] == 'u') {
        $value = "Update";
        $sub = "upload";
      }
      if (@$_GET['d'] == 'd') {
        if ($conn->query("DELETE FROM `books` WHERE `inventory_id` = '$bk_id'")) {
          echo "<script>";
          echo "alert('Book Deleted.');";
          echo "window.location = 'operation.php'; ";
          echo "</script>";
        }
        else{
          echo "<script>";
          echo "alert('Book Not Deleted.');";
          echo "window.location = 'operation.php'; ";
          echo "</script>";  
        }
      }
    }
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>frulep supermarket</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<link rel="stylesheet" href="styles/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/admin.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<link rel="shortcut icon" href="images/demo/bakame.png" width='100%' height='100%'/>
<script type="text/javascript" src="scripts/jquery.cycle.setup.js"></script>
<script src="scripts/jquery-1.10.2.js"></script>
<script src="scripts/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("table tr:even").css({
      'background' : 'rgba(0,0,0,.7)',
      'color' : 'white',
      'font-weight':'bold',
    });
    $("table tr:odd").css({
      'background' : 'rgba(0,0,0,.2)',
      'color' : 'black',
      'font-weight':'bold'
    });
    $( "#time" ).datepicker();
    $( "#format" ).change(function() {
      $( "#time" ).datepicker( "option", "dateFormat", $("#format").val() );
    });
  });
</script>
</head>
<body>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    
    <div id="logo">
      <h1><a href="#">FRULEP SUPERMARKET</a></h1>
      
    </div>
    <div id="topnav">
      <ul>
        <li class=""><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li class="last"><a href="#"></a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li>FRULEP SUPERMARKET Manager</li>
      <li>&#187;</li><li>&#187;</li>
      <li><a href="user.php">VIEW REGISTERED USERS</a></li>
      <li>&#187;</li><li>&#187;</li><li>&#187;</li>
          <li><a href="purchasehistory.php">PURCHASE HISTORY</a></li>
          <li>&#187;</li><li>&#187;</li><li>&#187;</li>
          <li><a href="stockin.php">STOCK IN</a></li>
          <li>&#187;</li><li>&#187;</li><li>&#187;</li>
          <li><a href="email.php">Email</a></li>
          <li>&#187;</li><li>&#187;</li><li>&#187;</li>
          <li class="current" style="margin-left:55px;"><a href="logout.php">logout</a></li>


    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <div id="content">
      <div id='white-space'></div>
<form method="POST" action="<?php echo $url;?>" enctype="multipart/form-data">
      <!---------------------------------------------form-------------------------------!-->
      <?php
         echo "<input type='hidden' name = 'bkid' value='$bk_id' >";
       ?>
      <div id="div">
    <div for="fname" class='iner'>PRODUCT NAME:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="text" name="bookname" id="bookname" required value = '<?php echo @$bt; ?>' /></div>
  </div>

  <div id="div">
    <div for="lname" class='iner'>MANUFACTURE:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="text" name="author" id="author" required value = '<?php echo @$at; ?>'/></div>
  </div>
  <div id="div">
    <div for="lname" class='iner'>QUANTITY:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="text" name="copy" id="author" required value = '<?php echo @$nc; ?>'/></div>
  </div>
  <div id="div">
    <div for="lname" class='iner'>In-coming Date:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="text" name="time" id="time" required value = '<?php echo @$tm; ?>'></div>
    <input type='hidden' id='format' value='yy-mm-dd'> 
  </div>
  
	<div id="div">
    <div for="lname" class='iner'>IMAGES:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="file" name="cover" id="cover" <?php echo @$_GET['edit']?"":"required" ?> /></div>
  </div>

  <div id="div">
    <div for="lname" class='iner'>Details:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="file" name="details" id="cover"  <?php echo @$_GET['edit']?"":"required" ?> /></div>
  </div>
  <div id="div">
    <div for="address" class='iner'>price Per ITEM:</div>
    <div class='space iner'>&nbsp;</div>
    <div class='iner'><input type="text" name="price" id="price" required value = '<?php echo @$pb; ?>'/></div>
  </div>
   <div id="div">
    <div class="iner submit" id=""><input type="submit" name="<?php echo $sub; ?>" value='<?php echo $value; ?>' id='sub' /></div>
  </div>
  </form>
  <div id='white-space'></div>
<div id='white-space'></div>
    </div>
     <div id='white-space'></div>
    <div id="column">
      <!--<div class="subnav2">!-->        
        <table summary="Summary Here" cellpadding="0" cellspacing="0">
          <thead>
          <tr>
            <th>#</th>
            <th>IMAGE</th>
            <th>MANUFACURE</th> 
            <th>QUANTITY</th>
            <th>price</th>
            <th colspan=2>operation</th>
          </tr>
        </thead>
          <?php
          $i=1;
while ($fetch=$sel->fetch_array()) {  

          ?>
          <tbody>
          <tr class="light">
            <td><?php echo $i  ; ?></td>
            <td width="200"><ul class="photo" style="list-style-type:none; transition: 2s all; "><li><a href='#'><img id="transform" src="./books/covers/<?php echo $fetch['cover'];?>" width=50 height=30></a></li></ul></td>
            <td><?php echo $fetch['author'];?></td>
            <td><?php echo $fetch['copy'];?></td>
            <td><?php echo $fetch['price'];?></td>
            <td><a href="operation.php?page=<?php echo $_GET['page'];?>&edit=1&u=u&bkid=<?php echo $fetch['inventory_id'];?>&bt=<?php echo $fetch['book_title'];?>&at=<?php echo $fetch['author'];?>&pb=<?php echo $fetch['price'];?>&nc=<?php echo $fetch['copy'];?>&tm=<?php echo $fetch['time'];?>">edit</a></td><td><a href="operation.php?edit=1&d=d&bkid=<?php echo $fetch['inventory_id'];?>">delete</a></td>
          </tr>
       <?php
       $i++;
         }
      ?>
        </tbody>
        </table>
        <div>
          <?php
echo "<div id='pagination' style='font-size:16px;font-weight: bold;text-align: center;'> ";
for($numb=1;$numb<=$pages;$numb++){
   if ($page == $numb) {
    echo "<label>";
    echo "<a href='operation.php?page=$numb' style='color: #000;' >$numb </a>";
    echo "</label>";
    }
    else{
    echo "<label class=''>";
    echo "<a href='operation.php?page=$numb'>$numb </a>";
    echo "</label>";
    }
    }
echo "</div>";
?>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div id='white-space'></div>

<!-- ####################################################################################################### -->
<br class="clear" />
<div id='white-space'></div>
<div id='white-space'></div>
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved - <a href="#">FRULEP SUPERMARKET</a></p>
    <p class="fl_right">Designed by <a href="http://www.facebook.com/paul" title="edition bakame">DIGNE</a></p>
    <br class="clear" />
  </div>
</div>
<!------- errors ------------>
</div>
</body>
</html>
<?php
}
?>