<?php
  
    include "../conexion-bd.php";
    

    if(!empty($_POST))
    {
        $id_ser = $_POST['id_servicioTecnico'];

        $query_delete = mysqli_query($conn, "DELETE FROM servicio_tecnico WHERE id_servicioTecnico = $id_ser ");
        mysqli_close($conn);

        if($query_delete){
            header("Location: listaServicio.php");
        }else{
            echo "Error al eliminar";
        }
    }








    if(empty($_REQUEST['id']))
    {
        header("Location: listaServicio.php");
        mysqli_close($conn);
    }else{
        
        $id_ser = $_REQUEST['id'];

        $query = mysqli_query($conn,"SELECT * FROM servicio_tecnico WHERE id_servicioTecnico = $id_ser");
        mysqli_close($conn);

        $result = mysqli_num_rows($query);

        if($result > 0) {
            while ($data = mysqli_fetch_array($query)) {

                $diagnostico = $data['diagnostico'];
                $repuesto = $data['repuesto'];
                $estado = $data['estado'];
               
        }
    }else{
                header("Location: listaServicio.php");
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
    <title>Eliminar Cliente</title>
</head>
<body>
<?php include "includes/menu.php" ?>;


<section>
        <div class="text-center">
            <h4 class="text-light">¿Esta seguro de eliminar el siguiente registro?</h4>
            <p>Diagnostico: <span><?php echo $diagnostico; ?></span></p>
            <p>Repuesto: <span><?php echo $repuesto; ?></span></p>
            <p>Estado: <span><?php echo $estado; ?></span></p>
            

            <form method="post" action="">
                <input type="hidden" name="id_ser" value="<?php echo $id_ser; ?>">
                <a href="listaServicio.php" class="btn btn-danger">Cancelar</a>
                <input type="submit"value="Eliminar" class="btn btn-primary" >
            </form>
        </div>
</section>



</body>
</html>