<?php 
	include "header.php";	
  include "../class/classBaseDatos.php";
  //echo $oBD->lista("SELECT * from productos",1);
  if(isset($_POST['accion'])){
    switch($_POST['accion']){
        case 'delete':          
            $oBD->consulta("DELETE from categoria where IdCategoria=".$_POST['Id']);            
            //echo 'borrando';
        break;        
    }
  }
?>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4">    
			<div class="card card-body">
      <h3 style="text-align:center;">Agregar Categorias</h1><br>
				<form action="saveCat.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus="">
					</div>					
					<input type="submit" name="save" class="btn btn-success btn-block" value="Agregar">
				</form>
			</div>
		</div>
<div class="col-md-8">	
			<?php echo $oBD->desplegarTabla("SELECT * from categoria",array("update","delete"));?>
</div>