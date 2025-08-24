<!DOCTYPE html>
<html lang="es">
<?session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shori Express - Registrarse</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/x-icon" href="img/SHORIp.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <h1 class="site-title"><img src="img/SHORIc.png" alt="Logo Shori Express"></h1>
            <nav>
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="servicios.html">Servicios</a></li>
                    <li><a href="menu.html">Menú</a></li>
                    <li><a href="contacto.html">Contacto</a></li>
                </ul>
            </nav>
            <div class="header-buttons">
                <a href="login.html" class="button primary-button">Iniciar Sesión</a>
                <a href="register.html" class="button secondary-button">Registrarse</a>
            </div>
        </div>
    </header>

    <main class="container form-page">
        <section class="form-card">
            <h2>Crear Cuenta</h2>
            <form action="php/registrar_usu.php" method="POST">
                <!--Nombre usuario-->
                <div class="input-group">
                    <label for="username">Nombre Usuario:</label>
                    <input type="text" id="username" name="username" require>
                </div>
                <!--Apellido usuario-->
                <div class="input-group">
                    <label for="apellido">Apellido Usuario:</label>
                    <input type="text" id="apellido" name="apellido" require>
                </div>
                <!--tipo documento-->
                <div class="input-group">
                    <label for="tipo_documento">Tipo de Documento:</label>
                    <select name="tipo_documento" id="tipo_documento">
                        <option value="CC">Cédula de Ciudadanía (CC)</option>
                        <option value="TI">Tarjeta de Identidad (TI)</option>
                        <option value="PEP">Permiso Especial de Permanencia (PEP)</option>
                        <option value="PPT">Permiso por Protección Temporal (PPT)</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>
                </div>
                <!--Numero de documento-->
                <div class="input-group">
                    <label for="documento">Numero de documento:</label>
                    <input type="number" id="documento" name="documento" require>
                </div>
                <!--Telefono-->
                <div class="input-group">
                    <label for="telefono">Numero telefonico:</label>
                    <input type="tel" id="telefono" name="telefono" require>
                </div>
                <!--Correo-->
                <div class="input-group">
                    <label for="email">Correo electronico:</label>
                    <input type="email" id="email" name="email" require>
                </div>
                <!--Direccion-->
                <div class="input-group">
                    <label for="direccion">Dirección de recidencia:</label>
                    <input type="text" id="direccion" name="direccion" require>
                </div>
                <!--Contraseña-->
                <div class="input-group">
                    <label for="register-password">Contraseña:</label>
                    <input type="password" id="register-password" name="password" require>
                </div>
                <!--Confirmar Contraseña-->
                <div class="input-group">
                    <label for="confirm-password">Confirmar Contraseña:</label>
                    <input type="password" id="confirm-password" name="confirm_password" require>
                </div>
                <button type="submit" class="submit-button">Registrarse</button>
                <p class="form-link">¿Ya tienes cuenta? <a href="login.html">Inicia sesión aquí</a></p>
            </form>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-columns">
                <div class="footer-col">
                    <h3>Shori Express</h3>
                    <p>La mejor parrilla a domicilio, ahora más cerca de ti.</p>
                </div>
                <div class="footer-col">
                    <h3>Navegación</h3>
                    <ul>
                        <li><a href="index.html">Inicio</a></li>
                        <li><a href="servicios.html">Servicios</a></li>
                        <li><a href="menu.html">Menú</a></li>
                        <li><a href="contacto.html">Contacto</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Legal</h3>
                    <ul>
                        <li><a href="politica-privacidad.html">Política de Privacidad</a></li>
                        <li><a href="terminos-condiciones.html">Términos y Condiciones</a></li>
                        <li><a href="aviso-legal.html">Aviso Legal</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Síguenos</h3>
                    <div class="social-links">
                        <a href="https://www.facebook.com/people/Parrilla-Shori/100094411466821/?locale=hi_IN#"><i
                                class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Shori Express. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Librería SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
   <?php
if (isset($_SESSION['error'])) {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '" . $_SESSION['error'] . "'
        });
    </script>";
    unset($_SESSION['error']); // eliminar mensaje después de mostrarlo
}

if (isset($_SESSION['success'])) {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '" . $_SESSION['success'] . "'
        });
    </script>";
    unset($_SESSION['success']); // eliminar mensaje después de mostrarlo
}
?>
</body>
</html>
