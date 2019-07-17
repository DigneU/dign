<?php
session_start();
unset($_SESSION['login_admin']);
unset($_SESSION['admin']);
session_destroy();
header("location:./?lo=h");
exit();
?>