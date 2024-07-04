<?php
// Obtener el curso_id desde la URL
if (isset($_GET['curso_id'])) {
    $curso_id = $_GET['curso_id'];
} else {
    // Manejar el caso donde no se proporciona un curso_id válido
    die("Error: No se ha proporcionado un ID de curso válido.");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sección 7 - Curso <?php echo $curso_id; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .leccion-container {
            background-color: #655e96;
            color: white;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .leccion {
            color: #fff;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }

        .col {
            flex: 0 0 calc(33.33% - 30px);
            max-width: calc(33.33% - 30px);
            padding: 0 15px;
        }

        @media (max-width: 768px) {
            .col {
                flex: 0 0 calc(50% - 30px);
                max-width: calc(50% - 30px);
            }
        }

        @media (max-width: 576px) {
            .col {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div id="info-curso" class="mt-4"
            style="background-color:black; padding:10px; color:white; border-radius: 8px;">
            <!-- Aquí se cargará dinámicamente la información del curso y el enlace de inscripción -->
        </div>
        <div id="lecciones-container" class="mt-4 row">
            <!-- Aquí se cargarán dinámicamente las lecciones del curso -->
        </div>
        <div id="formulario-comentario-container" class="mt-4 row">
            <form action="../model/guardar_comentario.php" method="POST">
                <input type="hidden" name="curso_id" value="<?php echo $curso_id; ?>">
                <!-- Este campo ahora tiene el valor dinámico del curso_id -->
                <div class="form-group">
                    <label for="comentario">Comentario:</label>
                    <textarea class="form-control" id="comentario" name="comentario" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
        <div id="comentarios-container" class="mt-4 row">
            <!-- Aquí se cargarán dinámicamente los comentarios del curso -->
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
