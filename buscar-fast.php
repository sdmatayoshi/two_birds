<?php
require_once "includes/config.php";
if (isset($_POST['busqueda'])) {
    $signos = array('!', '¡', '¿', '?', '"', "'", '$', '%', '#', '&', '/', '(', ')', '|', '°', '¬', '\\', '=', '*', '+', '~', '´', '¨', '{', '}', '^', '`', '[', ']', '-', '_', '.', ',', ':', ';', '<', '>', '@');
    if (strlen($_POST['busqueda']) > 0 && !in_a($_POST['busqueda'], $signos)) {
        $query = "SELECT id,titulo FROM informes
    WHERE fecha_baja IS NULL AND (titulo LIKE '%" . $_POST['busqueda'] . "%' OR
    contenido LIKE '%" . $_POST['busqueda'] . "%' OR
    encabezado LIKE '%" . $_POST['busqueda'] . "%')
    ORDER BY fecha_alta DESC LIMIT 0,3";
        $resultados = consulta($query, $link);
        $query = "SELECT user_name,id FROM usuarios
    WHERE fecha_baja IS NULL AND user_name LIKE '%" . $_POST['busqueda'] . "%' ORDER BY fecha_alta DESC LIMIT 0,3";
        $usuarios = consulta($query, $link);
        echo json_encode(array("resultados" => $resultados, "usuarios" => $usuarios));
        die();
    } else {
        die();
    }
}

header("Location: index.php");
