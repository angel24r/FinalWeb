<?php 
	include "header.php";	
  include "../class/classBaseDatos.php";
  //echo $oBD->lista("SELECT * from productos",1);
  if(isset($_POST['accion'])){
    switch($_POST['accion']){
        case 'delete':          
            $oBD->consulta("DELETE from productos where IdProducto=".$_POST['Id']);            
            //echo 'borrando';
        break;        
    }
  }
?>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4">    
			<div class="card card-body">
      <h3 style="text-align:center;">Agregar Productos</h1><br>
				<form action="saveProd.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus="">
					</div>
					<div class="form-group">
						<textarea name="desc" rows="4" class="form-control" placeholder="Ingresa la descripción"></textarea>
					</div>
					<div class="form-group">
						<input type="number" step=0.01 name="precio" class="form-control" placeholder="Precio" autofocus="">
					</div>
					<div class="form-group">						
        			    <?php echo $oBD->categoria("SELECT * from categoria");?>
					</div>
					<div class="form-group">
            			<label for="exampleInputFile">PHOTO</label>
           				<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="photo">
           				<small id="fileHelp" class="form-text text-muted">Puedes subir tu foto aqui</small>
					</div>
					<input type="submit" name="save" class="btn btn-success btn-block" value="Agregar">
				</form>
			</div>
		</div>
		<div class="col-md-8">
			<?php echo $oBD->desplegarTabla("SELECT p.IdProducto,p.Nombre,p.Descripcion,p.Precio,p.Foto,(c.Nombre)as Categoria from productos p join categoria c on p.IdCategoria=c.IdCategoria",array("update","delete"));?>
		</div>		
	</div>
</div>