<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SALAZAR CONSULTANCY</title>

    <link rel="shortcut icon" href="img/pagina_principal/Favicon_Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="ext/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles6.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.15.1-web/fontawesome-free-5.15.1-web/css/all.min.css">
</head>

<body>

    <!-- sidebar -->

    <div class="Mside " id='aside' style='left:-250px'>
        <div class="row">
            <div class="col"><a class="navbar-brand text-light" href="index.html"><img src="img/pagina_principal/Favicon_Logo.png" height="5px"> <span class="font-weight-bold">SALAZAR</span></a></div>
            <div class="col text-right"><a href="#" onclick="javascript:Msidebar('C');" class="text-light"><i class="fas fa-times "></i></a></div>
        </div>
        <ul class="nav flex-column mt-5">
            <li class="text-warning">
                <h5>Menú</h5>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="Soluciones.html">Soluciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Metodología.html">Metodología</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Nosotros.html">Nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Hagamos un Trato.html">Hagamos un Trato</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Negocio.html">Recursos</a>
            </li>

        </ul>
    </div>
    <section class="header">
        <nav class="navbar navbar-expand-lg fixed-top">


            <div class="container">

                <a href="index.html"><img src="img/pagina_principal/LogoSalazar.png" class="logo-brand" alt="logo"></a>
                <button class="cerrar" onclick="javacript:Msidebar('R');">
                    <img src="img/Iconos/menu.png">
                </button>

            </div>
        </nav>

    </section>



    <!-- end header menu -->

    <!-- Hero Section  -->
    <section id="hero">
        <div class="container">
            <div class="content-center">
                <div class="row">
                    <h1>Te compartimos nuestra experiencia.</h1>
                </div>


            </div>
        </div>
    </section>
    <!-- END Hero Section  -->

    <!-- section servicio -->
    <section id="team" class="bgLightGrey">
        <div class="container">

            <div class="row row-cols-1 row-cols-md-3 g-4">



                <?php

                include_once('include/conexion.php');

                $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statemet failed";
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while ($row = mysqli_fetch_assoc($result)) { ?>


                        <div class="card" >

                            <img src="prueba/<?= $row['imgFullnameGallery'] ?>" >


                            <div class="card-body">
                                <h5 class="card-title"><?= $row['titleGallery'] ?></h5>

                                <a href="<?= $row['descGallery'] ?>" class="card-link">Enlace</a>
                            </div>
                        </div>




                <?php }
                }
                ?>
            </div>

        </div>
    </section>
   


    <!-- end section servicio -->
    <!-- section footer -->
    <footer class="text-white">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <ul class="list-inline">
                        <li><button type="button" class="btn btn text-white" data-toggle="modal" data-target="#exampleModalLong">
                                <h2>Derechos Reservados</h2>
                            </button></li>
                        <li><button type="button" class="btn btn text-white" data-toggle="modal" data-target="#Aviso_de_privacidad">
                                <h2>Aviso de Privacidad</h2>
                            </button></li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="https://web.facebook.com/SalazarConsultancy"><img src="img/Iconos/fb.png" class="img-fluid"></a>
                        </li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/salazar_consultancy/"><img src="img/Iconos/logotipo-de-instagram.png" class="img-fluid"></a></li>
                        <li class="list-inline-item"><a href="https://www.linkedin.com/company/s3ingenieria-m%C3%A9xico"><img src="img/Iconos/linkedin.png" class="img-fluid"></a></li>

                    </ul>
                </div>

            </div>

        </div>

    </footer>

    <!-- end section footer -->



    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Derechos Reservados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Aviso_de_privacidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Aviso_de_privacidad">Aviso de Privacidad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p>Salazar Consultancy es responsable del tratamiento de sus datos personales, con domicilio en
                        Segunda Privada San Marcos #205, Jardines de la Luz, Aguascalientes, Ags. 20269.</p>

                    <p> Los datos que le solicitamos serán utilizados para las siguientes finalidades:</p>
                    <ul>
                        <li>Información de contacto para evaluar posibilidades de colaboración mutua</li>
                        <li>Hoja de vida o Currícula para evaluar la idoneidad del perfil del candidato para colaborar
                            con la Firma</li>
                        <li>Información del perfil en LinkedIn u otras redes sociales para mantener comunicación y
                            contacto continuo</li>
                        <li>Enlistarse a Boletín Salazar Consultancy donde se enviará periódicamente información
                            general, noticias, eventos, artículos, casos de negocio, etc. Acorde a los trabajos, labores
                            de investigación y de desarrollo de la Firma.</li>
                    </ul>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>


    <!-- section script -->
    <script src="ext/jquery-3.5.1.min.js"></script>
    <script src="ext/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <!-- <script src="js/video.js"></script> -->

    <!-- end section script -->

</html>