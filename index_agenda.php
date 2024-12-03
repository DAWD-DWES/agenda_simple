<?php
if (filter_has_var(INPUT_POST, 'crear_contacto')) {
    $agenda = (filter_input(INPUT_POST, 'agenda', FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY)) ?? array();
    $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS));
    $telefono = trim(filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($telefono)) {
        unset($agenda[ucwords(strtolower($nombre))]);
    } else {
        $agenda[ucwords(strtolower($nombre))] = $telefono;
    }
} else if (filter_has_var(INPUT_POST, 'limpiar')) {
    $agenda = [];
}
?>
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
                <!-- Mostrar el contenido de la agenda -->
                <?php if (empty($agenda)): ?>
                    <p>La agenda está vacía</p>
                <?php else: ?>
                    <?php foreach ($agenda as $nom => $tel): ?>
                        <p><?= "$nom $tel" ?></p>
                        <input type='hidden' name="<?= "agenda[$nom]" ?>" value="<?= $tel ?>">
                    <?php endforeach ?>
                <?php endif ?>
            </fieldset>
            <!-- Creamos el formulario de introducción de un nuevo contacto -->
            <fieldset>
                <legend>Nuevo Contacto:</legend>
                <div class="form-section">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre"  name="nombre">
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
            <?php if (!empty($agenda)): ?>
                <fieldset>
                    <legend>Vaciar Agenda</legend>
                <!--   <a class="submit red button" href="<?= "{$_SERVER['PHP_SELF']}?limpiar=1" ?>">Vaciar</a> -->
                    <input type="submit" class="submit red" name="limpiar"  value="Vaciar">
                </fieldset>
            <?php endif ?>
        </form>
    </body>
</html>
