<?php 
	include "header.php";	
  include "../class/classBaseDatos.php";
  echo $oBD->lista("SELECT * from productos",1);
?>