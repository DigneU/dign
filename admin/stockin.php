<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>FRULEP SUPERMARKET</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<link rel="stylesheet" href="styles/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/admin.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<link rel="shortcut icon" href="images/demo/download.png" width='100%' height='100%'/>
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
      <p></p>
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
<br>
<table border="5"><tr><th> ITEM </th><th>MANUFACTURE</th><th>PRICE</th><th>DETAILS</th></tr>;
<?php
$conn=mysqli_connect("localhost","root","","editionbakame");
$conn=mysqli_connect("localhost","root","","editionbakame");
  $sel=$conn->query("SELECT * FROM books ");
   $count = $sel->num_rows;
   if($count > 0)
        {
           
            while($rows=$sel->fetch_assoc())
            {
                echo "<tr><td>".$rows['book_title']."</td><td>".$rows['author']."</td><td>".$rows['price']."</td><td>".$rows['detaills']."</td></tr>";
            }
            echo "</table>";
        }
        else{
            echo "no records!!!";
        }
?>