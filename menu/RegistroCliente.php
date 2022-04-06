<?php
   

include "../conexion-bd.php";
    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['nombres']) || empty($_POST['apellidos']) || empty($_POST['documento']) || empty($_POST['telefono']) || empty($_POST['direccion']) || empty($_POST['correo']) )
    {
        $alert= '<p>Todos los campos son obligatorios.</p>';
    }else{

        include "../conexion-bd.php";

        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $documento = $_POST['documento'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $correo = $_POST['correo'];

      
      
        
        $query_insert= mysqli_query($conn,"INSERT INTO cliente
        VALUES(NULL,'$nombres', '$apellidos', '$documento', '$telefono', '$direccion','$correo','1')");

        if($query_insert){
          echo "<script> alert('Cliente registrado con exito: $nombres'); window.location= 'listaClientes.php'</script>";
        }else{
            $alert= '<p>Error al crear el cliente.</p>';
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
    <title>Registro Clientes</title>
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
            <h2>Registro Cliente</h2>
            <div class="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
    <center><form action="" class="box" method="post">
      
        <input class="w-50 form-control" type="text" name="nombres" placeholder="Nombres">
        
    <input class="w-50 form-control mt-3" type="text" name="apellidos" placeholder="Apellidos">
    
      <input class="w-50 form-control mt-3" type="text" name="documento" placeholder="Documento">
    
     <input class="w-50 form-control mt-3" type="text" name="telefono" placeholder="Telefono">
     <input class="w-50 form-control mt-3" type="text" name="direccion" placeholder="Direccion">
     <input class="w-50 form-control mt-3" type="email" name="correo" placeholder="Correo">
  
    
        
    <input type="submit" class="btn btn-primary mt-4 mb-4" value="Registrar" name="btningresar">
    </form></center>
    </div>
    </div>
    </div>
    </div>

 
</body>
</html>