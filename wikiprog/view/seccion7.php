<!-- seccion7.php -->
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

<div class="container">
    <div id="info-curso" class="mt-4" style="background-color:black; padding:10px; color:white; border-radius: 8px;">
    </div>
    <div id="lecciones-container" class="mt-4 row">
    </div>

    <div class="mt-4">
        <h3>Deja un comentario</h3>
        <form>
            <div class="form-group">
                <textarea class="form-control" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar comentario</button>
        </form>
    </div>
    <br>
    <div class="container_comentario" style="border:1px solid black; border-radius:15px; padding:10px;">
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>