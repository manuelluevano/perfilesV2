<?php

if($_POST['accion'] == 'crear'){
     // creará un nuevo registro en la base de datos

     require_once('../funciones/bd_conexion.php');

     // Validar las entradas
     $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
     $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

     try {
          $stmt = $conn->prepare("INSERT INTO crear_perfil (nombre, email) VALUES (?, ?)");
          $stmt->bind_param("ss", $nombre, $email);
          $stmt->execute();
          if($stmt->affected_rows == 1) {
               $respuesta = array(
                    'respuesta' => 'correcto',
                    'infoContacto' => array(
                         'nombre' => $nombre,
                         'email' => $email,
                         'id_insertado' => $stmt->insert_id
                    )
               );
          }
          $stmt->close();
          $conn->close();
     } catch(Exception $e) {
          $respuesta = array(
               'error' => $e->getMessage()
          );
     }

     echo json_encode($respuesta);
}

?>