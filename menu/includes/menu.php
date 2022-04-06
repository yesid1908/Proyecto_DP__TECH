<?php 

session_start();
  if(empty($_SESSION['active']))
  {
    header('location: ../Index.php');
  }

include "scripts.php"; 


?>

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/estilos.css">
    <link rel="icon" href="../Images/logo_dp.png">
    <script type="text/javascript" src="js/funciones.js"></script>
    
    <title>Menu</title>
</head>
<body>



<div class="sidebar-nav">
  <nav class="navbar navbar-dark bg-secondary fixed-top">
    <div class="container">
      
      
    <!-- Menu mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Lista menu -->
      <div class="bg-light offcanvas offcanvas-start shadow" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-body bg-secondary">
        <img src="../Images/DPTECH_12.png" alt="" class="w-75">
          <ul class="navbar-nav">
            
            <a class="nav-link text-light" role="button" href="index.php"><i class="fa-solid fa-house"></i> Inicio</a>

            
            <?php if($_SESSION['rol'] == 1){ ?>
  <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" role="button" aria-expanded="false">Usuarios</a>
  <ul class="dropdown-menu bg-secondary">
  <li><a class="dropdown-item text-light" href="registroUsuario.php">Registro usuario</a></li>
  <li><a class="dropdown-item text-light" href="usuarios.php">Lista de usuarios</a></li>
  </ul>
  </li>
  <?php } ?>
  
            
            <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" role="button" aria-expanded="false">Clientes</a>
  <ul class="dropdown-menu bg-secondary">
  <li><a class="dropdown-item text-light" href="registroCliente.php">Registro cliente</a></li>
  <li><a class="dropdown-item text-light" href="listaClientes.php">Lista de cliente</a></li>
  </ul>
  </li>

  <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" role="button" aria-expanded="false">Dispositivos</a>
  <ul class="dropdown-menu bg-secondary">
  <li><a class="dropdown-item text-light" href="registroDispositivo.php">Registro dispositivo</a></li>
  <li><a class="dropdown-item text-light" href="listaDisp.php">Lista de dispositivo</a></li>
  </ul>
  </li>

  <?php
  if($_SESSION['rol'] != 2){
    ?>
  <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" role="button" aria-expanded="false">Servicio tecnico</a>
  <ul class="dropdown-menu bg-secondary">
  <li><a class="dropdown-item text-light" href="servicioTecnico.php">Registro servicio</a></li>
  <li><a class="dropdown-item text-light" href="listaServicio.php">Lista de servicios</a></li>
  </ul>
  </li>

  <?php } ?>

          </ul>
        </div>
      </div>


      <!-- Usuario -->
      <div class="btn-group">
        <a href="#" class="dropdown-toggle text-white text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="user text-light"><?php echo $_SESSION['usuario']. ' -' .$_SESSION['rol']; ?></span>
        </a>

        <ul class="bg-secondary dropdown-menu dropdown-menu-end">
          <li><a class="text-grey btn btn-secondary" href="salir.php">Salir</a></li>
        </ul>
      </div>

      
     
</div>


</nav>

</div>


</body>

</html>
