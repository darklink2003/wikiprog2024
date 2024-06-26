document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const cursoId = urlParams.get('curso_id') || 1;

    cargarInfoCurso(cursoId);
    cargarLecciones(cursoId);
    cargarComentarios(cursoId);

    const formularioComentario = document.getElementById('formulario-comentario');

    formularioComentario.addEventListener('submit', function(event) {
        event.preventDefault();
        enviarComentario(cursoId);
    });

    function cargarInfoCurso(cursoId) {
        axios.get(`../model/get_courses.php`)
            .then(function (response) {
                const infoCursoContainer = document.getElementById('info-curso');
                const curso = response.data.find(curso => curso.curso_id == cursoId);

                if (curso) {
                    const tituloCurso = document.createElement('h2');
                    tituloCurso.textContent = curso.titulo_curso;

                    const categoriaCurso = document.createElement('p');
                    categoriaCurso.textContent = `Categoría ID: ${curso.categoria_id}`;

                    const descripcionCurso = document.createElement('p');
                    descripcionCurso.textContent = curso.descripcion;

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

    function cargarLecciones(cursoId) {
        axios.get(`../model/get_lessons.php?curso_id=${cursoId}`)
            .then(function (response) {
                const leccionesContainer = document.getElementById('lecciones-container');
                leccionesContainer.innerHTML = '';

                response.data.forEach(function (leccion) {
                    const leccionDiv = document.createElement('div');
                    leccionDiv.className = 'col mb-4';

                    const leccionContainer = document.createElement('div');
                    leccionContainer.className = 'leccion-container';

                    const titulo = document.createElement('h2');
                    titulo.textContent = leccion.titulo_leccion;

                    const contenido = document.createElement('p');
                    contenido.textContent = leccion.contenido;

                    leccionContainer.appendChild(titulo);
                    leccionContainer.appendChild(contenido);

                    if (leccion.archivo_leccion) {
                        const enlaceArchivo = document.createElement('a');
                        enlaceArchivo.textContent = 'Descargar archivo';
                        enlaceArchivo.href = leccion.archivo_leccion;
                        enlaceArchivo.setAttribute('target', '_blank');
                        enlaceArchivo.style.display = 'block';
                        leccionContainer.appendChild(enlaceArchivo);
                    }

                    leccionDiv.appendChild(leccionContainer);
                    leccionesContainer.appendChild(leccionDiv);
                });
            })
            .catch(function (error) {
                console.error('Error al cargar las lecciones:', error);
            });
    }


});
