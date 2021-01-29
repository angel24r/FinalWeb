<?php 
	include "header.php";	
  include "../class/classBaseDatos.php";
  
?>
<div class="container">
	<H1 style="text-align:center;">Productos</H1>
	<div>
		<div style="text-align:center;">
			<?php echo $oBD->categoriaP("SELECT * from categoria");?>
		</div>
	</div>
	</div>
		<?php echo $oBD->lista("SELECT p.IdProducto,p.Nombre,p.Descripcion,p.Precio,p.Foto,(c.Nombre)as Categoria from productos p join categoria c on p.IdCategoria=c.IdCategoria",1); ?>

<?php include "../footer.php"?>