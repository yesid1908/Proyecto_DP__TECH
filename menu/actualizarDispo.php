<?php
    include "../conexion-bd.php";

    if(!empty($_POST))
    {
        
        if(empty($_POST['articulo']) || empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['serial']) || empty($_POST['posiblefallo']) || empty($_POST['notas']))
        {
            $alert = '<p>Todos los campos son obligatorios.</p>';
        }else{

            $id_dispo = $_POST['id'];
            $articulo = $_POST['articulo'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $serial = ($_POST['serial']);
            $posiblefallo = $_POST['posiblefallo'];
            $notas = $_POST['notas'];

            $query = mysqli_query($conn, "SELECT * FROM dispositivo WHERE (articulo = '$articulo' AND id_dispo = '$id_dispo') OR (modelo = '$modelo' AND id_dispo = '$id_dispo')");

            $result= mysqli_fetch_array($query);
            $result = count($result);

            $sql_update = mysqli_query($conn,"UPDATE dispositivo SET articulo = '$articulo', marca = '$marca', modelo = '$modelo', serial = '$serial', posiblefallo = '$posiblefallo', notas = '$notas' WHERE id_dispo = $id_dispo ");


            if($sql_update){
                echo "<script> alert('Dispositivo actualizado con exito.'); window.location= 'listaDisp.php'</script>";
            }else{
                echo "<script> alert('Error al actualizar dispositivo.'); window.location= 'actualizarDispo.php'</script>";
            }
        
        }
        mysqli_close($conn);
    }



//mostrar datos
if(empty($_REQUEST['id']))
{
    header('Location: listaDisp.php');
    mysqli_close($conn);
}
$id_dispo = $_REQUEST['id'];

$sql= mysqli_query($conn, "SELECT * FROM dispositivo WHERE id_dispo = $id_dispo ");
mysqli_close($conn);
$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
    header('Location: listaDisp.php');
}else{
    
    while ($data = mysqli_fetch_array($sql)) {

        $id_dispo= $data['id_dispo'];
        $articulo= $data['articulo'];
        $marca= $data['marca'];
        $modelo= $data['modelo'];
        $serial= $data['serial'];
        $posiblefallo= $data['posiblefallo'];
        $notas= $data['notas'];
        
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
    <title>Actualizar Dispositivo</title>
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
            <h2>Actualizar Dispositivo</h2>
            <div class="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
    <center><form action="" class="box" method="post">
    <div class="cajaprin d-flex">

      <div class="caja1">
      <input type="hidden" name="id" value="<?php echo $id_dispo; ?>">

    <input class="w-50 form-control mb-3" type="text" name="articulo" value="<?php echo $articulo; ?>">
        
    <input class="w-50 form-control mb-3" type="text" name="marca" value="<?php echo $marca; ?>">
    
      <input class="w-50 form-control mb-3" type="text" name="modelo" value="<?php echo $modelo; ?>">
    
     <input class="w-50 form-control mb-3" type="text" name="serial" value="<?php echo $serial; ?>">

     </div>

     <div class="caja2">
     
     <input class="w-75 form-control mb-3 h-25" type="text" name="posiblefallo" value="<?php echo $posiblefallo; ?>">

     <input class="w-75 form-control mb-3 h-25" type="text" name="notas" value="<?php echo $notas; ?>">
     </div>
  
     </div>
        <a href="../reporteDispositivo.php" class="btn btn-danger">Imprimir</a>
    <input type="submit" class="btn btn-primary mb-4" value="Registrar" name="btningresar">
    </form></center>
    </div>
    </div>
    </div>
    </div>
</body>
</html>