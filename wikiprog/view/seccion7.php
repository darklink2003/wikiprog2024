<!-- seccion7.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecciones del Curso</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        .leccion-container {
            background-color: #8a2be2;
            /* Color morado */
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .leccion {
            color: #fff;
            /* Texto blanco */
        }

        /* Para organizar en filas de 3 */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
            /* Espacios entre los contenedores */
        }

        .col {
            flex: 0 0 calc(33.33% - 30px);
            /* Ancho de 33.33% con espacio entre contenedores */
            max-width: calc(33.33% - 30px);
            padding: 0 15px;
            /* Espacio entre contenedores */
        }

        @media (max-width: 768px) {
            .col {
                flex: 0 0 calc(50% - 30px);
                /* Para dispositivos más pequeños, 2 columnas por fila */
                max-width: calc(50% - 30px);
            }
        }

        @media (max-width: 576px) {
            .col {
                flex: 0 0 100%;
                /* En dispositivos pequeños, una columna por fila */
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="info-curso" class="mt-4">
            <!-- Aquí se imprimirá la información del curso -->
        </div>
        <div id="lecciones-container" class="mt-4 row">
            <!-- Aquí se cargarán las lecciones dinámicamente -->
        </div>

        <!-- Formulario de Comentarios -->
        <div class="mt-4">
            <h3>Deja un comentario</h3>
            <form id="formulario-comentario">
                <div class="form-group">
                    <label for="">Nombre del usuario</label>
                    <label for="comentario">Comentario</label>
                    <textarea class="form-control" id="comentario" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
<br>
        <div class="container_comentario" style="border:1px solid black; border-radius:15px; padding:10px;">
            <!-- los comentarios aprecen aqui con el nombre del usuario el contenido del comentario y la fecha de publicacion -->
             <h1>nombre</h1>
             <p>contenido</p>
        </div>
    </div>

    <!-- Bootstrap JS y Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Enlace al archivo JavaScript externo -->
    <script src="../js/scripts.js"></script>
</body>

</html>