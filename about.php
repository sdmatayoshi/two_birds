<?php
require_once "includes/config.php";
if (isset($_SESSION['usuario'])) {
	require_once "includes/contactos.php";
}

$section = "about";
$title = "Acerca de nosotros";
require_once "views/layout.php";
