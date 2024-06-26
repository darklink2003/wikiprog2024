<?php
/**
 * Archivo para verificar el rango de acceso del usuario utilizando una clase y método estático.
 *
 * Este archivo debe incluirse en las páginas donde se requiera verificar el acceso del usuario a una sección específica.
 * Debe utilizarse en conjunto con la gestión de sesiones y roles adecuada.
 * 
 * PHP version 7.4
 *
 * @category Verificación_Acceso
 * @package  WikiProg
 * @version  1.0
 */

// Definir la clase VerificarRango
class VerificarRango {
    
    /**
     * Función estática para verificar el rango del usuario y determinar qué mostrar en el menú desplegable.
     *
     * @param int $rango_id El ID del rango del usuario.
     * @return string El HTML del menú desplegable según el rango del usuario.
     */
    public static function rango($rango_id) {
        if ($rango_id == 2) {
            return '
                <li><a class="dropdown-item" href="controlador.php?seccion=seccion6">Lista De Usuarios</a></li>
                <li><a class="dropdown-item" href="video.html">Tus Cursos</a></li>
            ';
        } else {
            return ''; // Si el rango no es 2, no se muestra nada
        }
    }
}

// Iniciar la sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Obtener el rango del usuario desde la sesión, si no está iniciada o no tiene rango, se establece como vacío
$rango_usuario = $_SESSION['rango'] ?? '';

// Obtener el HTML del menú desplegable según el rango del usuario
$menu_desplegable = VerificarRango::rango($rango_usuario);
?>
