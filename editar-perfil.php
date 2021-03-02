<?php include_once 'includes/templates/header.php' ?>


<main class=" bg-rojo">

<h3>Editar perfil</h3>

<form action="respuesta.php" method="post" action="#" class="bg-amarillo form sombra">


<?php include_once 'includes/templates/formulario.php' ?>
            <div class="campo">
                <input type="submit" class="btn btn-success" value="Editar">
              </div>
</form>

<div id="error" class="error"> </div>

</main>


<?php include_once 'includes/templates/footer.php' ?>