<div id="modal-details" class="modal">

    <div class='modal__modal-content'>

        <div class='modal__modal-content__header container-fluid'> 
            <span class='modal__modal-content__header__close-modal'>&times;</span>
            <h2>Editar feed</h2>
        </div>

        <div class='modal__modal-content__body container-fluid'>
            
            <form action='<?="config/views/feed/update.php"?>' method='POST'>

                <input type="hidden" name="posFeed" id="posFeed">

                <div>
                    <label for="title">Titular</label>
                    <input type="text" name="title" id="title" required>
                </div>

                <div>
                    <label for="image">Imagen</label>
                    <input type="text" name="image" id="image" required>
                </div>

                <div>
                    <label for="publisher">Autor</label>
                    <input type="text" name="publisher" id="publisher" required>
                </div>

                <div>
                    <label for="body">Entradilla</label>
                    <textarea name="body" id="body" rows="5"></textarea>
                </div>

                <div>
                    <label for="source">Fuente</label>
                    <input type="text" name="source" id="source" required>
                </div>

                <button id='button-edit' type='submit'>Editar</button>

            </form>

            <form action='<?="config/views/feed/delete.php"?>' method='POST'>

                <input type='hidden' name='posFeedDelete' id='posFeedDelete'>
                <button id='button-delete' type='submit'>Eliminar</button>

            </form>

        </div>

    </div>

</div>