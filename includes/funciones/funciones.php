<?php

    function obetenerContactosDesdeDB(){
        include 'bd_conexion.php';

        try{
            return $conn->query(" SELECT perfil_id, nombre, email, contrasena, fecha, link_perfil, 
                                telefono, link_perfil_real, pais FROM crear_perfil");
        } catch(Exception $e){
            echo "Error!" . $e->getMessage() . "<br>";
            return false;
        }

    }

?>  