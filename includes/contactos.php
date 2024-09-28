<?php
if(!isset($link)){
    header("Location: ../index.php");
}
$query = "SELECT user_name,u.id,MAX(m.fecha_alta) FROM mensajes AS m
INNER JOIN usuarios AS u
ON m.emisor_id = u.id
WHERE m.usuario_id = " . $_SESSION['usuario']['id'] . " AND
m.fecha_baja IS NULL
GROUP BY m.emisor_id
ORDER BY m.fecha_alta ASC";

$contactos = consulta($query,$link);

$query = "SELECT user_name,u.id,MAX(m.fecha_alta) FROM mensajes AS m
INNER JOIN usuarios AS u
ON m.usuario_id = u.id
WHERE m.emisor_id = " . $_SESSION['usuario']['id'] . " AND
m.fecha_baja IS NULL
GROUP BY m.usuario_id
ORDER BY m.fecha_alta ASC";

$contactos1 = consulta($query,$link);

$contactos = array_merge($contactos,$contactos1);

usort($contactos, function ($a, $b) {
    return strcmp($a["MAX(m.fecha_alta)"], $b["MAX(m.fecha_alta)"]);
});

$contactos = array_reverse($contactos);