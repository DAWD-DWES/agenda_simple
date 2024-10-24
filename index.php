<?php
define('NOMBRE_INVALIDO', '**Nombre inválido');
define('TELEFONO_INVALIDO', '**Teléfono inválido');

if (filter_has_var(INPUT_POST, 'enviar')) {
    $agenda = (filter_input(INPUT_POST, 'agenda', FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY)) ?? array();
    $nombre = ucwords(strtolower(trim(filter_input(INPUT_POST, 'nombre', FILTER_UNSAFE_RAW))));
    $nombreErr = filter_var($nombre, FILTER_VALIDATE_REGEXP,
                    ['options' => ['regexp' => "/^[a-z A-Záéíóúñ]{3,25}$/"]]) === false;
    $telefono = trim(filter_input(INPUT_POST, 'telefono', FILTER_UNSAFE_RAW));
    $telefonoErr = !empty($telefono) && filter_var($telefono, FILTER_VALIDATE_REGEXP,
                    ['options' => ['regexp' => "/^\+?[0-9]{9,15}$/"]]) === false;
    $error = $nombreErr || $telefonoErr;
    if (!$error) {
        if (!empty($nombre)) {
            if (empty($telefono)) {
                unset($agenda[$nombre]);
            } else {
                $agenda[$nombre] = $telefono;
            }
        }
    }
} else if (filter_has_var(INPUT_GET, 'limpiar')) {
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
        <form class="agenda" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">     
            <h1>Agenda</h1>
            <fieldset>
                <legend>Datos Agenda:</legend>
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
                    <input id="nombre" type="text" name="nombre" <?= ($error ?? false) ? "value=" . htmlspecialchars($nombre ?? '') : '' ?>>
                    <span class="error <?= ($nombreErr ?? false) ? 'error-visible' : '' ?>">
                        <?= NOMBRE_INVALIDO ?>
                    </span>                       
                </div>
                <div class="form-section">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" <?= ($error ?? false) ? "value=" . htmlspecialchars($telefono ?? '') : '' ?>>
                    <span class="error <?= ($telefonoErr ?? false) ? 'error-visible' : '' ?>">
                        <?= TELEFONO_INVALIDO ?>
                    </span>
                </div>                       
                <div class="form-section">
                    <input class="submit blue" type="submit" value="Añadir Contacto" name='enviar'/>
                    <input class="submit green" type="reset" value="Limpiar Campos"/>
                </div>
            </fieldset>
            <?php if (!empty($agenda)): ?>
                <fieldset>
                    <legend>Vaciar Agenda</legend>
                    <a class="submit red button" href="<?= "{$_SERVER['PHP_SELF']}?limpiar=1" ?>">Vaciar</a>
                <!--    <input class="submit red" type="submit" formaction="<?= "{$_SERVER['PHP_SELF']}?limpiar=1" ?>"  value="Vaciar"> -->
                </fieldset>
            <?php endif ?>
        </form>
    </body>
</html>
