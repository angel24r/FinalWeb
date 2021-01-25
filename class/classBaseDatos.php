<?php
class BaseDatos
{
  var $conexion;
  function conecta()
  {
    $this->conexion=mysqli_connect("localhost","root","","tienda");
  }
  function cierraBD()
  {
    mysqli_close($this->conexion);
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
                        <div class="row text-center py-5">';      
            while($product=mysqli_fetch_assoc($registros))
            {
              $result.='<div class="col-sm-6 col-md-3 my-2 " style="border 1px; ">
                              <form method="POST" action="../cliente/detalleP.php?id='.$product['IdProducto'].'">
                                <div class="card shadow">
                                  <div>
                                    <img src="../imagenes/'.$product['IdProducto'].'.'.$product['Foto'].'" class="img-fluid card-img-top" style="width: 100%; height: 300px; object-fit: cover;">
                                  </div>
                                  <div class="card-body">
                                    <h4 class="card-title" name="nam" >'.$product['Nombre'].'</h4>
                                    <p>Precio: $'.$product['Precio'].' c/u</p>';
                     switch ($opcion) {
                       case 1:
                         $result.='<button type="submit" name="descrip" id="'.$product['IdProducto'].'" class="btn btn-dark my-3">Ver más</button>';
                         break;
                       
                       default:
                         $result.='<input class="text-center" type="number" value="0"/><br>
                                  <button type="submit" name="descrip" id="'.$product['IdProducto'].'" class="btn btn-dark my-3">Agregar</button>';
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
                          <button type="submit" name="regresar" style="" class="btn btn-dark my-3">Regresar</button> </a> 
                        </div>
                                       
                        </div>
                                              
                      </div>
                    </div>';
          return $resulta;
          
        }
}
$oBD=new BaseDatos();
?>