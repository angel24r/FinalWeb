<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="/final/CSS/new.css">
	<link rel="stylesheet" type="text/css" href="/final/CSS/newbootstrap.css">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
</style>
</head>
<body>

  <?php include "header.php" ?>
  <br><br>
<div class="container col-md-4" style="border: 2px solid; border-radius: 12px; padding: 25px 25px 25px 25px; border-color:#A8ACB1">
    <form method="post" action="validar.php">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="x">
        <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="y">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
    </div>
    <?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "<div style='color:red'>Usuario o contraseña invalido </div><br>";
       }
     ?>
    <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
<?php
session_start();
if(isset($_SESSION['error']) && $_SESSION['error']==1)
echo '<h1>'.$SESSION['error'].'</h1>';
?>
</body>
</html>