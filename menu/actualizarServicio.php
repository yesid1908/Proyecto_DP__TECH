<?php
    include "../conexion-bd.php";

    if(!empty($_POST))
    {
        
        if(empty($_POST['diagnostico']) || empty($_POST['estado']) || empty($_POST['repuesto']) || empty($_POST['garantia']) || empty($_POST['fechare']) || empty($_POST['fechaen']) || empty($_POST['total']))
        {
            $alert = '<p>Todos los campos son obligatorios.</p>';
        }else{

            $id_ser = $_POST['id'];
            $diagnostico = $_POST['diagnostico'];
            $estado = $_POST['estado'];
            $repuesto = $_POST['repuesto'];
            $garantia = $_POST['garantia'];
            $fechare = ($_POST['fechare']);
            $fechaen = $_POST['fechaen'];
            $total = $_POST['total'];

            $query = mysqli_query($conn, "SELECT * FROM servicio_tecnico WHERE (diagnostico = '$diagnostico' AND id_servicioTecnico = '$id_ser') OR (repuesto = '$repuesto' AND id_servicioTecnico = '$id_ser')");

            $result= mysqli_fetch_array($query);
            $result = count($result);

            $sql_update = mysqli_query($conn,"UPDATE servicio_tecnico SET diagnostico = '$diagnostico', estado = '$estado', repuesto = '$repuesto', garantia = '$garantia', fechare = '$fechare', fechaen = '$fechaen', total = '$total' WHERE id_servicioTecnico = $id_ser ");


            if($sql_update){
                echo "<script> alert('Servicio actualizado con exito.'); window.location= 'listaServicio.php'</script>";
            }else{
                echo "<script> alert('Error al actualizar servicio.'); window.location= 'actualizarServicio.php'</script>";
            }
        
        }
        mysqli_close($conn);
    }



//mostrar datos
if(empty($_REQUEST['id']))
{
    header('Location: listaServicio.php');
    mysqli_close($conn);
}
$id_ser = $_REQUEST['id'];

$sql= mysqli_query($conn, "SELECT * FROM servicio_tecnico WHERE id_servicioTecnico = $id_ser ");
mysqli_close($conn);
$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
    header('Location: listaServicio.php');
}else{
    
    while ($data = mysqli_fetch_array($sql)) {

        $id_ser= $data['id_servicioTecnico'];
        $diagnostico= $data['diagnostico'];
        $estado= $data['estado'];
        $repuesto= $data['repuesto'];
        $garantia= $data['garantia'];
        $fechare= $data['fechare'];
        $fechaen= $data['fechaen'];
        $total= $data['total'];
        
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
    <title>Actualizar Servicio</title>
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
            <h2>Actualizar Tecnico</h2>
            <div class="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
    <center><form action="" class="box" method="post">
    <div class="cajaprin">
    <input type="hidden" name="id" value="<?php echo $id_ser; ?>">

    <input class="w-75 h-75 form-control mb-3" type="text" name="diagnostico" value="<?php echo $diagnostico; ?>">

    <div class="cajamedio d-flex">
      <div class="caja1">

    <input class="w-50 form-control mb-3" type="text" name="estado" value="<?php echo $estado; ?>">
    
    <input class="w-50 form-control mb-3" type="text" name="repuesto" value="<?php echo $repuesto; ?>">
    
    <input class="w-50 form-control mb-3" type="text" name="garantia" value="<?php echo $garantia; ?>">
    
        
    
     </div>

    

     <div class="caja2">
     
     <div class="form-floating mb-3 w-50">
  <input type="date" class=" form-control" name="fechare" id="floatingInput" value="<?php echo $fechare; ?>">
  <label for="floatingInput">Fecha recibido</label>
</div>

<div class="form-floating mb-3 w-50">
  <input type="date" class=" form-control" name="fechaen" id="floatingInput" value="<?php echo $fechaen; ?>">
  <label for="floatingInput">Fecha entrega</label>
</div>

<input class="w-50 form-control mb-3" type="text" name="total" value="<?php echo $total; ?>"">

</div>
     </div>
     
        <a href="../reporteDispositivo.php" class="btn btn-danger">Imprimir</a>
    <input type="submit" class="btn btn-primary mb-4" value="Actualizar" name="btningresar">
    

    </form></center>
    </div>
    </div>
    </div>
    </div>

</body>
</html>