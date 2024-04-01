<?php
include '../BDD_Conexion/Conexion.php'; // Incluye el archivo de conexión

// Consulta SQL para contar la cantidad de usuarios
$sqlUsuarios = "SELECT COUNT(*) as total_usuarios FROM usuarios";
$resultadoUsuarios = $conn->query($sqlUsuarios);
$totalUsuarios = 0;
if ($resultadoUsuarios) {
    $filaUsuarios = $resultadoUsuarios->fetch_assoc();
    $totalUsuarios = $filaUsuarios['total_usuarios'];
}

// Consulta SQL para contar la cantidad de posts
$sqlPosts = "SELECT COUNT(*) as total_posts FROM publicaciones";
$resultadoPosts = $conn->query($sqlPosts);
$totalPosts = 0;
if ($resultadoPosts) {
    $filaPosts = $resultadoPosts->fetch_assoc();
    $totalPosts = $filaPosts['total_posts'];
}

// Consulta SQL para contar la cantidad total de likes
$sqlLikes = "SELECT COUNT(*) as total_likes FROM me_gusta_publicaciones";
$resultadoLikes = $conn->query($sqlLikes);
$totalLikes = 0;
if ($resultadoLikes) {
    $filaLikes = $resultadoLikes->fetch_assoc();
    $totalLikes = $filaLikes['total_likes'];
}

// Consulta SQL para obtener la cantidad de usuarios por país
$sqlCantidadUsuariosPorPais = "SELECT pais, COUNT(id_usuario) AS cantidad_usuarios FROM usuarios GROUP BY pais";
$resultadoCantidadUsuariosPorPais = $conn->query($sqlCantidadUsuariosPorPais);

// Array asociativo para almacenar la cantidad de usuarios por país
$cantidadUsuariosPorPais = array();

if ($resultadoCantidadUsuariosPorPais && $resultadoCantidadUsuariosPorPais->num_rows > 0) {
    while ($fila = $resultadoCantidadUsuariosPorPais->fetch_assoc()) {
        $cantidadUsuariosPorPais[$fila['pais']] = $fila['cantidad_usuarios'];
    }
}

// Consulta SQL para obtener el post con más likes
$sqlPostMasLikes = "SELECT p.titulo, COUNT(l.id_me_gusta_publicacion) as cantidad_likes
                    FROM publicaciones p
                    INNER JOIN me_gusta_publicaciones l ON p.id_publicacion = l.fk_id_publicacion
                    GROUP BY p.id_publicacion
                    ORDER BY cantidad_likes DESC
                    LIMIT 1";
$resultadoPostMasLikes = $conn->query($sqlPostMasLikes);

$postMasLikes = null;
$cantidadLikesMasLikes = 0;

if ($resultadoPostMasLikes && $resultadoPostMasLikes->num_rows > 0) {
    $filaPostMasLikes = $resultadoPostMasLikes->fetch_assoc();
    $postMasLikes = $filaPostMasLikes['titulo'];
    $cantidadLikesMasLikes = $filaPostMasLikes['cantidad_likes'];
}

// Consulta SQL para obtener la cantidad de usuarios por continente
$sqlUsuariosPorContinente = "SELECT continente, COUNT(id_usuario) as cantidad_usuarios
FROM usuarios
GROUP BY continente";
$resultadoUsuariosPorContinente = $conn->query($sqlUsuariosPorContinente);

// Arreglo asociativo para almacenar la cantidad de usuarios por continente
$cantidadUsuariosPorContinente = array();

if ($resultadoUsuariosPorContinente && $resultadoUsuariosPorContinente->num_rows > 0) {
    while ($fila = $resultadoUsuariosPorContinente->fetch_assoc()) {
        $cantidadUsuariosPorContinente[$fila['continente']] = $fila['cantidad_usuarios'];
    }
}

// Obtener el máximo de usuarios por continente
$maximoUsuarios = max($cantidadUsuariosPorContinente);
$sqlPublicacionesMensuales = "SELECT MONTH(fecha) AS mes, COUNT(*) AS cantidad_publicaciones FROM publicaciones GROUP BY MONTH(fecha)";
$resultadoPublicacionesMensuales = $conn->query($sqlPublicacionesMensuales);

// Array asociativo para almacenar la cantidad de publicaciones por mes
$publicacionesMensuales = array();

if ($resultadoPublicacionesMensuales && $resultadoPublicacionesMensuales->num_rows > 0) {
    while ($fila = $resultadoPublicacionesMensuales->fetch_assoc()) {
        $publicacionesMensuales[$fila['mes']] = $fila['cantidad_publicaciones'];
    }
}
// Cierra la conexión
$conn->close();
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Admin LTE</title>
    <style>
    #loader {
        transition: all .3s ease-in-out;
        opacity: 1;
        visibility: visible;
        position: fixed;
        height: 100vh;
        width: 100%;
        background: #fff;
        z-index: 90000
    }

    #loader.fadeOut {
        opacity: 0;
        visibility: hidden
    }

    .spinner {
        width: 40px;
        height: 40px;
        position: absolute;
        top: calc(50% - 20px);
        left: calc(50% - 20px);
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-scaleout 1s infinite ease-in-out;
        animation: sk-scaleout 1s infinite ease-in-out
    }

    @-webkit-keyframes sk-scaleout {
        0% {
            -webkit-transform: scale(0)
        }

        100% {
            -webkit-transform: scale(1);
            opacity: 0
        }
    }

    @keyframes sk-scaleout {
        0% {
            -webkit-transform: scale(0);
            transform: scale(0)
        }

        100% {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 0
        }
    }
    </style>
    <script defer="defer" src="main.js"></script>
    <link href="style.css" rel="stylesheet">
</head>

<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script>
    window.addEventListener("load", (function() {
        const t = document.getElementById("loader");
        setTimeout((function() {
            t.classList.add("fadeOut")
        }), 300)
    }))
    </script>
    <div>
        <!-- #Left Sidebar ==================== -->
        <div class="sidebar">
            <div class="sidebar-inner">
                <!-- ### $Sidebar Header ### -->
                <div class="sidebar-logo">
                    <div class="peers ai-c fxw-nw">
                        <div class="peer peer-greed"><a class="sidebar-link td-n" href="../Home/Home.php">
                                <div class="peers ai-c fxw-nw">
                                    <div class="peer">
                                        <div class="logo"><img src="assets/static/images/logo.png" alt=""></div>
                                    </div>
                                    <div class="peer peer-greed">
                                        <h5 class="lh-1 mB-0 logo-text">We Travelers</h5>
                                    </div>
                                </div>
                            </a></div>
                        <div class="peer">
                            <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i
                                        class="ti-arrow-circle-left"></i></a></div>
                        </div>
                    </div>
                </div><!-- ### $Sidebar Menu ### -->
                <ul class="sidebar-menu scrollable pos-r">
                    <li class="nav-item mT-30 actived"><a class="sidebar-link" href="index.html"><span
                                class="icon-holder"><i class="c-blue-500 ti-home"></i> </span><span class="title">Admin
                                LTE</span></a></li>
                    <li class="nav-item"><a class="sidebar-link" href="chat.html"><span class="icon-holder"><i
                                    class="c-deep-purple-500 ti-comment-alt"></i> </span><span
                                class="title">Chats</span></a></li>
                    <li class="nav-item"><a class="sidebar-link" href="charts.html"><span class="icon-holder"><i
                                    class="c-indigo-500 ti-bar-chart"></i> </span><span
                                class="title">Graficas</span></a>
                    </li>
                    <li class="nav-item"><a class="sidebar-link" href="forms.html"><span class="icon-holder"><i
                                    class="c-light-blue-500 ti-pencil"></i> </span><span class="title">Contenido
                                Adicional</span></a>
                    </li>
                    <li class="nav-item dropdown"><a class="sidebar-link" href="ui.html"><span class="icon-holder"><i
                                    class="c-pink-500 ti-palette"></i> </span><span class="title">Elementos
                                UI</span></a>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span
                                class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span
                                class="title">Tablas</span> <span class="arrow"><i
                                    class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="sidebar-link" href="basic-table.html">Tabla basica</a></li>
                            <li><a class="sidebar-link" href="datatable.html">Tabla de datos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span
                                class="icon-holder"><i class="c-purple-500 ti-map"></i> </span><span
                                class="title">Mapas</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="google-maps.html">Google Map</a></li>
                            <li><a href="vector-maps.html">Mapa vectorial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span
                                class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span
                                class="title">Paginas</span> <span class="arrow"><i
                                    class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="sidebar-link" href="blank.html">Blank</a></li>
                            <li><a class="sidebar-link" href="404.html">404</a></li>
                            <li><a class="sidebar-link" href="500.html">500</a></li>
                            <li><a class="sidebar-link" href="signin.html">Sign In</a></li>
                            <li><a class="sidebar-link" href="signup.html">Sign Up</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span
                                class="icon-holder"><i class="c-teal-500 ti-view-list-alt"></i> </span><span
                                class="title">Niveles Multiples</span> <span class="arrow"><i
                                    class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item dropdown"><a href="javascript:void(0);"><span>Item menu</span></a></li>
                            <li class="nav-item dropdown"><a href="javascript:void(0);"><span>Item menu</span> <span
                                        class="arrow"><i class="ti-angle-right"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Item menu</a></li>
                                    <li><a href="javascript:void(0);">Item menu</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- #Main ============================ -->
        <div class="page-container">
            <!-- ### $Topbar ### -->
            <div class="header navbar">
                <div class="header-container">
                    <ul class="nav-left">
                        <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i
                                    class="ti-menu"></i></a></li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown"><a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1"
                                data-bs-toggle="dropdown">
                                <div class="peer mR-10"><img class="w-2r bdrs-50p" src="" alt=""></div>
                                <div class="peer"><span class="fsz-sm c-grey-900">???</span></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!-- ### $App Screen Content ### -->
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="row gap-20 masonry pos-r">
                        <div class="masonry-sizer col-md-6"></div>
                        <div class="masonry-item w-100">
                            <div class="row gap-20">
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Cantidad usuarios</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash"></span></div>
                                                <div class="peer"><span
                                                        class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?php echo $totalUsuarios; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Post subidos</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash2"></span></div>
                                                <div class="peer"><span
                                                        class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500"><?php echo $totalPosts; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Total de Likes</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash3"></span></div>
                                                <div class="peer"><span
                                                        class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500"><?php echo $totalLikes; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Post con mas likes</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash4"></span></div>
                                                <div class="peer peer-greed">
                                                    <span>Titulo: <?php echo $postMasLikes; ?></span>
                                                </div>
                                                <div class="peer"><span
                                                        class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500"><?php echo $cantidadLikesMasLikes; ?>
                                                        Likes</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="masonry-item col-12">
                        <!-- #Site Visits ==================== -->
                        <div class="bd bgc-white">
                            <div class="peers fxw-nw@lg+ ai-s">
                                <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                                    <div class="layers">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Mapa de usuarios</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <div id="world-map-marker"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="peer bdL p-20 w-30p@lg+ w-100p@lg-">
                                    <div class="layers">
                                        <div class="layer w-100">
                                            <div class="layers">
                                                <?php foreach ($cantidadUsuariosPorContinente as $continente => $cantidadUsuarios) : ?>
                                                <div class="layer w-100 mB-15">
                                                    <h5 class="mB-5"></h5>
                                                    <small class="fw-600 c-grey-700">Viajeros de
                                                        <?php echo $continente; ?> - <?php echo $cantidadUsuarios; ?>
                                                        usuarios
                                                    </small>
                                                    <div class="progress mT-10">
                                                        <div class="progress-bar bgc-deep-purple-500" role="progressbar"
                                                            aria-valuenow="<?php echo ($cantidadUsuarios / $maximoUsuarios) * 100; ?>"
                                                            aria-valuemin="0" aria-valuemax="100"
                                                            style="width: <?php echo ($cantidadUsuarios / $maximoUsuarios) * 100; ?>%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="masonry-item col-md-12">
                    <div class="bd bgc-white p-20">
                        <h6 class="lh-1">Publicaciones mensuales</h6>
                        <div class="peers pT-20">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $cantidadPublicaciones = isset($publicacionesMensuales[$i]) ? $publicacionesMensuales[$i] : 0;
                                echo "<div class='peer mR-20'>";
                                echo "<small>Mes $i</small>";
                                echo "<div class='progress mT-5'>";
                                echo "<div class='progress-bar bgc-deep-purple-500' role='progressbar' aria-valuenow='$cantidadPublicaciones' aria-valuemin='0' aria-valuemax='$totalPosts' style='width:" . ($cantidadPublicaciones / $totalPosts) * 100 . "%;'></div>";
                                echo "</div>";
                                echo "<small class='d-b fw-600'>$cantidadPublicaciones</small>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </main><!-- ### $App Screen Footer ### -->
            <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600"><span>Copyright © 2024 Diseñado por <a
                        href="https://colorlib.com" target="_blank" title="Colorlib">Moises Cardenas, Moises Gomez y
                        Oscar Aguiar</a>. Algunos derechos reservados, otros estan expropiados.</span></footer>
        </div>
    </div>

</body>

</html>