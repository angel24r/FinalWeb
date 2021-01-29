<?php 
include "header.php";	


include "../class/classBaseDatos.php";?>
<div class="container">
  <H1 style="text-align:center;">Cotiza</H1>
  <div>
    <div style="text-align:center;">
      <?php echo $oBD->categoriaP("SELECT * from categoria");?>
    </div>
  </div>
  </div>
<?php
echo $oBD->lista("SELECT p.IdProducto,p.Nombre,p.Descripcion,p.Precio,p.Foto,(c.Nombre)as Categoria from productos p join categoria c on p.IdCategoria=c.IdCategoria",2);
$product_ids = array();
$arra= array();
if(filter_input(INPUT_POST,'addtocart'))
{
  if(isset($_SESSION['carro']))
  {
   
    $count=count($_SESSION['carro']);
    $arra=array_column($_SESSION['carro'],'Id');
    if(!in_array(filter_input(INPUT_GET,'id'),$arra))
    {
      $_SESSION['carro'][$count] = array
      (
        'Id'=> filter_input(INPUT_GET,'id'),
        'Nombre'=> filter_input(INPUT_POST,'nam'),
        'Descripcion'=> filter_input(INPUT_POST,'descrip'),
        'Precio' => filter_input(INPUT_POST,'price'),
        'Cantidad' => filter_input(INPUT_POST,'cant')
           
      );
     
    }
    else
    {
      for ($i=0; $i < count($arra) ; $i++) { 
        if($arra[$i]==filter_input(INPUT_GET,'id'))
        {
        
          $_SESSION['carro'][$i]['Cantidad']+=filter_input (INPUT_POST,'cant');        
        }
        
      }
    }
    $idP=$_SESSION['carro'][$count-1]['Id'];
    $tot=number_format(($_SESSION['carro'][$count-1]['Cantidad'])*($_SESSION['carro'][$count-1]['Precio']));
    $can=$_SESSION['carro'][$count-1]['Cantidad'];
    $idU=$_SESSION['Id'];
    //echo $tot;  
   //  $oBD->consulta("INSERT INTO genera(IdProducto,Precio,Cantidad,idUsuario) VALUES('$idP','$tot','$can','$idU')"); //;
  }
  else
  {
    $_SESSION['carro'][0] = array
      (
        'Id'=> filter_input(INPUT_GET,'id'),
        'Nombre'=> filter_input(INPUT_POST,'nam'),
        'Descripcion'=> filter_input(INPUT_POST,'descrip'),
        'Precio' => filter_input(INPUT_POST,'price'),
        'Cantidad' => filter_input(INPUT_POST,'cant')
           
      );  
      $idP=$_SESSION['carro'][0]['Id'];    
    $can=$_SESSION['carro'][0]['Cantidad'];
    $idU=$_SESSION['Id'];  

       $tot=number_format(($_SESSION['carro'][0]['Cantidad'])*($_SESSION['carro'][0]['Precio']),2);
    // $oBD->consulta("INSERT INTO genera(IdProducto,Precio,Cantidad,idUsuario) VALUES('$idP','$tot','$can','$idU')");
    //echo $tot;
  } 
  $fecha=(date("Y-m-d")); 
  $id=$_SESSION['Id'];
  //INSERT INTO pedido(Fecha,IdUsuario) VALUES('$fecha','$id');
  //
}
//print_r($_SESSION);

if(filter_input(INPUT_GET,'action')=='delete')
{
  foreach($_SESSION['carro'] as $key =>$produc){
    if($produc['Id']==filter_input(INPUT_GET,'id'))
    {
      unset($_SESSION['carro'][$key]);
    }
  }  
  $_SESSION['carro'] = array_values($_SESSION['carro']);
}

function pre_r($array)
{
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}  
?>
<div class="container">
<div class="table-responsive">
  <table class="table">
    <tr><th colspan="6" style="text-align:center;"><h3>Cotización</h3></th></tr>
    <tr>
      <th width="25%">Producto</th>
      <th width="%">Descipción</th>
      <th width="10%">Precio</th>
      <th width="10%">Cantidad</th>
      <th width="10%">Total</th>
      <th width="5%" class="text-center">Eliminar</th>
    </tr>
    <?php
    if(!empty($_SESSION['carro'])):
      $total=0;

      foreach($_SESSION['carro'] as $key=>$product):        
    ?>
    <tr>
        <td><?php echo $product['Nombre'];?></td>
        <td><?php echo $product['Descripcion'];?></td>
        <td><?php echo ("$".$product['Precio']);?></td>
        <td><?php echo $product['Cantidad'];?></td>
        <td><?php echo ("$".number_format($product['Cantidad'] * $product['Precio'],2));?></td>
        <td class="text-center"><a href="cotizar.php?action=delete&id=<?php echo $product['Id']?>">
              <input type="image" src="../resources/delete.png">              
            </a>
        </td>
    </tr>
    <?php
      $total=$total+($product['Cantidad']*$product['Precio']);
      endforeach;
    ?>
    <tr>
        <th colspan="4" align="right">Total</th>
        <td align="left">$ <?php echo number_format($total,2);?></td>
        <td></td>
    </tr>
    <tr>
      <td colspan="6">
      <?php
        if(isset($_SESSION['carro'])):
        if(count($_SESSION['carro'])>0):
      ?>      
      <?php endif; endif;?>
      </td>
      </tr>
      <?php endif;?>
  </table>
</div>
</div>
<?php include "../footer.php"?>