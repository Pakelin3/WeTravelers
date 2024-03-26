<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Login_Style.css">
    <title>WAYN Login</title>
    <script src="./js.txt"></script>

</head>

<body>

    <div class="main">
        <div class="contenedor a-contenedor" id="a-contenedor">
            <form class="form" id="a-form">
                <!-- ../Conexion/db.php -->
                <h2 class="title">Crear cuenta</h2>
                <div id="mensajeR" style=" color: red;"></div>
                <span class="form__span">Use su email para registrarse</span>
                <input class="form__input" type="text" placeholder="Nombre" name="nameR" id="nameR" />
                <input class="form__input" type="text" placeholder="Email" name="emailR" id="emailR" required pattern=".*@.*" />
                <input class="form__input" type="password" placeholder="Contraseña" name="passwordR" id="passwordR" required minlength="7" />
                <input class="boton subir" name="Reg_Bot" type="button" value="Registrarse" onclick="ajaxF_R();">
            </form>
        </div>
        <script>
            function ajaxF_R() {
                var nombre = $('#nameR').val();
                var correo = $('#emailR').val();
                var contraseña = $('#passwordR').val();

                $.ajax({
                    data: {
                        'nameR': nombre,
                        'emailR': correo,
                        'passwordR': contraseña
                    },
                    url: './BDD_Conexion/guardar_registro.php',
                    type: 'POST',
                    beforeSend: function() {},
                    success: function(mensaje) {
                        $('#mensajeR').html(mensaje);
                        if (mensaje === 'Registro exitoso') {
                            setTimeout(function() {

                            }, 2000);
                        }
                    }
                });
            }
        </script>

        <div class="contenedor b-contenedor" id="b-contenedor">
            <form class="form" id="b-form">
                <h2 class="title">Acceder al sitio web</h2>
                <div id="mensaje-error" style=" color: red;"></div>
                <span class="form__span">Utilice su correo electrónico</span>
                <input class="form__input" type="text" placeholder="Email" name="email" id="email" required pattern=".*@.*" />
                <input class="form__input" type="password" placeholder="Contraseña" name="password" id="password" required minlength="2" />

                <a class="form__link">¿Ha olvidado su contraseña?</a>
                <input type="button" class="boton subir" value="iniciar sesion" onclick="bobo();">
            </form>
        </div>

        <div class="switch" id="switch-cnt">
            <div class="switch__contenedor" id="switch-c1">
                <h2 class="title">Iniciar sesión </h2>
                <p class="descripcion">Para mantenerse conectado con nosotros, inicie sesión con su información personal
                </p>
                <button class="switch__boton boton switch-btn">Inicia sesión</button>
            </div>

            <div class="switch__contenedor is-hidden" id="switch-c2">
                <h2 class="switch__title title">Registrarse</h2>
                <p class="descripcion">Introduzca sus datos personales y conozca el mundo con nosotros</p>
                <button class="switch__boton boton switch-btn">Regístrate</button>
            </div>
        </div>
    </div>

    <script>
        function bobo() {

            const data = {
                correo: document.getElementById('email').value,
                pass: document.getElementById('password').value,

            }

            $.ajax({
                data: data,
                url: './BDD_Conexion/iniciar_sesion.php',
                type: 'POST',

                beforsend: function() {

                },

                success: function(mensaje) {
                    $('#mensaje-error').html(mensaje);
                }
            });
        }
    </script>

    <script src="Login_Funtion.js"></script>
</body>

</html>