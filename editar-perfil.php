<?php include 'includes/templates/header.php';

    // Traemos la funcion creada en funciones para traer la informacion por medio del id
    include 'includes/funciones/funciones.php';
    

    // var_dump($_GET);

    // convertimos el 'id' string a int y guardamos en variable -> solo se puede si el string es número
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    // var_dump($id);
    
    // Si no hay id, arrojará error
    if(!$id){
        die('No es valido');
    }

    $resultado = obtenerContacto($id);

    // Nos va traer los resultados y los almacenará en $contacto
    $contacto = $resultado->fetch_assoc();
    // Utilizaremos esta variable para llenar actumaticamente los campos del formulario en editar 

?>

 <pre>
    <?php var_dump($contacto['fecha']); ?>
</pre> 


<main class=" bg-rojo">

<h3>Editar perfil</h3>

    <form action="#" class="bg-amarillo form sombra" id="contacto">


        <?php include_once 'includes/templates/formulario.php' ?>
            
    </form>

<div id="error" class="error"> </div>

</main>


<?php include_once 'includes/templates/footer.php' ?>