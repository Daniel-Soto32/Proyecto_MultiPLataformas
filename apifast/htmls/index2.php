<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['dia']))
        echo 'Has seleccionado el dia ' . $_POST['dia'];
    else
        echo 'Debes seleccionar una opción.';
}
?>