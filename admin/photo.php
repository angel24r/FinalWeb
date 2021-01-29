<?php 
	include "header.php";	
  include "../class/classBaseDatos.php";
  $name=$_POST['Id'];
  $ex=$_POST['foto'];
  if(isset($_FILES['photo']['name']))
  {
    if($_FILES['photo']['name']>"")
    {
     $extension=explode(".",$_FILES['photo']['name']); 
     $extension=$extension[count($extension)-1];
    
      move_uploaded_file($_FILES['photo']['tmp_name'], 
      "../imagenes/".$_POST['Id'].".".$extension);
      $oBD->consulta("UPDATE productos set Foto='".$extension."' where IdProducto=".$_POST['Id']); 
    }
    header("location: productos.php");
     
  }
  
  ?>
  <div class="container p-4">
    <div class="row">
      <div class="col-md-4">    
        <div class="card card-body">
          <img src="../imagenes/<?php echo($name.'.'.$ex);?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-body">
          <form  method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="hidden" name="Id" value="<?php echo $name;?>"/>
              <input type="hidden" name="foto" value="<?php echo $ex;?>"/>
          	  <label for="exampleInputFile">PHOTO</label>
            	<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="photo">
          	  <small id="fileHelp" class="form-text text-muted">Puedes subir tu foto aqui</small>
            </div>            
            <button type="submit" class="btn btn-primary">Actualizar</button> 
            
          </form>
				</div>
      </div>
    </div>
  </div>