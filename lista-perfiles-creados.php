<?php include_once 'includes/templates/header.php' ?>



<?php
      
      try{
      
        require_once('includes/funciones/bd_conexion.php');

        $sql = " SELECT perfil_id, nombre_perfil, email, contrasena_perfil, fecha_creacion,
        link_perfil, numero, link_perfil_real, pais, nombre_usuario ";
        $sql .= " FROM crear_perfil ";
        $sql .= " INNER JOIN pais_perfiles ";
        $sql .= " ON crear_perfil.pais_id = pais_perfiles.paises_id ";
        $sql .= " INNER JOIN usuarios ";
        $sql .= " ON crear_perfil.admin_id = usuarios.usuario_id ";

        $resultado = $conn->query($sql);

      }catch(\Exception $e){
        echo $e->getMessage();
      }


    ?>

    <div class="datos_perfiles contenedor">
      <?php
        echo $sql;

        $users = array();?>

      <section class="lista-perfiles">

        <h2>Perfiles Creados</h2>

            <div class="datos">
            
              <?php  while($usuarios = $resultado->fetch_assoc() ) { ?>

              <table class="tabla_perfiles">
                  <thead>
                    <tr>
                      <th>Nombre: </th>
                      <th>Email: </th>
                      <th>Contraseña: </th>
                      <th>Fecha de creación: </th>
                      <th>Link facebook (nuevo): </th>
                      <th>Número Télefonico: </th>
                      <th>link facebook (real): </th>
                      <th>Admin: </th>
                    </tr>
                    
                  </thead>



              
                  <tr class="tr_datos">
                    <td> <?php echo $usuarios['nombre_perfil'] ?> </td>
                    <td> <?php echo $usuarios['email'] ?> </td>
                    <td> <?php echo $usuarios['contrasena_perfil'] ?> </td>
                    <td> <?php echo $usuarios['fecha_creacion'] ?> </td>
                    <td> <?php echo $usuarios['link_perfil'] ?> </td>
                    <td> <?php echo $usuarios['numero'] ?> </td>
                    <td> <?php echo $usuarios['link_perfil_real'] ?> </td>
                    <td> <?php echo $usuarios['pais'] ?> </td>
                    <td> <?php echo $usuarios['nombre_usuario'] ?> </td>

                    
                  </tr>

              </table>
            </div>

              <!-- <pre>
                  <?php  //var_dump($usuarios);  ?>
              </pre> 
             -->
            <?php } ?>

        </section>
    </div>




    <?php
      $conn->close();
    ?>


  <?php include_once 'includes/templates/ubicacion.php' ?>


    <?php include_once 'includes/templates/footer.php' ?>



