<?php 
      // Agregamos las funciones para obtener los perfiles creados de la base de datos y el header (diseño)
      include_once 'includes/funciones/funciones.php'; 
      include_once 'includes/templates/header.php';

?>

  <main class=" bg-rojo">

    <h3>Datos perfil nuevo</h3>
    
    <form action="#" class="bg-amarillo form sombra" id="contacto">
    

      <legend>Añadir un perfil <span>Todos los campos son obligatorios</span> </legend>
      <?php include_once 'includes/templates/formulario.php' ?>
             
    </form>
      
      <div id="error" class="error"> 
  </main>

    <div class="bg-blanco sombra form contenedor">
      <div class="contenedor-contactos">
        <h2>Contactos</h2>

            <input type="text" id="buscar" class="buscador sombra" placeholder="Buscar contactos">

            <p class="total_perfiles">Total perfiles  <span>2</span></p>        

        <div class="contenedor-tabla">
          <table id="listado_perfiles">
            <thead>
              <tr>
                <th>Nombre: </th>
                <th>email: </th>
                <th>contraseña: </th>
                <th>Fecha de creacion: </th>
                <th>Link nuevo perfil: </th>
                <th>Número teléfonico: </th>
                <th>Link perfil real: </th>
                <th>país: </th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody class="datos_perfiles">
                  <?php 
                  // mandamos llamar la funcion para traer los perfiles de la base de datos
                      $contactos = obetenerContactosDesdeDB();
                      // Ver información de la base de datos ->num_rows['']:  
                        // var_dump($contactos);


                          // SI EXISTEN VALORES QUE SE EJECUTE, SI NO, NO REALICE NADA.
                          if($contactos->num_rows){ 
                            
                              // Creamos un bucle para recorrer el array de la base de datos e imprimir todos los
                                  //registros

                                  foreach($contactos as $contacto){?>  

                                      <tr>
                                        <!-- PARA VER EL NOMBRE DE LOS CAMPOS Y ASÍ HACER LA PETICIÓN-->
                                        <!-- <pre>
                                          <?php //var_dump($contacto); ?>
                                        </pre> 
                                        <!-- CIERRE PARA VER NOMBRES DE LOS CAMPOS -->

                                        <td><?php echo $contacto['nombre']; ?></td>
                                        <td><?php echo $contacto['email']; ?></td>
                                        <td><?php echo $contacto['contrasena']; ?></td>
                                        <td><?php echo $contacto['fecha']; ?></td>
                                        <td><?php echo $contacto['link_perfil']; ?></td>
                                        <td><?php echo $contacto['telefono']; ?></td>
                                        <td><?php echo $contacto['link_perfil_real']; ?></td>
                                        <td><?php echo $contacto['pais']; ?></td>
                                        
                                        <td class="acciones">
                                          <a href="editar-perfil.php?id=<?php echo $contacto['perfil_id']; ?>" class="btn btn-editar">
                                            <i class="fas fa-pen-square"></i>
                                          </a>

                                          <button data-id="<?php echo $contacto['perfil_id']; ?>" class="btn-borrar btn" type="button">
                                            <i class="fas fa-trash"></i>
                                          </button>
                                        </td>
                                      </tr>

                                <?php } //<!-- CIERRE BUCLE -->
                           } ?>       <!-- CIERRE CONDICIONAL IF -->
            </tbody>

          </table>
        </div>
      </div>
    </div>

<?php include_once 'includes/templates/footer.php' ?>