<?php 
	include "header.php";	
  include "../class/classBaseDatos.php";
  //echo $oBD->lista("SELECT * from productos",1);
?>
<div class="container p-3">
	<div class="row">
		<div class="col-md4">
			<div class="card card-body">
				<form action="saveProd.php" method="POST">
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
            			<label for="exampleInputFile">PHOTO</label>
           				<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="photo">
           				<small id="fileHelp" class="form-text text-muted">Puedes subir tu foto aqui</small>
					</div>
					<input type="submit" name="save" class="btn btn-success btn-block" value="Agregar">
				</form>
			</div>
		</div>		
	</div>
	
</div>