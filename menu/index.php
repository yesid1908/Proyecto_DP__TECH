<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="icon" href="../Images/logo_dp.png">
    <link rel="stylesheet" href="../styles/estilos.css">
    <script type="text/javascript" src="js/funciones.js"></script>
    <title>Menu</title>
</head>
<body>

<?php include "includes/menu.php"; ?>


 <!-- Menu dependecias -->
<section class="main col pt-5">
  <div class="row justify-content-center align-content-center text-center mt-5">
      <div class="columna col-lg-8 col-md-12 col-sm-12">
        <div class="row row-col-1 row-col-md-3 g-4">

         <!-- Boton menu principal -->
        <div class="card bg-secondary" style="width: 11rem;">
  <img src="../Images/casa.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Menu Principal</h5>
    <a href="index.php" class="btn btn-primary">Ir</a>
  </div>
</div>

 <!-- Boton usuarios -->
 <?php if($_SESSION['rol'] == 1){ ?>
<div class="card bg-secondary" style="width: 11rem;">
  <img src="../Images/user.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Usuarios</h5>
    <p class="card-text">Administracion de usuarios.</p>
    <a href="registroUsuario.php" class="btn btn-primary">Ir</a>
  </div>
</div>
<?php } ?>

 <!-- Boton clientes -->
<div class="card bg-secondary" style="width: 11rem;">
  <img src="../Images/users.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Clientes</h5>
    <p class="card-text">Administracion de clientes.</p>
    <a href="RegistroCliente.php" class="btn btn-primary">Ir</a>
  </div>
</div>

 <!-- Boton dispositivos -->
<div class="card bg-secondary" style="width: 11rem;">
  <img src="../Images/devices.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Dispositivos</h5>
    <p class="card-text">Administracion de dispositivos.</p>
    <a href="RegistroDispositivo.php" class="btn btn-primary">Ir</a>
  </div>
</div>


 <!-- Boton servicio tecnico -->
 <?php
  if($_SESSION['rol'] != 2){
    ?>
<div class="card bg-secondary" style="width: 11rem;">
  <img src="../Images/repair.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Servicio Tecnico</h5>
    <p class="card-text">Administracion servicios.</p>
    <a href="servicioTecnico.php" class="btn btn-primary">Ir</a>
  </div>
</div> 
<?php } ?>

</section>    
     
</body>
</html>