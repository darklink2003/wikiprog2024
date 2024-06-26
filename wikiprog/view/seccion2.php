<!--
/**
seccion2.php
 * Formulario de inicio de sesión.
 *
 * Este formulario permite a los usuarios ingresar sus credenciales
 * para iniciar sesión en el sistema. Los datos ingresados se envían
 * al archivo "iniciar.php" mediante el método POST para su procesamiento.
 *
 * @version 1.0
 * @author Pablo Alexander Mondragon Acevedo
 *         Keiner Yamith Tarache Parra
 */
-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <!-- Título del formulario -->
                    <h3 class="card-title text-center">Inicio de Sesión</h3>
                    <!-- Inicio del formulario -->
                    <form action="../controller/iniciar.php" method="post" id="formulario-login">
                        <!-- Campo para ingresar el nombre de usuario -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Ingresa tu nombre de usuario" required aria-label="Nombre de Usuario">
                        </div>
                        <!-- Campo para ingresar la contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Ingresa tu contraseña" required aria-label="Contraseña">
                                <button class="btn btn-outline-secondary" type="button" id="toggle-password">Mostrar</button>
                            </div>
                        </div>
                        <!-- Botón para enviar el formulario -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </div>
                        <!-- Contenedor de números de intentos de inicio de sesión -->
                        <!-- Enlace para redirigir al usuario a la página de registro -->
                        <div class="mt-3 text-center">
                            <a href="controlador.php?seccion=seccion5" class="btn btn-link">Registrarse</a>
                        </div>
                    </form>
                    <!-- Mensaje de error -->
                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?php echo htmlspecialchars($_GET['error']); ?>
                        </div>
                    <?php endif; ?>
                    <!-- Fin del formulario -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('toggle-password').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const passwordFieldType = passwordField.getAttribute('type');
        if (passwordFieldType === 'password') {
            passwordField.setAttribute('type', 'text');
            this.textContent = 'Ocultar';
        } else {
            passwordField.setAttribute('type', 'password');
            this.textContent = 'Mostrar';
        }
    });
</script>
