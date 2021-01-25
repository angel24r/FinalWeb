<?php 
session_start();

$conexion=mysqli_connect("localhost","root","","tienda");

	if($conexion)
{
	
	$cad="SELECT * FROM usuarios where Correo='".$_POST['x']."' and Password='".$_POST['y']."'";

	$bloque=mysqli_query($conexion,$cad);

	mysqli_close($conexion);
	if (mysqli_num_rows($bloque)==1) 
	{
		$registro=mysqli_fetch_object($bloque);

		$_SESSION['nombre']=$registro->Nombre;
		$_SESSION['Id']=$registro->IdUsuario;
		$_SESSION['email']=$registro->Correo;
    $_SESSION['foto']=$registro->IdUsuario.".".$registro->Foto;
    $_SESSION['tipo']=$registro->IdTipo;
    $tipo=$_SESSION['tipo'];
    switch ($tipo) {
      case 1:
        header("location: registro.php");
        break;
      
      default:
      header("location: cliente/home.php");
        break;
    }		
	}
	else{
		header("location: ingresa.php?fallo=true");
	}
}

else
	echo "Se conecto mal";
 ?>