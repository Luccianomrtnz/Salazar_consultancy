<?php
include_once('conexion.php');

$title = '';
$description = '';
$image = '';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM gallery WHERE idGallery=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['titleGallery'];
    $description = $row['descGallery'];
    $image = $row['imgFullnameGallery'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['imageTitle'];
  $description = $_POST['description'];

  $query = "UPDATE gallery set titleGallery = '$title', descGallery = '$description' WHERE idGallery=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header("Location: ../Subir_recursos.php?upload=success");
}


?>


<!doctype html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="css/fontawesome-free-5.15.1-web/fontawesome-free-5.15.1-web/css/all.min.css">
  <title>Hello, world!</title>

</head>

<body>

  <div class="container">
    <div class="row">
      <div class="card-header">
        <div class="card-body">

          <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="mb-3">
              <input type="text" class="form-control" name="nombre" value="<?php echo $image; ?>" />
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="imageTitle" placeholder="Actualiza el Titulo" value="<?php echo $title; ?>" />
            </div>

            <div class=" mb-3">
              <textarea class="form-control" name="description" id="" cols="30" rows="3" placeholder="Actualiza la Description" value="<?php echo $description; ?>"></textarea>
            </div>

            <div class="mb-3">

              <label for="file" class="form-label"></label>
              <input class="form-control" type="file" id="file" name="file" required>
            </div>


            <div class="mb-3">
              <button class="btn btn-success" type="submit" name="update">Actualizar</button>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
  </script>
  <script src="ext/jquery-3.6.0.min.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
  </script>


  <script src="ext/jquery.dataTables.min.js"></script>
  <script src="ext/dataTables.bootstrap5.min.js"></script>
  <!-- <script src="js/crud.js"></script> -->


</body>

</html>