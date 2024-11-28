<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="stylesheet.css">
        <title>Agenda</title>
    </head>
    <body>
        <form class="agenda" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">     
            <h1>Agenda</h1>
            <fieldset>
                <legend>Datos Agenda:</legend>

            </fieldset>
            <!-- Creamos el formulario de introducción de un nuevo contacto -->
            <fieldset>
                <legend>Nuevo Contacto:</legend>
                <div class="form-section">
                    <label for="nombre">Nombre:</label>
                    <input id="nombre" type="text" name="nombre" />                       
                </div>
                <div class="form-section">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" />
                </div>                       
                <div class="form-section">
                    <input class="submit blue" type="submit" value="Añadir Contacto" name='enviar_contacto'/>
                    <input class="submit green" type="reset" value="Limpiar Campos"/>
                </div>
            </fieldset>
            <fieldset>
                <legend>Vaciar Agenda</legend>
                <a class="submit red button" href="<?= "{$_SERVER['PHP_SELF']}?limpiar=1" ?>">Vaciar</a>
            <!--    <input class="submit red" type="submit" formaction="<?= "{$_SERVER['PHP_SELF']}?limpiar=1" ?>"  value="Vaciar"> -->
            </fieldset>
        </form>
    </body>
</html>
