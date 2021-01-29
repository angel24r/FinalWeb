<?php  
session_start();
if(!isset($_SESSION['nombre']))
    header("location: ../index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

  <script src="../JS/jquery-3.5.1.min.js"></script>
	<script src="../JS/jquery-confirm.js"></script>
	<link rel="stylesheet" href="../css/jquery-confirm.css">
  <link rel="stylesheet" type="text/css" href="/final/CSS/new.css">
	<link rel="stylesheet" type="text/css" href="/final/CSS/newbootstrap.css">
</head>
<body>
<?php include "menu.php" ?>