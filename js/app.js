const formularioContactos = document.querySelector('#contacto'),
      listadoPerfiles = document.querySelector('#listado_perfiles tbody');


eventListeners();

function eventListeners() {

        // Cuando el formulario de crear o editar se ejecuta
        formularioContactos.addEventListener('submit', leerFormulario);
    
     // Si existe o el programa pide la funcion ejecutar, si no no
     if(listadoPerfiles){
         //Listener para elminar al precionar el boton
         listadoPerfiles.addEventListener('click', eliminarFormulario);
     }

}

function leerFormulario(e) {
     e.preventDefault();

     // Leer los datos de los inputs
     const nombre = document.querySelector('#nombre').value,
           email = document.querySelector('#email').value,
           accion = document.querySelector('#accion').value,
           pass = document.querySelector('#pass').value,
           date = document.querySelector('#date').value,
           link_perfil = document.querySelector('#link-perfil').value,
           telefono = document.querySelector('#telefono').value,
           link_perfil_real = document.querySelector('#link-perfil-real').value,
           pais = document.querySelector('#pais').value;

     if(nombre === '' || email  === '' || pass === '' || date === '' || link_perfil === '' || telefono === '' ||
     link_perfil_real === '' || pais === '') {
          // 2 parametros: texto y clase
          mostrarNotificaciones('Todos los Campos son Obligatorios', 'error');
     } else {
          // Pasa la validación, crear llamado a Ajax
          const infoContacto = new FormData();
                infoContacto.append('nombre', nombre);
                infoContacto.append('email', email);
                infoContacto.append('pass', pass);
                infoContacto.append('date', date);
                infoContacto.append('link_perfil', link_perfil);
                infoContacto.append('telefono', telefono);
                infoContacto.append('link_perfil_real', link_perfil_real);
                infoContacto.append('pais', pais);
                infoContacto.append('accion', accion);

          //console.log(...infoContacto);

          if(accion === 'crear'){
               // crearemos un nuevo contacto
               insertarBD(infoContacto);

          } else {
            // editar el contacto
            // leer el Id
            const idRegistro = document.querySelector('#id').value;
            infoContacto.append('perfil_id', idRegistro);
            actualizarRegistro(infoContacto);
       }
     }
}



// Funcion insertar en la base de datos vía AJAX
function insertarBD(infoContacto){
    //  Llamada a ajax

    //  Crear el objeto
        const xhr = new XMLHttpRequest();

    //  Abrie la conexion a ajax
        xhr.open('POST', 'includes/modelos/modelo-contacto.php', true);

    //  Pasar los datos a ajax
        xhr.onload = function(){
            if(this.status === 200 ){
                console.log(JSON.parse(xhr.responseText));
                 // En php no existe los arreglos asociativos, se llaman objetos
                //Leemos la respuesta de php - primero convertimos el string Json en objeto para leer
                const respuesta = JSON.parse( xhr.responseText );

                //console.log(respuesta.nombre);

                // INSERTA UN NUEVO ELEMENTO A LA TABLA 
                const nuevoContacto = document.createElement('tr');
                
                nuevoContacto.innerHTML = `

                    <td>${respuesta.infoContacto.nombre}</td>
                    <td>${respuesta.infoContacto.email}</td>
                    <td>${respuesta.infoContacto.pass}</td>
                    <td>${respuesta.infoContacto.date}</td>
                    <td>${respuesta.infoContacto.link_perfil}</td>
                    <td>${respuesta.infoContacto.telefono}</td>
                    <td>${respuesta.infoContacto.link_perfil_real}</td>
                    <td>${respuesta.infoContacto.pais}</td>
                `;


                // Crea el contenedor para los botones
                const contenedorAcciones = document.createElement('td');
                      contenedorAcciones.classList.add('acciones');

                    // Creacion del icono de editar
                    const iconoEditar = document.createElement('i'); 
                          iconoEditar.classList.add('fas', 'fa-pen-square');

                    // Crear el enlace para editar
                    const btnEditar = document.createElement('a');
                    btnEditar.appendChild(iconoEditar);
                    btnEditar.href = `editar-perfil.php=${respuesta.infoContacto.id_insertado}`;
                    btnEditar.classList.add('btn', 'btn-editar');

                    //  Lo agregamos al padre
                    contenedorAcciones.appendChild(btnEditar);

                /***////////*/*////*///*//*//*///*///////// */ */ */

                // Crear el icono de eliminar 
                     const iconoEliminar = document.createElement('i');
                           iconoEliminar.classList.add('fas', 'fa-trash');
                    
                //  Crear el enlace para editar
                     const btnEliminar = document.createElement('button');
                     btnEliminar.appendChild(iconoEliminar);
                     btnEliminar.setAttribute('data-id', respuesta.infoContacto.id_insertado);
                     btnEliminar.classList.add('btn', 'btn-borrar');

                //   Lo agregamos al padre
                 contenedorAcciones.appendChild(btnEliminar);

                // Agregarlo al tr para mostrarlo en la página
                nuevoContacto.appendChild(contenedorAcciones);



                /* Agregamos a la lista de perfiles que se muestra en pantalla  */
                listadoPerfiles.appendChild(nuevoContacto);

                /* RESETEAR EL FORMULARIO DESPUÉS DE AGREGAR LA INFO  */
                document.querySelector('form').reset();


                /* MOSTRAR LA NOTIFICACIÓN AL AGREGAR UN PERFIL NUEVO */ 
                mostrarNotificaciones('Perfil creado correctamente', 'exito');
            }
        }

    //  Enviar los datos a ajax
        xhr.send(infoContacto);
}

// actualizar registro
function actualizarRegistro(infoContacto){
    // console.log(...infoContacto);

    // Crear objeto ajax
    const xhr = new XMLHttpRequest();
    
    // abrir la conexion
    xhr.open('POST', 'includes/modelos/modelo-contacto.php', true);

    //leer la respuesta
    xhr.onload = function()  {  
        if(this.status === 200){
            const resultado = JSON.parse(xhr.responseText);

             if(resultado.respuesta === 'correcto'){
                // Mostar noptificación si es correcto
                mostrarNotificaciones('Contacto creado correctamente', 'exito');

             }else{
                // Mostar noptificación si NO es correcto
                mostrarNotificaciones('Hubo un error', 'error');
             }

             // Después de 3 segundos redireccionar a la página de inicio
             setTimeout(() => {
                 window.location.href = 'index.php';
             }, 4000);
        }
    }
    //enviar la peticion
    xhr.send(infoContacto);
}
// Función eliminar contacto
function eliminarFormulario(e){
    // Para ver por consola el elemento al cual le diste click
                        //ParentElement,para seleccionar el padre del elemento y verificar si existe
                        // Devolverá true si existe, false si no 
    //console.log(e.target.parentElement.classList.contains('btn-borrar'));

    // Tomar el id 
    
    if(e.target.parentElement.classList.contains('btn-borrar') ){
        //Tomar id
        const id = e.target.parentElement.getAttribute('data-id');
        console.log(id);

        // Preguntar al usuario
        const respuesta = confirm('Estas segur@ ?');

        if(respuesta){
        console.log('Sí, estoy seguro');
    
        // console.log('Lo pensaré');

        // Llamado a ajax

        //Crear el objeto
        const xhr = new XMLHttpRequest();

        //abrir la conexion  | |  mandaremos la información por GET
        xhr.open('GET', `includes/modelos/modelo-contacto.php?id=${id}&accion=borrar`, true);

        //leer la informacion
        xhr.onload = function()  {  
            if(this.status === 200){
                const resultado = JSON.parse(xhr.responseText);

                // console.log(resultado);

                if(resultado.respuesta === 'correcto'){

                    // Eliminamos el registro del DOM -> ajax

                    //Vemos el elemento seleccionado
                    console.log(e.target.parentElement.parentElement.parentElement);

                    //Eliminamos el registro
                    const deleteRegistro = e.target.parentElement.parentElement.parentElement;

                    deleteRegistro.remove();

                    // Mostramos una notificación, si algo esta bien
                    mostrarNotificaciones('Contacto Eliminado', 'exito');


                }else{

                    // Mostramos una notificación, si algo esta mal

                    mostrarNotificaciones('Hubo un error', 'error');
                }


            }
        }

        //enviar la petición
        xhr.send();

    }

    }

    

    
}


//Notifiación en pantalla
function mostrarNotificaciones(mensaje, clase){
    const notificacion = document.createElement('div');
    //agregar una clase
    notificacion.classList.add(clase, 'notificacion', 'sombra');
    notificacion.textContent = mensaje;

    //Formulario                        que se inserta - - - - - -    donde se inserta
    formularioContactos.insertBefore(notificacion, document.querySelector('form leyend'));

    //Ocultar y mostrar la notificación
    setTimeout(() => {
        notificacion.classList.add('visible');

        setTimeout(() => {
        notificacion.classList.remove('visible');
        //Despues de los 3 segundos elminamos el div.notificacion para que no se amontonen
        // A esto se le conoce como garbage collector -> esto es que javascript elimina lo que ya no necesita
        //   https://developer.mozilla.org/en-US/docs/Web/JavaScript/Memory_Management 
            setTimeout(() => {
                notificacion.remove();

            }, 500)
        }, 3000)
    }, 100);

}