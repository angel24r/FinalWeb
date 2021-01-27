<?php 
	include "header.php";	
  include "../class/classBaseDatos.php";
  //echo $oBD->lista("SELECT * from productos",1);
  if(isset($_POST['accion'])){
    switch($_POST['accion']){
        case 'delete':          
            $oBD->consulta("DELETE from usuarios where IdUsuario=".$_POST['Id']);            
            //echo 'borrando';
        break;        
    }
  }        
?>
<div class="container my-5">	
			<?php echo $oBD->desplegarTabla("SELECT u.IdUsuario,u.Nombre,u.Correo,u.Password,u.Foto,t.TipoUsuario from usuarios u join tipousuario t on u.IdTipo=t.IdTipo",array("delete"));?>
</div>