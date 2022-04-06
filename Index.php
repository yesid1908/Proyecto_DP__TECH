<?php

  $alert= '';

  session_start();
  if(!empty($_SESSION['active']))
  {
    header('location: menu/index.php');
  }else{

  if(!empty($_POST))
  {
    if(empty($_POST['usuario']) || empty($_POST['pass']))
    {
      $alert = 'Ingrese su usuario y su pass';
    }else{
      require_once "conexion-bd.php";

    $usuario= $_POST['usuario'];
    $pass= $_POST['pass'];

    $query= mysqli_query($conn,"SELECT * FROM usuario WHERE usuario = '$usuario' AND pass = '$pass'");
    mysqli_close($conn);
    $result= mysqli_num_rows($query);

    if($result > 0)
    {
      $data= mysqli_fetch_array($query);

      $_SESSION['active']= true;
      $_SESSION['id_usuario'] = $data['id_usuario'];
      $_SESSION['nombres'] = $data['nombres'];
      $_SESSION['apellidos'] = $data['apellidos'];
      $_SESSION['usuario'] = $data['usuario'];
      $_SESSION['pass'] = $data['pass'];
      $_SESSION['rol'] = $data['rol'];

      header('location: menu/index.php');
    }else{
      $alert= 'El usuario o pass son incorrectos';
      session_destroy();
    }
    }
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="icon" href="Images/logo_dp.png">
    <link rel="stylesheet" href="styles/estilos.css">
    <link rel="stylesheet" href="Images/DPTECH_12.ico">
    <title>Ingreso de usuario</title>
</head>
<body>
   
    <div class="container-sm cajaform text-center">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6 pt-5">
            <div id="login-box" class="colorformularios formulario bg-secondary.bg-gradient col-md-12 text-dark pt-4">

             <!-- Formulario login -->
    <center><form action="" class="box" method="POST">
        <div class="logo-empresa">
            <img src="Images/DPTECH_12.png" alt="logo empresa">
        </div>
        <div class="form-group mt-4">
        <input class="usuario w-50 form-control" type="text" name="usuario" id="usuario" placeholder="Usuario">
        
    </div>
    
    <div class="form-group mt-4">
        <input class="pass w-50 form-control" type="password" name="pass" id="password" placeholder="Pass">
        
    </div>
    <div class="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
    <div class="form-group mt-4">
       <button type="submit" class="btn btn-primary" name="btningresar" >
            Ingresar</button> 
        
        <h4 class="version mb-5 pb-2">version 1.0</h4>
        </div>
        </div>
        </div>
        </div>

        </form></center>

</div>

</body>
</html>


