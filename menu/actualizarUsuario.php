<?php
    include "../conexion-bd.php";

    if(!empty($_POST))
    {
        $alert= '';
        if(empty($_POST['nombres']) || empty($_POST['apellidos']) || empty($_POST['usuario']) || empty($_POST['rol']))
        {
            $alert = '<p>Todos los campos son obligatorios.</p>';
        }else{

            $idUsuario = $_POST['idUsuario'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $usuario = $_POST['usuario'];
            $pass = md5($_POST['pass']);
            $rol = $_POST['rol'];


            $query = mysqli_query($conn, "SELECT * FROM usuario WHERE (nombres = '$nombres' AND id_usuario = '$idUsuario') OR (usuario = '$usuario' AND id_usuario = '$idUsuario')");

            $result= mysqli_fetch_array($query);
            $result = count($result);

            if(empty($_POST['pass']))
            {
                $sql_update = mysqli_query($conn,"UPDATE usuario SET nombres = '$nombres', apellidos = '$apellidos', usuario = '$usuario', rol = '$rol' WHERE id_usuario = $idUsuario ");
            }else{
                $sql_update = mysqli_query($conn,"UPDATE usuario SET nombres = '$nombres', apellidos = '$apellidos', usuario = '$usuario', pass = '$pass', rol = '$rol' WHERE id_usuario = $idUsuario ");
            }

            if($sql_update){
                echo "<script> alert('Cliente actualizado con exito.'); window.location= 'usuarios.php'</script>";
            }else{
                echo "<script> alert('Error al actualizar cliente.'); window.location= 'actualizarUsuario.php'</script>";;
            }
        
        }
        mysqli_close($conn);
    }
    


//mostrar datos
if(empty($_REQUEST['id']))
{
    header('Location: usuarios.php');
    mysqli_close($conn);
}
$iduser = $_REQUEST['id'];

$sql= mysqli_query($conn, "SELECT u.id_usuario, u.nombres, u.apellidos, u.usuario, (u.rol) AS idRol, (r.rol) AS rol
                           FROM usuario u
                           INNER JOIN rol r
                           ON u.rol = r.idRol
                           WHERE id_usuario = $iduser ");
mysqli_close($conn);

$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
    header('Location: usuarios.php');
}else{
    $option = '';
    while ($data = mysqli_fetch_array($sql)) {

        $iduser= $data['id_usuario'];
        $nombres= $data['nombres'];
        $apellidos= $data['apellidos'];
        $usuario= $data['usuario'];
        $idrol= $data['idRol'];
        $rol= $data['rol'];

        if($idrol == 1){
            $option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
        }else if($idrol == 2){
            $option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
        }else if($idrol == 3){
            $option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
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
    <title>Actualizar Usuario</title>
</head>
<body>
<?php include "includes/menu.php" ?>;


<div class="container-sm text-center">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6 pt-5">
                <div id="login-box" class="formulario colorformularios col-md-12 text-dark pt-4">
                <div class="logo-empresa">
            <img src="../Images/DPTECH_12.png" alt="logo empresa">
        </div>
        <h3>Actualizar Usuario</h3>
        <div class="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
    <center><form action="" class="box " method="post">
        
 <input type="hidden" name="idUsuario" value="<?php echo $iduser; ?>">
        
<input class="w-50 form-control" type="text" name="nombres" placeholder="Nombres" value="<?php echo $nombres; ?>">
       
 <input class="w-50 form-control mt-3" type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $apellidos; ?>">
     
 <input class="w-50 form-control mt-3" type="text" name="usuario" placeholder="Usuario" value="<?php echo $usuario; ?>">
    
<input class="w-50 form-control mt-3" type="password" name="pass" placeholder="Pass">
       
    
    <label for="rol">Tipo de usuario</label>

    <?php 
        include "../conexion-bd.php";
        $query_rol = mysqli_query($conn,"SELECT * FROM rol");
        mysqli_close($conn);
        $result_rol = mysqli_num_rows($query_rol);

    ?>

        <select name="rol" id="cargo" class="w-50 form-select">
    <?php
    echo $option;
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
    
        
    <input type="submit" class="btn btn-primary mt-4 mb-4" name="btningresar" value="Actualizar registro"> 
    </form></center>
    </div>
    </div>
    </div>
    </div>

</body>
</html>