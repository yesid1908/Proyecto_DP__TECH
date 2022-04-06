<?php
    include "../conexion-bd.php";

    if(!empty($_POST))
    {
        $alert= '';
        if(empty($_POST['nombres']) || empty($_POST['apellidos']) || empty($_POST['documento']) || empty($_POST['telefono']) || empty($_POST['direccion']) || empty($_POST['correo']))
        {
            $alert = '<p>Todos los campos son obligatorios.</p>';
        }else{

            $idcliente = $_POST['id'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $documento = $_POST['documento'];
            $telefono = ($_POST['telefono']);
            $direccion = $_POST['direccion'];
            $correo = $_POST['correo'];

            $query = mysqli_query($conn, "SELECT * FROM cliente WHERE (nombres = '$nombres' AND id_cliente = '$idcliente') OR (documento = '$documento' AND id_cliente = '$idcliente')");

            $result= mysqli_fetch_array($query);
            $result = count($result);

            $sql_update = mysqli_query($conn,"UPDATE cliente SET nombres = '$nombres', apellidos = '$apellidos', documento = '$documento', telefono = '$telefono', direccion = '$direccion',correo = '$correo' WHERE id_cliente = $idcliente ");


            if($sql_update){
                echo "<script> alert('Cliente actualizado con exito.'); window.location= 'listaClientes.php'</script>";
            }else{
                echo "<script> alert('Error al actualizar cliente.'); window.location= 'actualizarCliente.php'</script>";
            }
        
        }
        mysqli_close($conn);
    }



//mostrar datos
if(empty($_REQUEST['id']))
{
    header('Location: listaClientes.php');
    mysqli_close($conn);
}
$idcliente = $_REQUEST['id'];

$sql= mysqli_query($conn, "SELECT * FROM cliente WHERE id_cliente = $idcliente ");
mysqli_close($conn);
$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
    header('Location: listaClientes.php');
}else{
    
    while ($data = mysqli_fetch_array($sql)) {

        $idcliente= $data['id_cliente'];
        $nombres= $data['nombres'];
        $apellidos= $data['apellidos'];
        $documento= $data['documento'];
        $telefono= $data['telefono'];
        $direccion= $data['direccion'];
        $correo= $data['correo'];
        
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
    <title>Actualizar Cliente</title>
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
            <h2>Actualizar Cliente</h2>
            <div class="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
    <center><form action="" class="box" method="post">
        <input type="hidden" name="id" value="<?php echo $idcliente; ?>">
      
        <input class="w-50 form-control" type="text" name="nombres" value="<?php echo $nombres; ?>">
        
    <input class="w-50 form-control mt-3" type="text" name="apellidos" value="<?php echo $apellidos; ?>">
    
      <input class="w-50 form-control mt-3" type="text" name="documento" value="<?php echo $documento; ?>">
    
     <input class="w-50 form-control mt-3" type="text" name="telefono" value="<?php echo $telefono; ?>">
     <input class="w-50 form-control mt-3" type="text" name="direccion" value="<?php echo $direccion; ?>">
     <input class="w-50 form-control mt-3" type="email" name="correo" value="<?php echo $correo; ?>"">
  
    
        
    <input type="submit" class="btn btn-primary mt-4 mb-4" value="Actualizar" name="btningresar">
    </form></center>
    </div>
    </div>
    </div>
    </div>

</body>
</html>