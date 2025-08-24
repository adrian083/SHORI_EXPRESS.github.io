<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shori Express - Gestión de Clientes</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

    <main class="container admin-page">
        <?php require 'barra.php'; ?>


        <section class="admin-content-area">
            <article class="main-article">
                <h2>Gestión de Clientes</h2>

                <h3>Listado de Clientes</h3>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID Cliente</th>
                                <th>Nombre Completo</th>
                                <th>Documento</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>ID Usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            $mysqli = new mysqli("localhost", "root", "", "shori_express");

            if ($mysqli->connect_errno) {
                echo "<tr><td colspan='6'>Error al conectar: " . $mysqli->connect_error . "</td></tr>";
            } else {
                $sql = "SELECT id_usuario, documento_usuario, primer_nombre_usuario, apellido_usuario, telefono_usuario, direccion_usuario 
                        FROM usuario 
                        WHERE id_rol = 3";
                $result = $mysqli->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id_usuario'] . "</td>";
                        echo "<td>" . $row['primer_nombre_usuario'] . " " . $row['apellido_usuario'] . "</td>";
                        echo "<td>" . $row['documento_usuario'] . "</td>";
                        echo "<td>" . $row['telefono_usuario'] . "</td>";
                        echo "<td>" . $row['direccion_usuario'] . "</td>";
                        echo "<td>" . $row['id_usuario'] . "</td>"; 
                        echo "<td>
                            <a href='php/editar_cliente.php?doc=" . $row['documento_usuario'] . "' 
                            class='button small-button action-edit'>
                            <i class='fas fa-edit'></i> Editar
                            </a>
                            <a href='php/eliminar_cliente.php?doc=" . $row['documento_usuario'] . "' 
                            class='button small-button action-delete'
                            onclick='return confirm(\"¿Seguro que deseas eliminar al cliente con documento " . $row['documento_usuario'] . "?\")'>
                            <i class='fas fa-trash-alt'></i> Eliminar
                            </a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay clientes registrados</td></tr>";
                }
            }
            ?>
                        </tbody>
                    </table>
                </div>


                <hr class="form-separator">

                <h3>Crear Nuevo Cliente</h3>
                <h3>Registrar Usuario</h3>
                <form action="php/registrar_usu.php" method="POST" class="form-card">

                    <!-- Nombre usuario -->
                    <div class="input-group">
                        <label for="username">Nombre Usuario:</label>
                        <input type="text" id="username" name="username" required maxlength="60">
                    </div>

                    <!-- Apellido usuario -->
                    <div class="input-group">
                        <label for="apellido">Apellido Usuario:</label>
                        <input type="text" id="apellido" name="apellido" required maxlength="60">
                    </div>

                    <!-- Tipo documento -->
                    <div class="input-group">
                        <label for="tipo_documento">Tipo de Documento:</label>
                        <select name="tipo_documento" id="tipo_documento" required>
                            <option value="">Seleccione un tipo...</option>
                            <option value="CC">Cédula de Ciudadanía (CC)</option>
                            <option value="TI">Tarjeta de Identidad (TI)</option>
                            <option value="PEP">Permiso Especial de Permanencia (PEP)</option>
                            <option value="PPT">Permiso por Protección Temporal (PPT)</option>
                            <option value="Pasaporte">Pasaporte</option>
                        </select>
                    </div>

                    <!-- Número de documento -->
                    <div class="input-group">
                        <label for="documento">Número de documento:</label>
                        <input type="number" id="documento" name="documento" required>
                    </div>

                    <!-- Teléfono -->
                    <div class="input-group">
                        <label for="telefono">Número telefónico:</label>
                        <input type="tel" id="telefono" name="telefono" required>
                    </div>

                    <!-- Correo -->
                    <div class="input-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <!-- Dirección -->
                    <div class="input-group">
                        <label for="direccion">Dirección de residencia:</label>
                        <input type="text" id="direccion" name="direccion" required>
                    </div>

                    <!-- Contraseña -->
                    <div class="input-group">
                        <label for="register-password">Contraseña:</label>
                        <input type="password" id="register-password" name="password" required>
                    </div>

                    <!-- Confirmar contraseña -->
                    <div class="input-group">
                        <label for="confirm-password">Confirmar Contraseña:</label>
                        <input type="password" id="confirm-password" name="confirm_password" required>
                    </div>

                    <!-- Botón -->
                    <button type="submit" class="button primary-button">Registrarse</button>

                    <p class="form-link">
                        ¿Ya tienes cuenta? <a href="login.html">Inicia sesión aquí</a>
                    </p>
                </form>


                <hr class="form-separator">

                <h3>Actualizar Cliente Existente</h3>
                <form class="form-card">
                    <div class="input-group">
                        <label for="edit_client_id">ID de Cliente a Editar:</label>
                        <input type="number" id="edit_client_id" name="id_cliente" required>
                    </div>
                    <div class="input-group">
                        <label for="edit_client_name">Nombre Completo:</label>
                        <input type="text" id="edit_client_name" name="nombre_completo_cliente">
                    </div>
                    <div class="input-group">
                        <label for="edit_client_phone">Teléfono:</label>
                        <input type="tel" id="edit_client_phone" name="telefono_cliente">
                    </div>
                    <div class="input-group">
                        <label for="edit_client_address">Dirección:</label>
                        <input type="text" id="edit_client_address" name="direccion_cliente">
                    </div>
                    <button type="submit" class="button primary-button">Actualizar Cliente</button>
                </form>
            </article>
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

</body>

</html>