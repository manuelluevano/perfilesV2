const formularioContactos = document.querySelector('#contacto');

eventListeners();

function eventListeners(){
    //Cuando el formulario de crear o editar se ejecute

    formularioContactos.addEventListener('submit', leerFormulario);
}

function leerFormulario(e){
    //  Prevenir la acción por default -> sew recomeinda hacer cuando utilizamos ajax o javascript
    e.preventDefault();
    console.log(e);
    console.log('Precionaste...');

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
        console.log("Todos los campos deben contener información");
    }else{
        console.log("Todos los campos tienen información");
    }


}