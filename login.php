<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shori Express - Iniciar Sesión</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/x-icon" href="img/SHORIp.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
                <a href="register.php" class="button secondary-button">Registrarse</a>
            </div>
        </div>
    </header>

    <main class="container form-page">
        <section class="form-card">
            <h2>Iniciar Sesión</h2>
            <form id="loginForm" action="#" method="POST">
                <div class="input-group">
                    <label for="login-username">Usuario:</label>
                    <input type="text" id="login-username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="login-password">Contraseña:</label>
                    <input type="password" id="login-password" name="password" required>
                </div>
                <button type="submit" class="submit-button">Entrar</button>
                <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
                <p class="form-link">¿No tienes cuenta? <a href="register.html">Regístrate aquí</a></p>
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
                        <a href="https://www.facebook.com/people/Parrilla-Shori/100094411466821/?locale=hi_IN#"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Shori Express. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const usernameInput = document.getElementById('login-username').value;
            const passwordInput = document.getElementById('login-password').value;

            const correctUsername = "admin";
            const correctPassword = "123";

            if (usernameInput === correctUsername && passwordInput === correctPassword) {
                window.location.href = "panel.html";
            } else {
                alert("Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.");
            }
        });
    </script>

</body>
</html>