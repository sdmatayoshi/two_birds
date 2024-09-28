<?php
require_once "includes/config.php";
if (isset($_SESSION['usuario'])) {
	require_once "includes/contactos.php";
}

$query = "SELECT user_name,descripcion,sub.id,foto,COUNT(sub.t),COUNT(il.informe_id) FROM (SELECT user_name,descripcion,u.id,foto,COUNT(iv.informe_id) AS t FROM usuarios AS u INNER JOIN informes AS i ON u.id = i.usuario_id INNER JOIN informe_vistas AS iv ON i.id = iv.informe_id WHERE u.fecha_baja IS NULL AND i.fecha_baja IS NULL GROUP BY i.usuario_id ORDER BY t DESC LIMIT 0,5) sub INNER JOIN informes AS i ON sub.id = i.usuario_id LEFT JOIN informe_likes AS il ON i.id = il.informe_id WHERE il.fecha_baja IS NULL AND i.fecha_baja IS NULL GROUP BY i.usuario_id ORDER BY COUNT(il.informe_id) DESC;";
$usuarios = consulta($query,$link);
$section = "home";
$title = "Home";
require_once "views/layout.php";