<?php

if($_POST['accion'] == 'crear'){
     // creará un nuevo registro en la base de datos

     require_once('../funciones/bd_conexion.php');

     // Validar las entradas
     $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
     $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
     $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
     $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
     $link_perfil = filter_var($_POST['link_perfil'], FILTER_SANITIZE_STRING);
     $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
     $link_perfil_real = filter_var($_POST['link_perfil_real'], FILTER_SANITIZE_STRING);
     $pais = filter_var($_POST['pais'], FILTER_SANITIZE_STRING);

     try {
          $stmt = $conn->prepare("INSERT INTO crear_perfil (nombre, email, contrasena, fecha, link_perfil, telefono,
           link_perfil_real, pais) VALUES (?,?,?,?,?,?,?,?)");
          $stmt->bind_param("sssssiss", $nombre, $email, $pass, $date, $link_perfil, $telefono, $link_perfil_real, $pais);
          $stmt->execute();
          if($stmt->affected_rows == 1) {
               $respuesta = array(
                    'respuesta' => 'correcto',
                    'infoContacto' => array(
                         'nombre' => $nombre,
                         'email' => $email,
                         'pass' => $pass,
                         'date' => $date,
                         'link_perfil' => $link_perfil,
                         'telefono' => $telefono,
                         'link_perfil_real' => $link_perfil_real,
                         'pais' => $pais,
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

if($_GET['accion'] == 'borrar'){

     // abrir conexion para acceder al elemento y elminarlo

     require_once('../funciones/bd_conexion.php');

     // Validamos que el id que vamos a recibir sea entero
          $idd = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);


     try {
          $stmt = $conn->prepare("DELETE FROM crear_perfil WHERE perfil_id = ? ");
          $stmt->bind_param("i", $idd);
          $stmt->execute();

          if($stmt->affected_rows == 1) {
               $respuesta = array(
                    'respuesta' => 'correcto'
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