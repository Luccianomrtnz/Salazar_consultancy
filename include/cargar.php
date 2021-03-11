<?php




if (isset($_POST['submit'])) {

    $newFileName = $_POST['nombre'];

    if (empty($newFileName)) {
        $newFileName = "gallery";
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    $imageTitle = $_POST['imageTitle'];
    $imageDesc = $_POST['description'];

    $file = $_FILES['file'];

    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 20000000) {
                $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
                $fileDestination = "../prueba/" . $imageFullName;

                include_once('conexion.php');

                if (empty($imageTitle) || empty($imageDesc)) {
                    header("Location: ../Subir_recursos.php?upload=empty");
                    exit();
                } else {
                    $sql = "SELECT * FROM gallery;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setImageOrder = $rowCount + 1;
                        $sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullnameGallery, orderGallery) VALUES (?, ?, ?, ?);";

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement failed";
                        } else {
                            mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
                            mysqli_stmt_execute($stmt);
                            move_uploaded_file($fileTempName, $fileDestination);

                            $_SESSION['message'] = 'El recurso se Guardó correctamente';
                            $_SESSION['message_type'] = 'success';

                            header("Location: ../Subir_recursos.php?upload=success");
                        }
                    }
                }
            } else {
                echo "El archivo es muy grande";
                exit();
            }
        } else {
            echo "Tienes un error";
            exit();
        }
    } else {
        echo "No es la extensión apropiada";
        exit();
    }
}
