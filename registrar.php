<?php
session_start();

$conexion=mysqli_connect("sql3.freesqldatabase.com","sql3389609","ppqhx3xmzY","sql3389609");

	if($conexion)
{
  $name=$_POST['name'];
  $pass=$_POST['password'];
  $email=$_POST['email'];
  $tipo=2;
  
	$cad="INSERT INTO usuarios(Nombre,Correo,Password,IdTipo) VALUES('$name','$email','$pass','$tipo')";

	$bloque=mysqli_query($conexion,$cad);


		header("location: ingresa.php");
	
}
else
	echo "Se conecto mal";
 ?>