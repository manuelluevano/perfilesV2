const formularioContactos = document.querySelector('#contacto');

eventListeners();

function eventListeners(){
    //Cuando el formulario de crear o editar se ejecute

    formularioContactos.addEventListener('submit', leerFormulario);
}

function leerFormulario(e){
    //  Prevenir la acción por default -> sew recomeinda hacer cuando utilizamos ajax o javascript
    e.preventDefault();
    // console.log(e);
    // console.log('Precionaste...');

    //  Leer los datos de los inputs 
    const nombre = document.querySelector('#nombre').value;
          email = document.querySelector('#email').value,
          pass = document.querySelector('#pass').value,
          date = document.querySelector('#date').value,
          link_perfil = document.querySelector('#link-perfil').value,
          telefono = document.querySelector('#telefono').value,
          link_perfil_real = document.querySelector('#link-perfil-real').value,
          pais = document.querySelector('#pais').value;
          accion = document.querySelector('#accion').value;

    //  Validar que los campos contengan información

    if(nombre === '' || email === '' || pass === '' || date === '' || link_perfil === '' || 
        telefono === '' || link_perfil_real === '' || pais === '' ){

            //  Texto y clase 
            mostrarNotificaciones("Todos los campos son obligatorios", 'error');
        }else{

            // Pasa la validación, se crea la llamda a Ajax
            const infoContacto = new FormData(); //FormData es una forma de leer los datos de un formulario

            //  Pasamos los datos
            infoContacto.append('nombre', nombre),
            infoContacto.append('email', email),
            infoContacto.append('pass', pass),
            infoContacto.append('date', date),
            infoContacto.append('link_perfil', link_perfil),
            infoContacto.append('telefono', telefono),
            infoContacto.append('link_perfil_real', link_perfil_real),
            infoContacto.append('pais', pais);

            // Utilizamos (...) para crear una copia de FornData y poder visualizar la info desde console.log
            console.log(...infoContacto);
            
            if(accion === 'crear'){
                // Creamos un nuevo contacto
                // Funcion para insertar los datos de FornData

                insertarBD(infoContacto);
            }else{
                // Editar el contacto
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
                 console.log(xhr.responseText);
                 // En php no existe los arreglos asociativos, se llaman objetos
                //Leemos la respuesta de php - primero convertimos el string Json en objeto para leer
                const respuesta = JSON.parse(xhr.responseText);

                console.log(respuesta.nombre);
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