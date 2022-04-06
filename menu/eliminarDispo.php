<?php
   
    include "../conexion-bd.php";
    

    if(!empty($_POST))
    {
        $id_dispo = $_POST['id_dispo'];

        $query_delete = mysqli_query($conn, "DELETE FROM dispositivo WHERE id_dispo = $id_dispo ");
        mysqli_close($conn);

        if($query_delete){
            header("Location: listaDisp.php");
        }else{
            echo "Error al eliminar";
        }
    }








    if(empty($_REQUEST['id']))
    {
        header("Location: listaDisp.php");
        mysqli_close($conn);
    }else{
        
        $id_dispo = $_REQUEST['id'];

        $query = mysqli_query($conn,"SELECT * FROM dispositivo WHERE id_dispo = $id_dispo");
        mysqli_close($conn);

        $result = mysqli_num_rows($query);

        if($result > 0) {
            while ($data = mysqli_fetch_array($query)) {

                $articulo = $data['articulo'];
                $marca = $data['marca'];
                $modelo = $data['modelo'];
                $serial = $data['serial'];
        }
    }else{
                header("Location: listaDisp.php");
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
            <p>Articulo: <span><?php echo $articulo; ?></span></p>
            <p>Marca: <span><?php echo $marca; ?></span></p>
            <p>Modelo: <span><?php echo $modelo; ?></span></p>
            <p>Serial: <span><?php echo $serial; ?></span></p>

            <form method="post" action="">
                <input type="hidden" name="id_dispo" value="<?php echo $id_dispo; ?>">
                <a href="listaDisp.php" class="btn btn-danger">Cancelar</a>
                <input type="submit"value="Eliminar" class="btn btn-primary" >
            </form>
        </div>
</section>



</body>
</html>