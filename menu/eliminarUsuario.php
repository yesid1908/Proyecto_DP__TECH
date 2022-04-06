<?php
    include "../conexion-bd.php";

    if(!empty($_POST))
    {
        $idusuario = $_POST['idusuario'];

        $query_delete = mysqli_query($conn, "DELETE FROM usuario WHERE id_usuario = $idusuario ");
        mysqli_close($conn);

        if($query_delete){
            header("Location: usuarios.php");
        }else{
            echo "Error al eliminar";
        }
    }








    if(empty($_REQUEST['id']))
    {
        header("Location: usuarios.php");
        mysqli_close($conn);
    }else{
        

        $idusuario = $_REQUEST['id'];

        $query = mysqli_query($conn,"SELECT u.nombres, u.usuario, r.rol
                                     FROM usuario u
                                     INNER JOIN
                                     rol r
                                     ON u.rol = r.idRol
                                     WHERE u.id_usuario = $idusuario ");
        mysqli_close($conn);

        $result = mysqli_num_rows($query);

        if($result > 0) {
            while ($data = mysqli_fetch_array($query)) {

                $nombres = $data['nombres'];
                $usuario = $data['usuario'];
                $rol = $data['rol'];
        }
    }else{
                header("Location: usuarios.php");
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
    <title>Eliminar usuario</title>
</head>
<body>
<?php include "includes/menu.php" ?>;


<section class="pt-5">
        <div class="text-center">
            <h4 class="text-light">¿Esta seguro de eliminar el siguiente registro?</h4>
            <p>Nombre: <span><?php echo $nombres; ?></span></p>
            <p>Usuario: <span><?php echo $usuario; ?></span></p>
            <p>Tipo de usuario: <span><?php echo $rol; ?></span></p>

            <form method="post" action="">
                <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
                <a href="usuarios.php" class="btn btn-danger">Cancelar</a>
                <input type="submit"value="Aceptar" class="btn btn-primary" >
            </form>
        </div>
</section>



</body>
</html>