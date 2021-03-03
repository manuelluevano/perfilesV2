<?php include_once 'includes/templates/header.php' ?>

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
          <table class="listado_perfiles">
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
              <tr>
                <td>Juan</td>
                <td>a@gmail.com</td>
                <td>235a456sd8654a</td>
                <td>21/02/2021</td>
                <td>https://www.facebook.com/joseadrian.gomez.5682</td>
                <td>3312685530</td>
                <td>https://www.facebook.com/adsafsa.gomez.5682</td>
                <td>Argentina</td>
                
                <td class="acciones">
                  <a href="editar-perfil.php" class="btn btn-editar">
                    <i class="fas fa-pen-square"></i>
                  </a>

                  <button data-id="1" class="btn-borrar btn" type="button">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>

          </table>
        </div>
      </div>
    </div>

<?php include_once 'includes/templates/footer.php' ?>