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

    //  Validar que los campos contengan información

    if(nombre === '' || email === '' || pass === '' || date === '' || link_perfil === '' || 
        telefono === '' || link_perfil_real === '' || pais === '' ){

            //  Texto y clase 
            mostrarNotificaciones("Todos los campos son obligatorios", 'error');
        }else{
            mostrarNotificaciones("Contacto creado correctamente", 'exito');
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