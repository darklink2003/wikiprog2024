<?php
// Inicia la sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../controller/controlador.php?seccion=seccion2&error=not_logged_in");
    exit();
}
?>
<div class="container">
    <h1>Formulario de inscripción</h1>

    <form action="#">
      <div class="form-group">
        <label for="nombre">Nombre completo:</label>
        <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre completo">
      </div>

      <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" class="form-control" id="correo" placeholder="Ingrese su correo electrónico">
      </div>

      <div class="form-group">
        <label for="contrasena">Contraseña:</label>
        <input type="password" class="form-control" id="contrasena" placeholder="Ingrese su contraseña">
      </div>

      <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
  </div>