<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="stylesheet.css">
        <title>Agenda</title>
    </head>
    <body>
        <form class="agenda" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" novalidate>     
            <h1>Agenda</h1>
            <fieldset>
                <legend>Datos Agenda:</legend>
            <!-- Incluyo los datos de la agenda ocultos -->
            <!--  Mostrar el contenido de la agenda -->
            </fieldset>
            <!-- Creamos el formulario de introducción de un nuevo contacto -->
            <fieldset>
                <legend>Nuevo Contacto:</legend>
                <div class="form-section">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre">                       
                </div>
                <div class="form-section">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono">
                </div>                       
                <div class="form-section">
                    <input class="submit blue" type="submit" value="Añadir Contacto" name="crear_contacto">
                    <input class="submit green" type="reset" value="Limpiar Campos">
                </div>
            </fieldset>
            <!-- Si la agenda no está vacía -->
            <fieldset>
                <legend>Vaciar Agenda</legend>
           <input class="submit red" type="submit" value="Vaciar Agenda" name="limpiar_contactos">
                            <!-- Otras maneras de enviar la petición al servidor 
                            <input class="submit red" type="submit" formaction="<?= "{$_SERVER['PHP_SELF']}?limpiar_contactos" ?>"  value="Vaciar Agenda">
                            <a href="<?= "{$_SERVER['PHP_SELF']}?limpiar_contactos" ?>"><input type="button" class="submit red" value="Vaciar Agenda"></a>
                            <a class="submit red button" href="<?= "{$_SERVER['PHP_SELF']}?limpiar_contactos" ?>">Vaciar Agenda</a> -->
            </fieldset>
        </form>
    </body>
</html>
