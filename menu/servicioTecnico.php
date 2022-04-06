<?php


include "../conexion-bd.php";
    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['diagnostico']) || empty($_POST['estado']) || empty($_POST['repuesto']) || empty($_POST['garantia']) || empty($_POST['fechare']) || empty($_POST['fechaen']) || empty($_POST['total']) )
    {
        $alert= '<p>Todos los campos son obligatorios.</p>';
    }else{

        include "../conexion-bd.php";

        $diagnostico = $_POST['diagnostico'];
        $estado = $_POST['estado'];
        $repuesto = $_POST['repuesto'];
        $garantia = $_POST['garantia'];
        $fechare = $_POST['fechare'];
        $fechaen = $_POST['fechaen'];
        $total = $_POST['total'];

        $query_insert= mysqli_query($conn,"INSERT INTO servicio_tecnico
        VALUES(NULL,'$diagnostico', '$estado', '$repuesto', '$garantia', '$fechare','$fechaen','$total','1')");

        if($query_insert){
          echo "<script> alert('Servicio registrado con exito.'); window.location= 'listaServicio.php'</script>";
        }else{
            $alert= '<p>Error al crear el servicio.</p>';
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
    <title>Servicio Tecnico</title>
</head>
<body>
<?php include "includes/menu.php" ?>;

  
<div class="container-sm text-center">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-8 pt-5">
                <div id="login-box" class="formulario colorformularios col-md-12 text-dark pt-4">
                <div class="logo-empresa">
            <img src="../Images/DPTECH_12.png" alt="logo empresa">
            </div>
            <h2>Servicio Tecnico</h2>
            <div class="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
    <center><form action="" class="box" method="post">
    <div class="cajaprin">

    <input class="w-75 h-75 form-control mb-3" type="text" name="diagnostico" placeholder="Diagnostico">

    <div class="cajamedio d-flex">
      <div class="caja1">

    <input class="w-50 form-control mb-3" type="text" name="estado" placeholder="Estado">
    
    <input class="w-50 form-control mb-3" type="text" name="repuesto" placeholder="Repuesto">
    
    <input class="w-50 form-control mb-3" type="text" name="garantia" placeholder="Garantia">
    
        
    
     </div>

    

     <div class="caja2">
     
     <div class="form-floating mb-3 w-50">
  <input type="date" class=" form-control" name="fechare" id="floatingInput">
  <label for="floatingInput">Fecha recibido</label>
</div>

<div class="form-floating mb-3 w-50">
  <input type="date" class=" form-control" name="fechaen" id="floatingInput">
  <label for="floatingInput">Fecha entrega</label>
</div>

<input class="w-50 form-control mb-3" type="text" name="total" placeholder="Total">

</div>
     </div>
     
       
    <input type="submit" class="btn btn-primary mb-4" value="Registrar" name="btningresar">
    

    </form></center>
    </div>
    </div>
    </div>
    </div>
           
        
</body>
      