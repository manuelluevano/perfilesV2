const formularioContactos = document.querySelector('#contacto');

eventListeners();

function eventListeners() {
     // Cuando el formulario de crear o editar se ejecuta
     formularioContactos.addEventListener('submit', leerFormulario);

}

function leerFormulario(e) {
     e.preventDefault();

     // Leer los datos de los inputs
     const nombre = document.querySelector('#nombre').value,
           email = document.querySelector('#email').value,
           accion = document.querySelector('#accion').value;

     if(nombre === '' || email  === '') {
          // 2 parametros: texto y clase
          mostrarNotificaciones('Todos los Campos son Obligatorios', 'error');
     } else {
          // Pasa la validación, crear llamado a Ajax
          const infoContacto = new FormData();
                infoContacto.append('nombre', nombre);
                infoContacto.append('email', email);
                infoContacto.append('accion', accion);

          //console.log(...infoContacto);

          if(accion === 'crear'){
               // crearemos un nuevo contacto
               insertarBD(infoContacto);
          } else {
               // editar el contacto
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
            }
        }

    //  Enviar los datos a ajax
        xhr.send(infoContacto);
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