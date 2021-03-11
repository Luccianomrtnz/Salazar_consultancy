<?php


include_once('conexion.php');





if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM gallery WHERE idGallery = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'El recurso se eliminó correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../Subir_recursos.php?upload=success');
}

?>


