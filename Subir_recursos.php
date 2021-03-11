<!doctype html>
<html lang="en">

<?php

include_once('include/conexion.php'); ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <link rel="stylesheet" href="css/fontawesome-free-5.15.1-web/fontawesome-free-5.15.1-web/css/all.min.css">
    <title>Hello, world!</title>

</head>

<body>

    <div class="container">
        <div class="row">

            <div class="card-header">
                Cargar Recursos
            </div>

            <?php if (isset($_SESSION['message'])) { ?>


                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php session_unset();
            } ?>

            <div class="card-body">
                <form class="cargar" action="include/cargar.php" method="POST" enctype="multipart/form-data">


                    <div class="mb-3">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del archivo" />
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="imageTitle" placeholder="Titulo" />
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" name="description" id="" cols="30" rows="3" placeholder="Description"></textarea>
                    </div>

                    <div class="mb-3">

                        <label for="file" class="form-label"></label>
                        <input class="form-control" type="file" id="file" name="file" required>
                    </div>


                    <div class="mb-3">
                        <button class="btn btn-success" type="submit" name="submit">cargar</button>
                    </div>

                </form>
            </div>

            <header>
                <h1>Contenido total de recursos</h1>
            </header>


            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="tablaRecursos" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>

                                        <th>Titulo</th>
                                        <th>Descripción</th>
                                        <th>Imagen</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC;";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "SQL statemet failed";
                                    } else {
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                        while ($row = mysqli_fetch_assoc($result)) { ?>

                                            <tr>
                                                <td><?php echo $row['idGallery']; ?></td>
                                                <td><?php echo $row['titleGallery']; ?></td>
                                                <td><?php echo $row['descGallery']; ?></td>
                                                <td><?php echo $row['imgFullnameGallery']; ?></td>
                                                <td>
                                                    <a href="include/edit.php?id=<?php echo $row['idGallery'] ?>" class="btn btn-secondary">
                                                        <i class="fas fa-marker"></i>
                                                    </a>
                                                    <a href="include/eliminar.php?id=<?php echo $row['idGallery'] ?>" class="btn btn-danger">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php }
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="ext/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


</body>

</html>