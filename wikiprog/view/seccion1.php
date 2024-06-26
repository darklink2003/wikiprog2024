<!-- seccion1.php -->
<div class="container">
    <!-- Barra de búsqueda -->
    <div class="row">
        <div class="col">
            <form action="#" method="GET" class="d-flex" id="form-busqueda">
                <input type="search" class="form-control me-2" name="q" placeholder="Buscar...">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>
        </div>
    </div>

    <!-- Contenedor de cursos -->
    <div class="row mt-3">
        <div id="cursos-container" class="row">
            <!-- Los cursos se cargarán aquí dinámicamente -->
        </div>
    </div>
</div>

<script type="text/template" id="curso-template">
    <div class="curso col-md-3">
        <h2 class="titulo-curso"></h2>
        <p class="descripcion-curso"></p>
        <div style="display: flex; align-items: center;">
            <button type="button" class="btn btn-primary like-button">▲</button>
            <h2 class="numerodelike" style="margin: 0 10px;"></h2>
            <button type="button" class="btn btn-primary dislike-button ml-2">▼</button>
            <h2 class="numerodedislike" style="margin: 0 10px;"></h2>
        </div>
        <a href="#" class="ver-lecciones-link">Ver lecciones</a>
    </div>
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formBusqueda = document.getElementById('form-busqueda');

        formBusqueda.addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar el envío por defecto del formulario

            const formData = new FormData(formBusqueda);
            const searchParams = new URLSearchParams(formData).toString();

            fetch(`../model/buscar.php?${searchParams}`)
                .then(response => response.json())
                .then(data => {
                    renderCursos(data);
                })
                .catch(error => {
                    console.error('Error fetching courses:', error);
                });
        });

        // Función para cargar cursos al cargar la página inicialmente
        function cargarCursos() {
            fetch('../model/get_courses.php')
                .then(response => response.json())
                .then(data => {
                    renderCursos(data);
                })
                .catch(error => {
                    console.error('Error fetching courses:', error);
                });
        }

        // Llamar a la función para cargar cursos al cargar la página inicialmente
        cargarCursos();

        function renderCursos(data) {
            const cursosContainer = document.getElementById('cursos-container');
            const cursoTemplate = document.getElementById('curso-template').innerHTML;

            cursosContainer.innerHTML = ''; // Limpiar el contenedor antes de agregar nuevos cursos

            data.forEach(curso => {
                // Crear un contenedor temporal para usar el innerHTML
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = cursoTemplate;

                const cursoDiv = tempDiv.firstElementChild;

                // Reemplazar contenido dinámico del curso
                cursoDiv.querySelector('.titulo-curso').textContent = curso.titulo_curso;
                cursoDiv.querySelector('.descripcion-curso').textContent = curso.descripcion;
                cursoDiv.querySelector('.numerodelike').textContent = curso.likes; // Mostrar los likes iniciales
                cursoDiv.querySelector('.numerodedislike').textContent = curso.dislikes; // Mostrar los dislikes iniciales
                cursoDiv.querySelector('.like-button').onclick = () => likeCurso(cursoDiv, curso.curso_id);
                cursoDiv.querySelector('.dislike-button').onclick = () => dislikeCurso(cursoDiv, curso.curso_id);
                cursoDiv.querySelector('.ver-lecciones-link').href = `../controller/controlador.php?seccion=seccion7&curso_id=${curso.curso_id}`;

                cursosContainer.appendChild(cursoDiv);
            });
        }

        function likeCurso(cursoDiv, cursoId) {
            // Lógica para manejar el like
            console.log(`Liked course ID: ${cursoId}`);
            // Actualizar contador de likes en la interfaz
            const likeCount = cursoDiv.querySelector('.numerodelike');
            likeCount.textContent = parseInt(likeCount.textContent) + 1;
        }

        function dislikeCurso(cursoDiv, cursoId) {
            // Lógica para manejar el dislike
            console.log(`Disliked course ID: ${cursoId}`);
            // Actualizar contador de dislikes en la interfaz
            const dislikeCount = cursoDiv.querySelector('.numerodedislike');
            dislikeCount.textContent = parseInt(dislikeCount.textContent) + 1;
        }
    });
</script>
