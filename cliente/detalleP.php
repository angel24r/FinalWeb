<?php
include "header.php";	
include "../class/classBaseDatos.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(isset($_POST['descrip']))
  {
     $var= (filter_input(INPUT_GET,'id'));      
     echo $oBD->listaProducto("SELECT * from productos where IdProducto=".$var);
  }
}
?>