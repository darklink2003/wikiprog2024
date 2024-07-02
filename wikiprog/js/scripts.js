/**
 * Este script se ejecuta cuando el DOM ha sido completamente cargado.
 * Carga la información del curso, las lecciones y los comentarios relacionados con un curso específico.
 */
document.addEventListener('DOMContentLoaded', function () {
    // Obtener parámetros de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const cursoId = urlParams.get('curso_id') || 1; // Si no se especifica curso_id, se utiliza 1 por defecto

    // Cargar información del curso
    cargarInfoCurso(cursoId);

    // Cargar lecciones del curso
    cargarLecciones(cursoId);

    // Cargar comentarios del curso

    // Obtener el formulario de comentario
    const formularioComentario = document.getElementById('formulario-comentario');

    // Agregar evento de envío de formulario
    formularioComentario.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevenir el envío del formulario por defecto
        enviarComentario(cursoId); // Llamar a la función para enviar el comentario
    });

    /**
     * Función para cargar la información del curso desde el servidor.
     * @param {number} cursoId - ID del curso para cargar la información específica.
     */
    function cargarInfoCurso(cursoId) {
        axios.get(`../model/get_courses.php`)
            .then(function (response) {
                const infoCursoContainer = document.getElementById('info-curso');
                const curso = response.data.find(curso => curso.curso_id == cursoId);

                if (curso) {
                    // Crear elementos HTML con la información del curso
                    const tituloCurso = document.createElement('h2');
                    tituloCurso.textContent = curso.titulo_curso;

                    const categoriaCurso = document.createElement('p');
                    categoriaCurso.textContent = `Categoría ID: ${curso.categoria_id}`;

                    const descripcionCurso = document.createElement('p');
                    descripcionCurso.textContent = curso.descripcion;

                    // Agregar elementos al contenedor de información del curso
                    infoCursoContainer.appendChild(tituloCurso);
                    infoCursoContainer.appendChild(categoriaCurso);
                    infoCursoContainer.appendChild(descripcionCurso);
                } else {
                    console.error('No se encontró el curso con curso_id:', cursoId);
                }
            })
            .catch(function (error) {
                console.error('Error al cargar la información del curso:', error);
            });
    }

    /**
     * Función para cargar las lecciones de un curso desde el servidor.
     * @param {number} cursoId - ID del curso para cargar las lecciones asociadas.
     */
    function cargarLecciones(cursoId) {
        axios.get(`../model/get_lessons.php?curso_id=${cursoId}`)
            .then(function (response) {
                const leccionesContainer = document.getElementById('lecciones-container');
                leccionesContainer.innerHTML = ''; // Limpiar contenido anterior

                // Iterar sobre las lecciones y crear elementos HTML dinámicamente
                response.data.forEach(function (leccion) {
                    const leccionDiv = document.createElement('div');
                    leccionDiv.className = 'col mb-4';

                    const leccionContainer = document.createElement('div');
                    leccionContainer.className = 'leccion-container';

                    // Crear elementos con la información de cada lección
                    const titulo = document.createElement('h2');
                    titulo.textContent = leccion.titulo_leccion;

                    const contenido = document.createElement('p');
                    contenido.textContent = leccion.contenido;

                    // Agregar elementos al contenedor de la lección
                    leccionContainer.appendChild(titulo);
                    leccionContainer.appendChild(contenido);

                    // Si la lección tiene un archivo adjunto, agregar enlace de descarga
                    if (leccion.archivo_leccion) {
                        const enlaceArchivo = document.createElement('a');
                        enlaceArchivo.textContent = 'Descargar archivo';
                        enlaceArchivo.href = leccion.archivo_leccion;
                        enlaceArchivo.setAttribute('target', '_blank'); // Abrir en nueva pestaña
                        enlaceArchivo.style.display = 'block';
                        leccionContainer.appendChild(enlaceArchivo);
                    }

                    // Agregar contenedor de lección al contenedor principal
                    leccionDiv.appendChild(leccionContainer);
                    leccionesContainer.appendChild(leccionDiv);
                });
            })
            .catch(function (error) {
                console.error('Error al cargar las lecciones:', error);
            });
    }

    /**
     * Función para enviar un comentario relacionado con un curso.
     * @param {number} cursoId - ID del curso al que pertenece el comentario.
     */
    function enviarComentario(cursoId) {
        // Implementación del envío de comentario, no proporcionada en este fragmento.
        // Se asume que esta función enviará el comentario al servidor y actualizará la lista de comentarios.
        console.log('Enviar comentario para curso con ID:', cursoId);
    }

});
