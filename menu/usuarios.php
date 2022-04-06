<?php

session_start();

  include "../conexion-bd.php";

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
    <title>Listado de usuario</title>
</head>
<body>
  
<?php include "includes/menu.php" ?>;

    
<section class="pt-5">
    <h1>Lista de usuarios</h1>



    <form action="buscadorUsuario.php" method="GET" class="d-flex justify-content-end pe-3">
    <input type="text" class="me-2 rounded" name="busqueda" id="busqueda" placeholder="Buscar">
    <input type="submit" value="Buscar" class="btn btn-primary">
    </form>



    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Usuario</th>
      <th scope="col">Rol</th>
      <th scope="col">Accion</th>
    </tr>

    <?php

        $sql_registe = mysqli_query($conn, "SELECT COUNT(*) as total_registro FROM usuario");
        $result_register = mysqli_fetch_array($sql_registe);
        $total_registro = $result_register['total_registro'];

        $por_pagina = 5;

        if(empty($_GET['pagina']))
        {
          $pagina = 1;
        }else{
          $pagina = $_GET['pagina'];
        }

        $desde = ($pagina-1) * $por_pagina;
        $total_paginas = ceil($total_registro / $por_pagina);
      
       $query = mysqli_query($conn,"SELECT u.id_usuario, u.nombres, u.apellidos, u.usuario, r.rol FROM usuario u INNER JOIN rol r ON u.rol= r.idRol ORDER BY u.id_usuario ASC LIMIT $desde, $por_pagina ");

       mysqli_close($conn);

       
      $result = mysqli_num_rows($query);
      if($result > 0)
      {
        while ($data = mysqli_fetch_array($query)){

    ?>

      <tr>
      <td><?php echo $data['id_usuario']; ?></td>
      <td><?php echo $data['nombres']; ?></td>
      <td><?php echo $data['apellidos']; ?></td>
      <td><?php echo $data['usuario']; ?></td>
      <td><?php echo $data['rol']; ?></td>
      <td>
          <a class="link-primary btn btn-primary btn-sm text-light" href="actualizarUsuario.php?id=<?php echo $data["id_usuario"]; ?>">Editar</a>

          <?php if($_SESSION["rol"] == 1){ ?>
         
            <a class="link-danger btn btn-danger btn-sm text-light" href="eliminarUsuario.php?id=<?php echo $data["id_usuario"]; ?>">Eliminar</a>
          <?php } ?>
      </td>
    </tr>
    <?php

        }
      }
    
    ?>
  </thead>
  <tbody>
    
    
  </tbody>
</table>


    </section>

    <div class="container">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="">|<</a></li>
    <li class="page-item"><a class="page-link" href=""><<</a></li>
    <?php
      for ($i=1; $i <= $total_paginas; $i++) {
          if($i == $pagina)
          {
            echo '<li class="paginaSeleccionada">'.$i.'</li>';
          }else
            echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
          }
      
    ?>


    <li class="page-item"><a  class="page-link" href="">>></a></li>
    <li class="page-item"><a class="page-link" href="">>|</a></li>

  </ul>
</div>

</body>
</html>