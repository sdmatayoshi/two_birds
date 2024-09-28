<?php
require_once "includes/config.php";
if (isset($_SESSION['usuario'])) {
	require_once "includes/contactos.php";
}
$section = "poli";
$title = "Politica de privacidad";
require_once "views/layout.php";
