<?php



    
include "../conexion-bd.php";
    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['articulo']) || empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['serial']) || empty($_POST['posiblefallo']) || empty($_POST['notas']) )
    {
        $alert= '<p>Todos los campos son obligatorios.</p>';
    }else{

        include "../conexion-bd.php";

        $articulo = $_POST['articulo'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $serial = $_POST['serial'];
        $posiblefallo = $_POST['posiblefallo'];
        $notas = $_POST['notas'];
 
        $query_insert= mysqli_query($conn,"INSERT INTO dispositivo
        VALUES(NULL,'$articulo', '$marca', '$modelo', '$serial', '$posiblefallo','$notas','1')");

        if($query_insert){
          echo "<script> alert('Cliente registrado con exito: $articulo'); window.location= 'listaDisp.php'</script>";
        }else{
            $alert= '<p>Error al crear el dispositivo.</p>';
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
    <title>Registro de dispositivo</title>
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
            <h2>Registro Dispositivo</h2>
            <div class="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
    <center><form action="" class="box" method="post">
    <div class="cajaprin d-flex">

      <div class="caja1">

    <input class="w-50 form-control mb-3" type="text" name="articulo" placeholder="Articulo">
        
    <input class="w-50 form-control mb-3" type="text" name="marca" placeholder="Marca">
    
      <input class="w-50 form-control mb-3" type="text" name="modelo" placeholder="Modelo">
    
     <input class="w-50 form-control mb-3" type="text" name="serial" placeholder="Serial">

     </div>

     <div class="caja2">
     
     <input class="w-75 form-control mb-3 h-25" type="text" name="posiblefallo" placeholder="Posible fallo">

     <input class="w-75 form-control mb-3 h-25" type="text" name="notas" placeholder="Notas">
     </div>
  
     </div>
        
    <input type="submit" class="btn btn-primary mb-4" value="Registrar" name="btningresar">
    </form></center>
    </div>
    </div>
    </div>
    </div>
           
    

        
</body>
      