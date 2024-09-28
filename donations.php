<?php
require_once "includes/config.php";
if (isset($_SESSION['usuario'])) {
	require_once "includes/contactos.php";
}

if (isset($_POST['valor']) && isset($_SESSION['usuario'])) {
	if (intval($_POST['valor']) > 0) {
		$sql = "INSERT INTO donaciones(importe,usuario_id,fecha_alta) VALUES(" . $_POST['valor'] . "," . $_SESSION['usuario']['id'] . ",'" . date("Y-m-d h:i:s", time()) . "')";
		consulta($sql,$link,4);
		setcookie("exito_don",true,time()+120);
		header("Location: donations.php");
	} else{
		setcookie("error_don",true,time()+120);
		header("Location: donations.php");
	}
}

if(isset($_COOKIE['exito_don'])){
	setcookie("exito_don",true,time()-120);
	$exd = true;
} else if(isset($_COOKIE['error_don'])){
	setcookie("error_don",true,time()-120);
	$errd = true;
}

$section = "donations";
$title = "Colaboraciones";
require_once "views/layout.php";