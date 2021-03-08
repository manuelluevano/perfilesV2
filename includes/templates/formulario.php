
      <div class="campos">
      
            <div class="campo">
              <label for="nombre">Ingresa el nombre del perfil</label>
                <input 
                      type="text" 
                      id="nombre" 
                      placeholder="Nombre de perfil" 
                      name="nombre"
                      value="<?php //Vamos a crear un condicional ternario para rellenar si se va editar o dejar en blanco
                            // si se va a crear usuarion -> de esa forma reutilizamos el formulario
                                  // $contacto -> fetch_assoc() de pagina de editar_perifil
                            echo ($contacto['nombre']) ? $contacto['nombre'] : '';
                      ?>"
                >
            </div>

            <div class="campo">
              <label for="email">Ingresa el email</label>
              <input type="email" placeholder="Correo electronico" id="email" name="email"
                    value="<?php //Vamos a crear un condicional ternario para rellenar si se va editar o dejar en blanco
                            // si se va a crear usuarion -> de esa forma reutilizamos el formulario
                                  // $contacto -> fetch_assoc() de pagina de editar_perifil
                            echo ($contacto['email']) ? $contacto['email'] : '';
                      ?>"
              >
            </div>

            <div class="campo">
              <label for="pass">Ingresa la contraseña</label>
              <input type="text" name="" id="pass"  name="pass"
                    value="<?php //Vamos a crear un condicional ternario para rellenar si se va editar o dejar en blanco
                            // si se va a crear usuarion -> de esa forma reutilizamos el formulario
                                  // $contacto -> fetch_assoc() de pagina de editar_perifil
                            echo ($contacto['contrasena']) ? $contacto['contrasena'] : '';
                      ?>"       
              >
            </div>

            <div class="campo">
              <label for="date">Ingresa la fecha de creación</label>

              <input type="date" id="date" name="trip-start" value="<?php //Vamos a crear un condicional ternario para rellenar si se va editar o dejar en blanco
                            // si se va a crear usuarion -> de esa forma reutilizamos el formulario
                                  // $contacto -> fetch_assoc() de pagina de editar_perifil
                            echo ($contacto['fecha']) ? $contacto['fecha'] : '01-01-2020';
                      ?>" 
                min="01-01-2020" max="2022-12-30" id="fecha" name="date">
        
            </div>

            <div class="campo">
              <label for="link">Link del perfil nuevo</label>
              <input type="text" placeholder="Link del perfil" id="link-perfil" name="link"
              value="<?php //Vamos a crear un condicional ternario para rellenar si se va editar o dejar en blanco
                            // si se va a crear usuarion -> de esa forma reutilizamos el formulario
                                  // $contacto -> fetch_assoc() de pagina de editar_perifil
                            echo ($contacto['link_perfil']) ? $contacto['link_perfil'] : '';
                      ?>" 
              >
            </div>

            <div class="campo">
              <label for="numero">Número teléfonico</label>
              <input type="text" placeholder="Número" id="telefono" name="numero"
              value="<?php //Vamos a crear un condicional ternario para rellenar si se va editar o dejar en blanco
                            // si se va a crear usuarion -> de esa forma reutilizamos el formulario
                                  // $contacto -> fetch_assoc() de pagina de editar_perifil
                            echo ($contacto['telefono']) ? $contacto['telefono'] : '';
                      ?>" 
              >
            </div>
          </div>

              <h3>Datos perfil real</h3>

            <div class="campos2">
            
                  <div class="campo">
                    <label for="link">Link perfil real</label>
                    <input type="text" placeholder="Link del perfil" id="link-perfil-real" name="link_real"
                    value="<?php //Vamos a crear un condicional ternario para rellenar si se va editar o dejar en blanco
                            // si se va a crear usuarion -> de esa forma reutilizamos el formulario
                                  // $contacto -> fetch_assoc() de pagina de editar_perifil
                            echo ($contacto['link_perfil_real']) ? $contacto['link_perfil_real'] : '';
                      ?>" 
                    >
                  </div>

                  <div class="campo">
                    <label for="pais">Selecciona el país:</label>
                    <select id="pais" name="pais">
                      <option value="1">Argentina</option>
                      <option value="2">Bolivia</option>
                      <option value="3">Brasil</option>
                      <option value="4">Chile</option>
                      <option value="5">Colombia</option>
                      <option value="6">Costa Rica</option>
                      <option value="7">Cuba</option>
                      <option value="8">Ecuador</option>
                      <option value="9">El Salvador</option>
                      <option value="10">Guatemala</option>
                      <option value="11">Honduras</option>
                      <option value="12">México</option>
                      <option value="13">Panamá</option>
                      <option value="14">Perú</option>
                      <option value="15">Uruguay</option>
                      <option value="16">Venezuela</option>
                    </select>
                  </div>  
                  <div class="campo enviar">
                    <?php 
                      // Camos a darle funcion inteligente al boton
                      $textoBtn = ($contacto['nombre']) ? 'Guardar' : 'Añadir';

                      // Funcion para crear o editar registro
                      $accion = ($contacto['telefono']) ? 'editar' : 'crear';
                      ?>

                    <input type="hidden" id="accion" value="<?php echo $accion; ?>" >
                      <!-- TRAER EL ID PARA EDITAR LOS CAMPOS-->

                    <?php if(isset($contacto['perfil_id']) ) { ?>
                      <input type="hidden" id="id" value="<?php echo $contacto['perfil_id']; ?>">
                    <?php } ?>


                    <input type="submit" value="<?php echo $textoBtn; ?>" >
                  </div>
              </div> 
              <!-- Crear array para almacenar los valor de los inputs  -->
              
              
          
         



  
    
    
    
    
    <!--    -->