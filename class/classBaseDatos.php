<?php
class BaseDatos
{
  var $conexion;
  function conecta()
  {
    $this->conexion=mysqli_connect("sql3.freesqldatabase.com","sql3389609","ppqhx3xmzY","sql3389609");
  }
  function cierraBD()
  {
    mysqli_close($this->conexion);
  }
  function accion($pAccion1){
    $conj=null;
   
    
  if (strlen(strstr($pAccion1," "))>0) {
      $conj=explode(" ", $pAccion1);
      $pAccion=$conj[0];
      $idjs=$conj[1];
      
     // echo $conj[0];//$pAccion.' '.$id;
  }else{
      $pAccion=$pAccion1;
     
  }
  switch($pAccion){
    case 'formUpdate': 
      $registro=$this->saca_tupla("SELECT * from productos where IdProducto=".$idjs);

    case 'formNew':            
      echo '<div class="container">';
      echo '<h3>'.($_REQUEST['accion']=="formNew"?"Nueva encuesta":"Actualizar Producto '".$registro->Nombre."'").'</h3>';
      //echo '<h3>Nueva encuesta</h3>';
          echo '<form method="post" id="formEncuesta">
              <input type="hidden" name="accion"
              value="'.(isset($registro->IdProducto)?"update":"insert").'"/>';
              
              if(isset($registro->IdProducto))
               echo '<input type="hidden" name="Id" value="'.$registro->IdProducto.'"/>';
              
              
              echo '<div class="row">
                  <label class="col-md-4">Nombre</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="Nombre" value="'.(isset($registro->Nombre)?"$registro->Nombre":"").'"/>
                  </div>
              </div>

              <div class="row">
                  <label class="col-md-4">Descripcion</label>
                  <div class="col-md-8">
                      <textarea class="form-control" name="Descripcion">'.(isset($registro->Descripcion)?"$registro->Descripcion":"").'</textarea>
                  </div>
              </div>

              <div class="row">
                  <label class="col-md-4">Estatus</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" name="Precio" value="'.(isset($registro->Precio)?"$registro->Precio":"").'"/>
                  </div>
              </div>

              <div class="row">
                  <label class="col-md-4">Tipo</label>
                  <div class="col-md-8">';

                  echo $this->categoria("SELECT * from categoria");

                  echo '</div>
              </div>
              <div class="row">
              
              
              </div>
          <form>
      </div>';
  break;
  case 'update':
    $query="UPDATE productos SET ";
    foreach($_POST as $nombCampo => $valor){
        if(!in_array($nombCampo,array("accion","Id")))
            $query.=$nombCampo."='".$valor."', ";
    }
    $query=substr($query,0,-2);
    $id=$_POST['Id'];
    $query.=" where IdProducto=".$id;
    $this->consulta($query);     
break;
  }
  }
  function consulta($query)
        {
            $this->conecta();
            $bloque=mysqli_query($this->conexion,$query);

            if(strpos(strtoupper($query),"SELECT")!==false)
            {
            $this->numeRegistros=mysqli_num_rows($bloque);
            }
            else{$this->numeRegistros=0;}

            $this->error=mysqli_error($this->conexion);

            $this->cierraBD();

            if($this->error>"")
            {
                echo $query."    => ".$this->error;
                exit;
            }

            return $bloque;
        }

        function saca_tupla($query)
        {
            $this->conecta();
            $bloque=mysqli_query($this->conexion,$query);
            $this->numeRegistros=mysqli_num_rows($bloque);
            $this->cierraBD();         
            return mysqli_fetch_object($bloque);
        }
        function lista($query,$opcion)
        {
          $registros=$this->consulta($query);
          $result='';
          $columnas=mysqli_num_fields($registros);
          if(mysqli_num_rows($registros)>0)
          {      
            $result.='<div class"container" style="padding: 25px 30px 25px 30px;">
                        <div class="row text-center py-2">';      
            while($product=mysqli_fetch_assoc($registros))
            {
              $result.='<div class="col-sm-6 col-md-3 my-2 product-item" category="'.$product['Categoria'].'" style="border 1px; ">';
              switch ($opcion) {
                case 1:
                  $result.='<form method="post" action="../cliente/detalleP.php?id='.$product['IdProducto'].'">';
                  break;                  
                  default:
                  $result.='<form method="post" action="../cliente/cotizar.php?action=add&id='.$product['IdProducto'].'">';
                  break;
                }
                      
                $result.='<div class="card shadow">
                                  <div>
                                    <img src="../imagenes/'.$product['IdProducto'].'.'.$product['Foto'].'" class="img-fluid card-img-top" style="width: 100%; height: 300px; object-fit: cover;">
                                  </div>
                                  <div class="card-body">
                                    <h4 class="card-title">'.$product['Nombre'].'</h4>
                                    <p>Precio: $'.$product['Precio'].' c/u</p>';
                     switch ($opcion) {
                       case 1:
                         $result.='<button type="submit" name="descrip" id="'.$product['IdProducto'].'" class="btn btn-dark my-3">Ver más</button>';
                         break;
                       
                       default:
                         $result.='<input type="text" class="text-center" name="cant"  value="1"/><br>
                                  <input  type="hidden" name="nam" value="'.$product['Nombre'].'"/>
                                  <input  type="hidden" name="price" value="'.$product['Precio'].'"/>
                                  <input  type="hidden" name="descrip" value="'.$product['Descripcion'].'"/>
                                  <input type="submit" name="addtocart" id="'.$product['IdProducto'].'" class="btn btn-dark my-3" value="Agregar"/>';
                         break;
                     }               
                                
                        $result.='</div>
                                </div>                         
                              </form>
                            </div><br>';
            }
            $result.='</div></div>'; 
          }
          return $result;
        }
        function listaProducto($query)
        {
          $registros=$this->consulta($query);
          $pro=mysqli_fetch_assoc($registros);
          $resulta='';
          $resulta='<div class="container my-4">
                      <div class="card card-solid">
                      
                        <div class="row">
                          <div class="col-12 col-sm-6">
                          <h3 class="d-line-block d-sm-none">'.$pro['Nombre'].'</h3><br>
                            <div class="col-12">
                            <img src="../imagenes/'.$pro['IdProducto'].'.'.$pro['Foto'].'" class="center" style="width: 70%; 
                            padding: 1em; height:100%; object-fit: cover;  display:block; margin:auto;">
                            </div>                            
                        </div>
                        <div class="col-12 col-sm-6">
                         <h2 class="my-3" style="text-align: center;">'.$pro['Nombre'].'</h3><br>
                         <h5 class="my-3" >Descipción del producto:</h3><br>
                         <p>'.$pro['Descripcion'].'</p>   
                         <div class="card border-dark ml-5 mr-5 my-3">
                          <div class="card-body" style="display:block; margin:auto;">
                            <p class="card-text center"><strong>Precio : $</strong>'.$pro['Precio'].' c/u</p>                            
                          </div>
                        </div>  
                        <div style="text-align:center">
                        <a href=productos.php>
                          <button type="submit" name="regresar" class="btn btn-dark my-3">Regresar</button> </a> 
                        </div>                                       
                        </div>
                                              
                      </div>
                    </div>';
          return $resulta;
          
        }
        function categoria($query)
        {
          $registros=$this->consulta($query);
          $res='';
          $columnas=mysqli_num_fields($registros);
          
          
          if(mysqli_num_rows($registros)>0)
          {      
            $res='<select id="IdCategoria" name="IdCategoria">';    
            while($pro=mysqli_fetch_assoc($registros))
            {
              $res.='<option value="'.$pro['IdCategoria'].'">'.$pro['Nombre'].'</option>';
            }
          }
            $res.='</select>';
            return $res;
          
        }
        function categoriaP($query)
        {
          $registros=$this->consulta($query);
          $res='';
          $columnas=mysqli_num_fields($registros);          
          if(mysqli_num_rows($registros)>0)
          {      
            $res.='<nav class="nav nav-pills flex-column flex-sm-row">'; 
            $res.='<a class="flex-sm-fill text-sm-center nav-link category_item" category="all" href="#" id="0"> Todas </a>';
            while($pro=mysqli_fetch_assoc($registros))
            {
              $res.='<a class="flex-sm-fill text-sm-center nav-link category_item" href="#" category="'.$pro['Nombre'].'" id="'.$pro['IdCategoria'].'">  '.$pro['Nombre'].'  </a>';
            }
          }
          $res.='</nav>';
            return $res;
          
        }
        function desplegarTabla($query,$iconos=array())
        {
          $result='';
          $registros=$this->consulta($query);          
          $columnas=mysqli_num_fields($registros);
          $countatabla=0;
          $result.='<table class="table table-hover">
                    <tr><thead>';
          for ($c=0; $c < $columnas; $c++)
          {
            $campo=mysqli_fetch_field_direct($registros,$c);
            if(isset($anchos[$countatabla])){
            }else{$anchos[$countatabla]="100";}
            $result.='<td>'.$campo->name.'</td>';
            $countatabla++;
          }
          if(count($iconos)){            
                $result.='<td colspan="'.count($iconos).'">';
          }
          $result.='</tr></thead>
                    <tbody>';
          for ($r=0; $r < $this->numeRegistros; $r++){ 
            $id=$r+1;
            $result.='<tr>';
            $campos=mysqli_fetch_array($registros);
            for ($c=0; $c < $columnas; $c++){ 
              $result.='<td>'.$campos[$c].'</td>';
            }
              if(in_array("update",$iconos)){
                $result.='<td>
                    <img src="../resources/update.png" onclick="add(\'formUpdate\','.$campos[0].')">
                </td>';
            }
            
            if(in_array("delete",$iconos))
            { 
                $result.='<td>
                <form method="post">
                    <input type="hidden" name="Id" value="'.$campos[0].'"/>
                    <input type="hidden" name="accion" value="delete"/>
                    <input type="image" src="../resources/delete.png"
                    onClick="return confirm(\'Estas seguro?\')">
                </form>
                </td>';
            }
            if(in_array("image",$iconos))
            { 
                $result.='<td>
                <form method="post" action="photo.php">
                    <input type="hidden" name="Id" value="'.$campos[0].'"/>
                    <input type="hidden" name="foto" value="'.$campos[4].'"/>
                    <input type="hidden" name="accion" value="image"/>
                    <input type="image" src="../resources/imagen.png">
                </form>
                </td>';
            }
            
          }
          $result.='</tr>';

          $result.='</tbody>';

          return $result;
        }
        

}
$oBD=new BaseDatos();
if(isset($_REQUEST['accion'])){
  $objeto=new BaseDatos();
  $objeto->accion($_REQUEST['accion']);
}
?>


