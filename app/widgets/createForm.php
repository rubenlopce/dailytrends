<div id="modal-create" class="modal">

    <div class='modal__modal-content'>

        <div class='modal__modal-content__header container-fluid'> 
            <span class='modal__modal-content__header__close-modal'>&times;</span>
            <h2>Crear feed</h2>
        </div>

        <div class='modal__modal-content__body container-fluid'>

            <form>

                <div>
                    <label for="title">Titular</label>
                    <input type="text" name="title" id="title-create" required>
                </div>

                <div>
                    <label for="image">Imagen</label>
                    <input type="text" name="image" id="image-create" required>
                </div>

                <div>
                    <label for="publisher">Autor</label>
                    <input type="text" name="publisher" id="publisher-create" required>
                </div>

                <div>
                    <label for="body">Entradilla</label>
                    <textarea name="body" id="body-create" rows="5"></textarea>
                </div>

                <div>
                    <label for="source">Fuente</label>
                    <input type="text" name="source" id="source-create" required>
                </div>

                <button type='button' id='feed-create-button'>Crear</button>

            </form>

        </div>

    </div>

</div>