<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We Travelers</title>
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Index_Style.css">
</head>

<body>
    <!--Cabecera de la pagina -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" data-bs-theme="dark" style="height: 75px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="Index.php">We Travelers</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Cuadro de busqueda y su respectivo boton-->
                <form class="d-flex  ms-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                <!-- Botones de barra de navegacion-->
                <ul class="navbar-nav me-1 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Usuario
                        </a>
                        <ul class="dropdown-menu" style="margin-right: 150px;">
                            <li><a class="dropdown-item" href="#">Ver Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Localización</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Mensajes</a>
                    </li>
                    <li class="nav-item">
                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-success"
                            type="button">Crear nuevo post</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Panel lateral-->
    <div id="panel-lateral" class=" flex-column flex-shrink-0 p-3 text-bg-dark fixed-top z-1"
        style="height: calc(100vh - 75px ); width: 280px; top:75px;">
        <style>
        @media (max-width: 800px) {

            #panel-lateral,
            .nav-link {
                width: 4.5rem !important;
                justify-content: center;
                align-items: center;
                display: flex;

            }

            #map-container {
                left: 72px !important;
                width: 100%;
            }

            .icon {
                margin-right: 0 !important;
                margin-bottom: 5px;
                height: 50px;
                width: 40px;
            }

            #panel-lateral ul,
            li,
            span.fs-4,
            #nombre-usuario-sidebar {
                font-size: 0;
            }

            #panel-lateral span,
            .people-list,
            #separador {
                display: none;
            }

            .dropdown-item {
                font-size: 1rem;
            }

            #Usuario {
                margin-right: 0 !important;
            }

        }
        </style>
        <a href="" id="botonInicio"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="40" height="40"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round" style="margin-right: 15px;">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
            </svg>
            <span class="fs-4">Inicio</span>
        </a>
        <hr id="separador">
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="../Explorar/Explorar.php" class="nav-link text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="25"
                        height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                        <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                    </svg>
                    Explorar
                </a>
            </li>
            <li>
                <a href="../Rutas/Rutas.php" class="nav-link text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-route" width="25"
                        height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M19 7a2 2 0 1 0 0 -4a2 2 0 0 0 0 4z" />
                        <path d="M11 19h5.5a3.5 3.5 0 0 0 0 -7h-8a3.5 3.5 0 0 1 0 -7h4.5" />
                    </svg>
                    Rutas
                </a>
            </li>
            <li>
                <a href="../Clubes/Clubes.php" class="nav-link text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="25"
                        height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                    </svg>
                    Clubes
                </a>
            </li>
        </ul>
        <hr>
        <div id="plist" class="people-list">
            <ul id="chatList" class="list-unstyled chat-list mt-2 mb-0">
                <li class="clearfix">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                    <div class="about">
                        <div class="name">Luis Rodriguez</div>
                        <div class="status"> <i class="fa fa-circle offline"></i> Ultima vez hace 7 min </div>
                    </div>
                </li>
                <li class="clearfix">
                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                    <div class="about">
                        <div class="name">Moises Gómez</div>
                        <div class="status"> <i class="fa fa-circle online"></i> En linea </div>
                    </div>
                </li>
                <li class="clearfix">
                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
                    <div class="about">
                        <div class="name">Maria Becerra</div>
                        <div class="status"> <i class="fa fa-circle online"></i> En linea </div>
                    </div>
                </li>
                <li class="clearfix">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                    <div class="about">
                        <div class="name">Cesar Requena</div>
                        <div class="status"> <i class="fa fa-circle offline"></i> Ultima vez hace 10 horas </div>
                    </div>
                </li>
                <li class="clearfix">
                    <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="avatar">
                    <div class="about">
                        <div class="name">Tumadre Lagorda</div>
                        <div class="status"> <i class="fa fa-circle online"></i> En linea </div>
                    </div>
                </li>
                <li class="clearfix">
                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="avatar">
                    <div class="about">
                        <div class="name">Daniel Alarcon</div>
                        <div class="status"> <i class="fa fa-circle offline"></i> Ultima conexion: 28 oct </div>
                    </div>
                </li>
            </ul>
        </div>

        <hr id="separador" style="bottom: 65px; position: absolute; width: 248px;">
        <div class="dropdown position-fixed" style="bottom: 20px;">

            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img id="Usuario" src="../rsc/images/messi.webp" alt="" width="45" height="45"
                    class="rounded-circle me-2">
                <strong id="nombre-usuario-sidebar">Usuario</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><button data-toggle="modal" data-target="#exampleModal" class="btn dropdown-item"
                        type="button">Crear
                        nuevo post</button></li>
                <li><a class="dropdown-item" href="#">Localización</a></li>
                <li><a class="dropdown-item" href="#">Ver Perfil</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>

    <!-- Contenedor del feed -->
    <div id="feed-container" class="d-flex flex-wrap justify-content-around">

        <div class="card">
            <div class="card-header">
                <div><img id="Usuario" src="../rsc/images/messi.webp" alt="" width="50" height="50"
                        class="rounded-circle me-2">
                    <strong id="nombre-usuario">Usuario</strong>
                </div>
                <button id="ubicacion" type="button" class="btn btn-link">Nidwalden / Suiza</button>
            </div>
            <div class="contenedor-imagen-publicacion">
                <img src="https://travels360.tours/wp-content/uploads/2023/07/lucerna-suiza.jpg" class="feed-img-top"
                    alt="...">
            </div>
            <div class="card-body">
                <h3 class="titulo">Enamorado de suiza</h3>
                <div class="d-flex align-items-center justify-content-center">
                    <h5 class="publicacion-likes me-2">23 Likes</h5>
                    <button id="boton-like" type="button" class="btn btn-light btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                    </button>
                </div>
                <p class="publicacion-descripcion">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                    non
                    elit ornare, interdum
                    libero id, ultrices sem. Duis molestie elementum ipsum et eleifend. Nunc porta.</p>
                <input type="text" class="form-control comentario" id="comentario-publicacion"
                    placeholder="Escriba un comentario...">
                <button id="boton-opciones" type="button" class="btn btn-light btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dots-vertical"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                        <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                        <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div><img id="Usuario" src="../rsc/images/messi.webp" alt="" width="50" height="50"
                        class="rounded-circle me-2">
                    <strong id="nombre-usuario">Usuario</strong>
                </div>
                <button id="ubicacion" type="button" class="btn btn-link">Noruega / Østfold</button>
            </div>
            <img src="https://viajes.nationalgeographic.com.es/medio/2023/09/20/lofoten-boreal_04cb6545_230920195855_1280x880.jpg"
                class="feed-img-top" alt="...">
            <div class="card-body">
                <h3 class="titulo">Increible</h3>
                <div class="d-flex align-items-center justify-content-center">
                    <h5 class="publicacion-likes me-2">250 Likes</h5>
                    <button id="boton-like" type="button" class="btn btn-light btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                    </button>
                </div>
                <p class="publicacion-descripcion">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                    non
                    elit ornare, interdum
                    libero id, ultrices sem. Duis molestie elementum ipsum et eleifend. Nunc porta.</p>
                <input type="text" class="form-control comentario" id="comentario-publicacion"
                    placeholder="Escriba un comentario...">
                <button id="boton-opciones" type="button" class="btn btn-light btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dots-vertical"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                        <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                        <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div><img id="Usuario" src="../rsc/images/messi.webp" alt="" width="50" height="50"
                        class="rounded-circle me-2">
                    <strong id="nombre-usuario">Usuario</strong>
                </div>
                <button id="ubicacion" type="button" class="btn btn-link">Venezuela / Nueva Esparta</button>
            </div>
            <img src="https://www.navicuvacationclub.com/wp-content/uploads/2023/12/playa-en-margarita.webp"
                class="feed-img-top" alt="...">
            <div class="card-body">
                <h3 class="titulo">Veneco de nacimiento</h3>
                <div class="d-flex align-items-center justify-content-center">
                    <h5 class="publicacion-likes me-2">845 Likes</h5>
                    <button id="boton-like" type="button" class="btn btn-light btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                    </button>
                </div>
                <p class="publicacion-descripcion">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                    non
                    elit ornare, interdum
                    libero id, ultrices sem. Duis molestie elementum ipsum et eleifend. Nunc porta.</p>
                <input type="text" class="form-control comentario" id="comentario-publicacion"
                    placeholder="Escriba un comentario...">
                <button id="boton-opciones" type="button" class="btn btn-light btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dots-vertical"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                        <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                        <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!--Modal-->
    <div class="modal fade" id="exampleModal" tabindex="0" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="">
                        <input type="text" class="form-control" id="titulo-publicacion" placeholder="Ponle un titulo"
                            style="margin-bottom: 15px;">
                        <textarea class="form-control" id="message-text" placeholder="Añade una descripcion"
                            style="resize: none;"></textarea>

                        <div class="button_outer btn btn-light btn-sm" style="margin-top: 10px;">
                            <div class="btn_upload">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo"
                                    width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M15 8h.01" />
                                    <path
                                        d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" />
                                    <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" />
                                    <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" />
                                </svg>
                                <input type="file" id="upload_file" name=""></input">
                            </div>
                        </div>

                        <button id="obtener-ubicacion" type="button" class="btn btn-light btn-sm"
                            style="margin-top: 10px;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin"
                                width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                <path
                                    d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                            </svg>
                        </button>
                        <div class="barra_progreso">
                            <div class="processing_bar"></div>
                        </div>
                        <div class="error_msg"></div>
                        <div class="uploaded_file_view" id="uploaded_view">
                            <span class="file_remove">X</span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Publicar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="Index_Funtion.js"></script>
    <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>