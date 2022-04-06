<?php
   

include "../conexion-bd.php";

    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['nombres']) || empty($_POST['apellidos']) || empty($_POST['usuario']) || empty($_POST['pass']) || empty($_POST['rol']) )
    {
        $alert= '<p>Todos los campos son obligatorios.</p>';
    }else{

        include "../conexion-bd.php";

        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];
        $rol = $_POST['rol'];
        

    

        $query_insert= mysqli_query($conn,"INSERT INTO usuario
        VALUES(NULL,'$nombres', '$apellidos', '$usuario', '$pass', '$rol')");

        if($query_insert){
            $alert= '<p>Usuario creado correctamente.</p>';
        }else{
            $alert= '<p>Error al crear el usuario.</p>';
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
    <link rel="icon" href="../Images/logo_dp.png">
    <link rel="stylesheet" href="../styles/estilos.css">
    <title>Registro Usuario</title>
</head>
<body>

<?php include "includes/menu.php" ?>;


<div class="container-sm text-center">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6 pt-5">
                <div id="login-box" class="formulario colorformularios col-md-12 text-dark pt-4">
                <div class="logo-empresa">
            <img src="../Images/DPTECH_12.png" alt="logo empresa" class="w-50">
            </div>
            <h2>Registro Usuario</h2>
            <div class="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
    <center><form action="" class="box" method="post">
      
        <input class="w-50 form-control" type="text" name="nombres" placeholder="Nombres">
        
    <input class="w-50 form-control mt-3" type="text" name="apellidos" placeholder="Apellidos">
    
      <input class="w-50 form-control mt-3" type="text" name="usuario" placeholder="Usuario">
    
     <input class="w-50 form-control mt-3" type="password" name="pass" placeholder="Pass">
    
    
    <label class="mt-3" for="rol">Tipo de usuario</label>

    <?php 

        $query_rol = mysqli_query($conn,"SELECT * FROM rol");
        mysqli_close($conn);
        $result_rol = mysqli_num_rows($query_rol);

    ?>

        <select name="rol" id="rol" class="w-50 form-select">
    <?php
        if($result_rol > 0)
        {
            while ($rol = mysqli_fetch_array($query_rol)) {
    ?>          
        <option value ="<?php echo $rol["idRol"]; ?>"><?php echo $rol["rol"] ?></option>
    <?php           



            }
        }
    ?>            
        </select>
    
        
    <input type="submit" class="btn btn-primary mt-4 mb-4" value="Registrar" name="btningresar">
    </form></center>
    </div>
    </div>
    </div>
    </div>





</body>
</html>