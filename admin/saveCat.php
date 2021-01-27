<?php
include "../class/classBaseDatos.php";
if(isset($_POST['save'])){
  $nombre = $_POST['nombre'];
  $query = "INSERT INTO categoria(Nombre) values('$nombre')";
  $oBD->consulta($query);
}
header("location: categoria.php");
?>