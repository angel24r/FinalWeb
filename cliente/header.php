<?php  
session_start();
if(!isset($_SESSION['nombre']))
    header("location: ../index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/final/CSS/new.css">
	<link rel="stylesheet" type="text/css" href="/final/CSS/newbootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="../JS/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../JS/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="../JS/producto.js"></script>
</head>
<body>
<?php include "menu.php" ?>