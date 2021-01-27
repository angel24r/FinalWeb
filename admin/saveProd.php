<?php
include "../class/classBaseDatos.php";
if(isset($_POST['save'])){
	$nombre = $_POST['nombre'];
	$desc = $_POST['desc'];
	$precio = $_POST['precio'];
  	$photo = $_POST['photo'];
  	$extension=explode(".",$photo); 
 	$extension=$extension[count($extension)-1];
	
}
?>