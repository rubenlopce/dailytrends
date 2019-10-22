<div id="modal-details" class="modal">

    <div class='modal__modal-content'>

        <div class='modal__modal-content__header container-fluid'> 
            <span class='modal__modal-content__header__close-modal'>&times;</span>
            <h2>Editar feed</h2>
        </div>

        <div class='modal__modal-content__body container-fluid'>
            
            <form action='<?="config/views/feed/update.php"?>' method='POST'>

                <input type="hidden" name="posFeed" id="posFeed-edit">

                <div>
                    <label for="title">Titular</label>
                    <input type="text" name="title" id="title-edit" required>
                </div>

                <div>
                    <label for="image">Imagen</label>
                    <input type="text" name="image" id="image-edit" required>
                </div>

                <div>
                    <label for="publisher">Autor</label>
                    <input type="text" name="publisher" id="publisher-edit" required>
                </div>

                <div>
                    <label for="body">Entradilla</label>
                    <textarea name="body" id="body-edit" rows="5"></textarea>
                </div>

                <div>
                    <label for="source">Fuente</label>
                    <input type="text" name="source" id="source-edit" required>
                </div>

                <button type='button' id='button-edit'>Editar</button>

            </form>

            <form action='<?="config/views/feed/delete.php"?>' method='POST'>

                <input type='hidden' name='posFeedDelete' id='posFeedDelete'>
                <button type='button' id='button-delete'>Eliminar</button>

            </form>

        </div>

    </div>

</div>