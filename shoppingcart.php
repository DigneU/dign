<?php
session_start();
    include 'connect.php';
    $sel=mysql_query("SELECT *FROM `customer` ORDER BY user_id DESC LIMIT 0,15 ");
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>FRULEP SUPERMARKET</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/admin.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.setup.js"></script>
  <script type="text/javascript" src='scripts/jquery-1.10.2.js'></script>
  <script type="text/javascript" src='scripts/jquery-ui-1.10.4.custom.min.js'></script>
  <script type="text/javascript" src='scripts/jquery-ui-1.10.4.custom.js'></script>
  <script type="text/javascript" src='scripts/jQueryUI.js'></script>
  <script type="text/javascript" src='scripts/jquery.ui.dialog.js'></script>
  <link rel="shortcut icon" href="images/demo/download.png" width='100%' height='100%'/>
  <link rel="stylesheet" type="text/css" href="styles/jquery-ui-1.10.4.custom.min.css">
  <link rel="stylesheet" type="text/css" href="styles/jquery.ui.dialog.css">
  <script type="text/javascript">
  $(document).ready(function(){
    $("table tr:even").css({
      'background' : 'rgba(0,0,0,.7)',
      'color' : 'white',
      'font-weight':'bold'
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
    <div id="lg"><img src="images/demo/bakame.png"></div>
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
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="breadcrumb">

  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">

    <div id='white-space'></div>
     <table summary="Summary Here" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>USERNAME</th>
            <th>FIRSTNAME</th>
            <th>LASTNAME</th>
            <th>ID_NUMBER</th>
            <th>ADDRESS</th>
            <th>EMAIL</th>
            <th>PHONE</th>


          </tr>
        </thead>
        <?php
            $i=1;
            while ($data=mysql_fetch_array($sel)) {  
          ?>
        <tbody>
          <tr class="light">
            <td><?php echo $i;?></td>
            <td><?php echo $data['username'];?></td>
            <td><?php echo $data['firstname'];?></td>
            <td><?php echo $data['lastname'];?></td>
            <td><?php echo $data['id_number'];?></td>
            <td><?php echo $data['address'];?></td>
            <td><?php echo $data['email'];?></td>
            <td><?php echo $data['phone'];?></td> 
          </tr>
          <?php
          $i++;
        }
          ?>
        </tbody>
      </table>
      <div id='white-space'></div>
  </div>
</div>
<div id='white-space'></div>
<!-- ####################################################################################################### -->
<br class="clear" />
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved - <a href="#">FRULEP SUPERMARKETE</a></p>
    <p class="fl_right">Designed by <a href="#" title="FRULEP SUPERMARKET">Digne</a></p>
    <br class="clear" />
  </div>
</div>
</div>
  </div>
  </div>
</body>
</html>

