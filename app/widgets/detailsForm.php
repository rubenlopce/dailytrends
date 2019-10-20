<div>
<form action='<?="config/views/feed/update.php"?>' method='POST'>

    <input type="hidden" name="posFeed" id="posFeed">

    <div>
    <label for="title">Titular</label>
    <input type="text" name="title" id="title">
    </div>

    <div>
    <label for="image">Imagen</label>
    <input type="text" name="image" id="image">
    </div>

    <div>
    <label for="publisher">Autor</label>
    <input type="text" name="publisher" id="publisher">
    </div>

    <div>
    <label for="body">Entradilla</label>
    <input type="text" name="body" id="body">
    </div>

    <div>
    <label for="source">Fuente</label>
    <input type="text" name="source" id="source">
    </div>

    <button type='submit'>Editar</button>

</form>

    <form action='<?="config/views/feed/delete.php"?>' method='POST'>
    <input type='hidden' name='posFeedDelete' id='posFeedDelete'>
    <button type='submit'>Eliminar</button>
    </form>

</div>