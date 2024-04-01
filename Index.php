<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Index_Style.css">
    <title>We Travelers Login/Register</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</head>

<body>

    <div class="main">
        <div class="contenedor a-contenedor" id="a-contenedor">
            <form class="form" id="a-form">
                <h2 class="title">Crear cuenta</h2>
                <div id="mensajeR" style="color: red;"></div>
                <span class="form__span">Use su email para registrarse</span>
                <input class="form__input" type="text" placeholder="Nombre" name="name_R" id="name_R" />
                <input class="form__input" type="text" placeholder="Nombre de usuario" name="username_R" id="username_R" />
                <input class="form__input" type="text" placeholder="Email" name="email_R" id="email_R" required pattern=".*@.*" />
                <input class="form__input" type="password" placeholder="Contraseña" name="password_R" id="password_R" required minlength="7" />
                <ul>
                    <li><strong>Continente:</strong> <span id="continent"></span></li>
                    <li><strong>Pais:</strong> <span id="country"></span></li>
                    <li><strong>Estado:</strong> <span id="state"></span></li>
                </ul>
                <input class="boton subir" name="Reg_Bot" type="button" value="Registrarse" onclick="ajaxF_R();">
            </form>
        </div>

        <script type="text/javascript">
            $.getJSON('http://ipwhois.app/json/', function(ip) {
                $('#continent').text(ip.continent);
                $('#country').text(ip.country);
                $('#state').text(ip.region);

                // Establecer los valores en los campos ocultos
                $('#continent_input').val(ip.continent);
                $('#country_input').val(ip.country);
                $('#state_input').val(ip.region);
            });
        </script>
        <script>
            function ajaxF_R() {
                var nombre = $('#name_R').val();
                var username = $('#username_R').val();
                var correo = $('#email_R').val();
                var contraseña = $('#password_R').val();
                var continente = $('#continent').text();
                var pais = $('#country').text();
                var estado = $('#state').text();

                // Validar que ningun campo este vacio
                if (nombre === '' || username === '' || correo === '' || contraseña === '') {
                    setTimeout(function() {
                        alert('Por favor, completa todos los campos.');
                    }, 2500);
                    return;
                }

                // Validar el formato del correo electronico
                var emailPattern = /^\S+@\S+\.\S+$/;
                if (!emailPattern.test(correo)) {
                    setTimeout(function() {
                        alert('Por favor, introduce una direccion de correo electronico vlida.');
                    }, 2500);
                    return;
                }

                // Validar longitud de la contraseña y caracteres especiales
                if (contraseña.length < 7 || !/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(contraseña)) {
                    setTimeout(function() {
                        alert(
                            'La contraseña debe tener al menos 7 caracteres y contener al menos 2 caracteres especiales.'
                        );
                    }, 2500);
                    return;
                }

                // Validar que el nombre de usuario no contenga caracteres especiales
                var usernamePattern = /^[a-zA-Z0-9_]+$/;
                if (!usernamePattern.test(username)) {
                    setTimeout(function() {
                        alert('El nombre de usuario solo puede contener letras, numeros y guiones bajos.');
                    }, 2500);
                    return;
                }

                // Si todas las validaciones pasan, enviar los datos del formulario
                $.ajax({
                    data: {
                        'name_R': nombre,
                        'username_R': username,
                        'email_R': correo,
                        'password_R': contraseña,
                        'continent': continente,
                        'country': pais,
                        'state': estado
                    },
                    url: './BDD_Conexion/guardar_registro.php',
                    type: 'POST',
                    beforeSend: function() {},
                    success: function(mensaje) {
                        $('#mensajeR').html(mensaje);
                        if (mensaje === 'Registro exitoso') {
                            setTimeout(function() {
                                $('#name_R').val('');
                                $('#username_R').val('');
                                $('#email_R').val('');
                                $('#password_R').val('');
                                $('#mensajeR').html('');
                                $("#switch_button").click();
                            }, 2500);
                        }
                    }
                });
            }
        </script>


        <!-- Agregamos un formulario de inicio de sesion -->
        <div class="contenedor b-contenedor" id="b-contenedor">
            <form class="form" id="b-form">
                <h2 class="title">Acceder al sitio web</h2>
                <div id="mensajeL" style=" color: red;"></div>
                <span class="form__span">Utilice su correo electronico</span>
                <input class="form__input" type="text" placeholder="Email" name="email_L" id="email_L" required pattern=".*@.*" />
                <input class="form__input" type="password" placeholder="Contraseña" name="password_L" id="password_L" required minlength="2" />
                <a class="form__link">¿Ha olvidado su contraseña?</a>
                <input type="button" class="boton subir" value="Iniciar Sesion" onclick="ajaxF_L();">
            </form>
        </div>

        <script>
            function ajaxF_L() {
                var correo = $('#email_L').val();
                var contraseña = $('#password_L').val();

                // Validar que ningun campo este vacio
                if (correo === '' || contraseña === '') {
                    setTimeout(function() {
                        alert('Por favor, completa todos los campos.');
                    }, 2500);
                    return;
                }
                $.ajax({
                    data: {
                        'email_L': correo,
                        'password_L': contraseña
                    },
                    url: './BDD_Conexion/iniciar_sesion.php',
                    type: 'POST',

                    beforeSend: function() {},

                    success: function(mensaje) {
                        $('#mensajeL').html(mensaje);
                        if (mensaje === 'Inicio de sesion exitoso') {
                            setTimeout(function() {
                                window.location.href = './Home/Home.php';
                            }, 2500);
                        } else if (mensaje === 'Redirigir a perfil') {
                            setTimeout(function() {
                                window.location.href = './Login/Perfil.php';
                            }, 2500);
                        }
                    }
                });
            }
        </script>



        <div class="switch" id="switch-cnt">
            <div class="switch__contenedor" id="switch-c1">
                <h2 class="switch__title title">Iniciar sesion </h2>
                <p class="descripcion">Inicie sesion con su informacion personal para empezar la aventura
                </p>
                <button class="switch__boton boton switch-btn" id="switch_button">Inicia sesion</button>
            </div>

            <div class="switch__contenedor is-hidden" id="switch-c2">
                <h2 class="switch__title title">Registrarse</h2>
                <p class="descripcion">Introduzca sus datos personales y conozca el mundo con nosotros</p>
                <button class="switch__boton boton switch-btn" id="switch_button">Registrate</button>
            </div>
        </div>
    </div>
    <script src="Index_Funtion.js"></script>
</body>

</html>