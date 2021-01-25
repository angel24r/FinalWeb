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
</head>
<body>
<?php include "menu.php" ?>