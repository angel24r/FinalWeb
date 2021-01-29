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
<div class="container my-4">
<div class="card card-solid">
<div class="fb-comments" data-href="https://www.facebook.com/photo.php?fbid=854953191618433&set=pb.100013112792337.-2207520000..&type=3" data-width="" data-numposts="5"></div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v9.0" nonce="0s93zsst"></script>