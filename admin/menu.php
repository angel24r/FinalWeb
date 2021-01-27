<?php 
 
if(!isset($_SESSION['nombre']))
    header("location: ../index.php");
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="width: 100%;">
  <a class="navbar-brand"  href="#">
   <img src="../resources/logo.png" style="width: 10vh;" >
    Manualidades Martha
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor0" >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="productos.php">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cotizar.php">Usuarios</a>
      </li>       
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Salir</a>       
      </li>      
    </ul>
  </div>
  <a href="perfil.php">
  <span class="badge badge-pill badge-secondary" style="font-size: 1.5em width"><img width="40" style="border-radius: 20px;" height="40" class="minifoto" src="../Fotos/<?php echo $_SESSION['foto']; ?>"/><?php echo "     ".$_SESSION['nombre']; ?></span>
  </a>
</nav>