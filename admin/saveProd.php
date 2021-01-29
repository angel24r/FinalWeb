<?php
$conexion=mysqli_connect("sql3.freesqldatabase.com","sql3389609","ppqhx3xmzY","sql3389609");
include "../class/classBaseDatos.php";
if(isset($_POST['save'])){
	$nombre = $_POST['nombre'];
	$desc = $_POST['desc'];
	$precio = $_POST['precio'];
  $photo = $_FILES['photo']['name'];
  $extension=explode(".",$photo); 
  $extension=$extension[count($extension)-1];
  $categoria = $_POST['IdCategoria']; 
  $query = "INSERT INTO productos(Nombre,Descripcion,Precio,Foto,IdCategoria) values('$nombre','$desc','$precio','$extension','$categoria')";
  $oBD->consulta($query);
  $quer="SELECT IdProducto FROM productos order by IdProducto Desc limit 1";
  $bloque=mysqli_query($conexion,$quer);
  $tem=mysqli_fetch_array($bloque);
 
  if($_FILES['photo']['name']>""){ 
  move_uploaded_file($_FILES['photo']['tmp_name'], 
  "../imagenes/".$tem[0].".".$extension);   
}
}	
$_SESSION['message']='Dato guardado correctamente';
header("location: productos.php");
?>